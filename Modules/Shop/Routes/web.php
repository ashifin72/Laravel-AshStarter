<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::prefix('shop')->group(function() {
//    Route::get('/', 'ShopController@index');
//});

  Route::group(['middleware' => ['role:admin', 'auth']], function() {    // Admin
//Переключение языков admin
    Route::get('locale/{locale}', '\App\Http\Controllers\Admin\LocaleController@changeLocale')->name('locale');
    Route::middleware(['set_locale'])->group(function () {
      Route::prefix('admin/shop')->group(function (){
        Route::resource('products', 'ProductController')
          ->except('show')
          ->names('admin.products');
        Route::resource('product-categories', 'ProductCategoryController')
          ->except('show')
          ->names('admin.product_categories');
        Route::resource('currencies', 'CurrencyController')
          ->except('show')
          ->names('admin.currencies');


        Route::post('currency', 'CurrencyController@main_currency')->name('main_currency');
      });
    });

  });

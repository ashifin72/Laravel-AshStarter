<?php

use Illuminate\Http\Request;
  use Modules\Blog\Http\Controllers\Api\ApiBlogController;

  /*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
  */

//Route::middleware('auth:api')->get('/blog', function (Request $request) {
//    return $request->user();
//});
 Route::group(['prefix'=>'blog'], function (){
   Route::get('/post/{slug}', [ApiBlogController::class, 'showPost']);
   Route::get('/all-paginate', [ApiBlogController::class, 'blogPosts']);
   Route::get('/categories/{slug}', [ApiBlogController::class, 'apiPostsOneCategories']);
   Route::get('/calc-page', [ApiBlogController::class, 'calcPage']);
 });
//  Route::apiResource('api-posts',  \Modules\Blog\Http\Controllers\Api\ApiBlogController::class);

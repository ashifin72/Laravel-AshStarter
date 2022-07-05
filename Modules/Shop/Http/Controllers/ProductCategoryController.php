<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Admin\AdminBaseController;

use App\Repositories\Admin\LocalRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use MetaTag;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Entities\Product;
use Modules\Shop\Http\Requests\ProductCategoryRequest;
use Modules\Shop\Repositories\ProductCategoryRepository;


class ProductCategoryController extends AdminBaseController
{
    private $localRepository, $productCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->localRepository = app(LocalRepository::class);
        $this->productCategoryRepository = app(ProductCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        MetaTag::setTags(['title' => __('admin.portfolio_filter')]);

        $colums = ['id', 'img', 'title_ru', 'title_uk', 'sort', 'status'];
        $items = $this->productCategoryRepository->getAllWithPaginate(20, $colums);

        return view('shop::admin.shop.categories.index',
            compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $item = ProductCategory::make();
        $locales = $this->localRepository->getActiveLocales();
        return view('shop::admin.shop.categories.create', compact('item', 'locales'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductCategoryRequest $request)
    {

        $data = $request->input();

        $item = ProductCategory::create($data);
        // выводим информацию о записи и перенаправляем на нужный роут
        return $this->productCategoryRepository
            ->resultRecording($item, 'admin.product_categories.edit', $item->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $item = $this->productCategoryRepository->getEditId($id);
        if (empty($item)) {
            abort(404);
        }
        $this->productCategoryRepository->issetItem($item);
        $locales = $this->localRepository->getActiveLocales();
        return view('shop::admin.shop.categories.edit',
            compact('item', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $item = $this->productCategoryRepository->getEditId($id);
        $this->productCategoryRepository->issetItem($id);
        $data = $request->input();
        $result = $item
            ->fill($data)
            ->save();
        return $this->productCategoryRepository
            ->resultRecording($result, 'admin.product_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       $portfolios = Product::where('category_id', '=', $id )->get();
       if (count($portfolios)){
           return back()->withErrors(['msg'=> __('admin.error_isset_date')]);
       }
        $result = ProductCategory::destroy($id);
        if($result){
            return redirect()
                ->route('admin.product_category.index')
                ->with(['success' => __('admin.article'). ' id ' . $id . __('admin.delete')]);
        }else{
            return back()->withErrors(['msg'=> __('admin.error_delete')]);
        }
    }
}

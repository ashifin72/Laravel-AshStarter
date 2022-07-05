<?php

namespace Modules\Shop\Http\Controllers;

use App\Http\Controllers\Admin\AdminBaseController;

use Modules\Shop\Http\Requests\ProductRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MetaTag;
use Modules\Shop\Entities\Product;
use Modules\Shop\Repositories\ProductCategoryRepository;
use Modules\Shop\Repositories\ProductRepository;

class ProductController extends AdminBaseController
{
    private $productRepository, $productCategoryRepository;
    public function __construct()
    {
        parent::__construct();
        $this->productRepository = app(ProductRepository::class);
        $this->productCategoryRepository = app(ProductCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        MetaTag::setTags(['title'=> __('admin.product')]);
        $colums = ['id', 'img', 'title_ru', 'title_uk', 'sort', 'status', 'category_id'];
        $items = $this->productRepository->getAllWithPaginate(20, $colums);

        return view('shop::admin.shop.index',
            compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $item = Product::make();
        $locales = $this->productRepository->getActiveLocales();
        $categoryList = $this->productCategoryRepository->getForComboBox();
        return view('shop::admin.shop.create',
            compact('item', 'locales', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        $data = $request->input();

        $item = Product::create($data);

        return $this->productRepository
            ->resultRecording($item, 'admin.products.edit', $item->id);
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $item = $this->productRepository->getEditId($id);
        if (empty($item)) {
            abort(404);
        }
        $locales = $this->productRepository->getActiveLocales();
        $categoryList = $this->productCategoryRepository->getForComboBox();
        return view('shop::admin.shop.edit',
            compact('item', 'locales', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductRequest $request, $id)
    {
        $item = $this->productRepository->getEditId($id);
        $this->productRepository->issetItem($id);
        $data = $request->input();
        $result = $item
            ->fill($data)
            ->save();
        return $this->productRepository
            ->resultRecording($result, 'admin.products.edit', $item->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $result = Product::destroy($id);

        if($result){
            return redirect()
                ->route('admin.products.index')
                ->with(['success' => __('admin.article'). ' id  ' . $id . __('admin.delete')]);
        }else{
            return back()->withErrors(['msg'=> __('admin.error_delete')]);
        }
    }
}

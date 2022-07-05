<?php

  namespace Modules\Shop\Http\Controllers;


use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use MetaTag;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Http\Requests\CurrencyRequest;
use Modules\Shop\Repositories\CurrencyRepository;

class CurrencyController extends AdminBaseController
{
    private $currencyRepository;

    public function __construct()
    {
        parent::__construct();

        $this->currencyRepository = app(CurrencyRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = ['id', 'title', 'code', 'value', 'status', 'favorite'];
        $items = $this->currencyRepository->getAllWithPaginate(15, $columns);
        MetaTag::setTags(['title'=>'Валюты сайта']);
        return view('shop::admin.shop.currencies.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $item = Currency::make();
        MetaTag::setTags(['title'=>'Добавить локализацию']);
        $currenlist = $this->currencyRepository->getForComboBox();
        return view('shop::admin.shop.currencies.create', compact('item', 'currenlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $data = $request->input();// получаем  проверенные данные из формы
        $result = Currency::create($data);

        if ($result) {
            return redirect()->route('admin.currencies.index')
                ->with(['success' => 'Успешное сохраненно!']);
        } else {
            return back()
                // если есть ошибка выдай и отправь назад на исходную точку с сохранением данных в инпуте
                ->withErrors(['msg' => 'Ошибка сохранения!',])
                ->withInput();
        }


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->currencyRepository->getEditId($id);
        if (empty($item)) {
            abort(404);
        }

        return view('shop::admin.shop.currencies.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        $item = $this->currencyRepository->getEditId($id);
        $this->currencyRepository->issetItem($item);

        $data = $request->all();

        $result = $item
            ->fill($data)
            ->save();
        return $this->currencyRepository
            ->resultRecording($result, 'admin.currencies.index', $item->id);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function  main_currency(Request $request)
    {
        $idFavorite = $this->currencyRepository->receiveLocale();
        $data = $request->input();
        $id = $data['id'];
        return $this->currencyRepository->saveLocale($id, $idFavorite);
    }



}

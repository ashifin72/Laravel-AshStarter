<?php

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\Currency as Model;
use App\Repositories\CoreRepository;


class CurrencyRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * получаем языки для вывода в списке
     */
    public function getForComboBox()
    {
        // клонируем модельку и получаем все поля
//        return $this->startConditions()->all();
//        //  получаем только нужные поля
        $columns = implode(',', [
            'id',
            'title',
            'code',
            'value',
            'status',
            'sort'
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->orderBy('sort', 'desc')
            ->toBase()
            ->get();


        return $result;

    }


// получаем id валюты по умалчиванию
    public function receiveLocale()
    {
        $items = $this
            ->startConditions()
            ->get(['id', 'favorite', 'code']);
        foreach ($items as $item) {
            if ($item->favorite == '1') {
                return $item->id;
            }
        }
    }

    // получаем валюту по умалчиванию
    public function gettingLocale()
    {
        if ($idFavorite = $this->receiveLocale()) {
            $item = $this->getEditId($idFavorite);
            return $item->code;
        }
        $item = $this->getEditId(1);
        return $item->code;
    }

    // перезаписываем валюту по умалчиванию
    public function saveLocale($id, $idFavorite)
    {
        $idF = $idFavorite ?? 1;
        if ($idFavorite != $id) {
            $endFavorite = $this->getEditId($idF);
            $endFavorite->favorite = '0';
            $endFavorite->save();
            $startFavorite = $this->getEditId($id);
            $startFavorite->favorite = '1';
            $startFavorite->save();

            return redirect()
                ->route('admin.currencies.index')
                ->with(['success' => __('admin.favorite') . ' ' . $startFavorite->local]);

        } else {
            return back()
                ->withErrors(['msg' => __('admin.error_save')])
                ->withInput();
        }
    }
}

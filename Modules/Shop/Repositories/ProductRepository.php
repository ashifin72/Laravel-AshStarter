<?php

  namespace Modules\Shop\Repositories;

  use Modules\Shop\Entities\Product as Model;
  use Illuminate\Database\Eloquent\Collection;
  use App\Repositories\CoreRepository;
  use App;


//use Your Model

  /**
   * Class BlogCategoryRepository.
   */
  class ProductRepository extends CoreRepository
  {

    protected function getModelClass()
    {
      return Model::class;
    }
    /**
     * выводим список  постов с пагинацией
     */


    /**
     * получаем модель для редактирования в админке по id
     */
    public function getEdit($id)
    {
      return $this->startConditions()->find($id);
    }

    /**
     * получаем котегории для вывода в списке
     */
    public function getForComboBox()
    {

      $locale = App::getLocale();
      $column = "title_" . $locale;
      $columns = implode(',', [
        'id',
        "CONCAT (id, '. ', $column) AS id_title",
      ]);

      $result = $this
        ->startConditions()
        ->selectRaw($columns)
        ->orderBy('id', 'desc')
        ->toBase()
        ->get();
      return $result;

    }

    // собираем для json
    public function getAllPortfolios($num)
    {
      return $item = $this->startConditions()
        ->join('product_category', 'product_category.id',
          '=', 'product.category_id')
        ->select(
          'product.id',
          'product.title_ru',
          'product.title_uk',
          'product.slug',
          'product.img',
          'product.type_site',
          'product.cms_site',
          'product.description_ru',
          'product.description_uk',
          'product_category.title_ru as category_ru',
          'product_category.title_uk as category_uk'
        )
        ->orderBy('id', 'desc')
        ->paginate($num);
    }

    // собираем для json одну категорию по id
    public function getOneCategory($id, $colums, $num= null)
    {
      return $item = $this->startConditions()
        ->select( $colums )
        ->where('category_id', '=', $id)
        ->orderBy('sort', 'desc')
        ->paginate($num);
    }



  }

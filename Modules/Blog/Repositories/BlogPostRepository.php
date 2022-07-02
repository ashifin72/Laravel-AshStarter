<?php

namespace Modules\Blog\Repositories;

use App;
use Modules\Blog\Entities\Post as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CoreRepository;


//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * выводим список  постов с пагинацией
     */

    public function getAllWithPostPaginate($num = 20)
    {
        $columns = [
            'id',
            'title_uk',
            'title_ru',
            'title_en',
            'slug',
            'sort',
            'status',
            'img',
            'created_at',
            'category_id',

        ];
        $locale = App::getLocale();
        $column = "title_" . $locale;
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(["category:id,$column"])// жадная загрузка
            ->paginate($num);


        return $result;
    }

    public function getFrontPostPaginate($num)
    {
        $columns = [
            'posts.id',
            'posts.title_uk',
            'posts.title_ru',
            'posts.description_ru',
            'posts.description_uk',
            'posts.title_ru',
            'posts.slug',
            'posts.sort',
            'posts.status',
            'posts.img',
            'category_id',
          'categories.title_ru as category_ru',
          'categories.title_uk as category_uk'

        ];
        $locale = App::getLocale();
        $column = "title_" . $locale;
        $result = $this
            ->startConditions()
          ->join('categories', 'categories.id',
            '=', 'posts.category_id')
            ->where('category_id', '>', 1)//  исключаем статичные страницы

            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(["category:id,$column,slug,icon"])// жадная загрузка
            ->paginate($num);
        return $result;
    }
  // собираем для json одну категорию
  public function getOneCategoryPosts($num, $id)
  {
    $columns = [
      'posts.id',
      'posts.title_uk',
      'posts.title_ru',
      'posts.description_ru',
      'posts.description_uk',
      'posts.title_ru',
      'posts.slug',
      'posts.sort',
      'posts.status',
      'posts.img',
      'category_id',
      'categories.title_ru as category_ru',
      'categories.title_uk as category_uk'

    ];
    $locale = App::getLocale();
    $column = "title_" . $locale;
    $result = $this
      ->startConditions()
      ->join('categories', 'categories.id',
        '=', 'posts.category_id')
      ->where('category_id', $id)

      ->select($columns)
      ->orderBy('id', 'DESC')
      ->with(["category:id,$column,slug,icon"])// жадная загрузка
      ->paginate($num);
    return $result;
  }


  /**
     * получаем модель для редактирования в админке по id
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


}

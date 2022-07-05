<?php
  namespace App\Http\ViewComposers;

  use App\Traits\MemoryCache;
  use Illuminate\View\View;
  use Modules\Menu\Entities\MenuItem;

  class MenuComposer
  {
    use MemoryCache;

    public $menu;
    public $path;

    /**
     * Create a menu composer.
     *
     * @return void
     */
    public function __construct()
    {
      $this->menu = $this->menu();
      $this->path = $this->path();
    }

    public function path()
    {
      return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function menu()
    {
//       get from cache or database
      $item = $this->cache(function() {
        return MenuItem::where('menu_id', '=', 1)->get(['title_ru', 'title_uk', 'title_en', 'path', 'parent_id']);
      });
//      $item = MenuItem::where('menu_id', '=', 1)->get(['title_ru', 'title_uk', 'title_en', 'path', 'parent_id']);

      return $item;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      $view->with('menu', $this->menu);
      $view->with('path', $this->path);
    }
  }

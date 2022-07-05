<?php

  namespace Modules\Menu\Http\Controllers\Api;

  use App\Repositories\Admin\LocalRepository;
  use Illuminate\Contracts\Support\Renderable;
  use Illuminate\Http\Request;
  use Illuminate\Routing\Controller;
  use Modules\Menu\Entities\MenuItem;
  use Modules\Menu\Repositories\MenuItemRepository;
  use Modules\Menu\Repositories\MenuRepository;
  use Modules\Menu\Transformers\MenuItemResource;

  class ApiMenuController extends Controller
  {
    private $menuRepository;
    private $localRepository;
    private $menuItemRepository;

    public function __construct()    {


      $this->menuRepository = app(MenuRepository::class);
      $this->localRepository = app(LocalRepository::class);
      $this->menuItemRepository = app(MenuItemRepository::class);

    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function topMenu($menu_id = 1)
    {
      $menuItems = MenuItem::where('menu_id', '=', $menu_id)
        ->where('status', '=', '1')
        ->get();
//      dd($menuItems);
      return MenuItemResource::collection($menuItems);
    }


  }

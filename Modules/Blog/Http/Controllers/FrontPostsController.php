<?php

namespace Modules\Blog\Http\Controllers;

use App\Repositories\Admin\InfoRepository;
use Modules\Menu\Entities\MenuItem;
use App\Repositories\Admin\LocalRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Repositories\BlogCategoryRepository;
use Modules\Blog\Repositories\BlogPostRepository;
use Modules\Blog\Repositories\TagRepository;
use Modules\Section\Repositories\SectionItemRepository;
use URL;
use MetaTag;

class FrontPostsController extends Controller
{
  private $blogPostRepository,
          $localRepository,
          $blogCategoryRepository,
          $infoRepository,
          $sectionItemsRepository,
          $tagRepository;

  public function __construct()
  {
    $this->blogPostRepository = app(BlogPostRepository::class);
    $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    $this->localRepository = app(LocalRepository::class);
    $this->tagRepository = app(TagRepository::class);
    $this->infoRepository = app(InfoRepository::class);
    $this->sectionItemsRepository = app(SectionItemRepository::class);
  }

  /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      MetaTag::setTags(['title' => __('admin.blog_articles')]);
      $items = $this->blogPostRepository->getFrontPostPaginate(6);

      $info = $this->infoRepository->getEdit(1);
      $url = URL::current();
      $lastWord = substr($url, strrpos($url, '/') + 1);

      $menus = MenuItem::where('menu_id', '=', 1)->get(['title_ru', 'title_uk', 'title_en', 'path', 'parent_id']);
      return view('blog::front.index', compact('items', 'info', 'lastWord'));
    }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */

  public function show( $slug)
  {
    $item = $this->blogPostRepository->getEditSlug($slug);
    if (!isset($item) || $item->category_id == 1){
      abort(404);
    }
    MetaTag::setTags(['title'=> $item->title,
      'description'=>$item->description,
      'image'=>$item->img ]);

    $info = $this->infoRepository->getEdit(1);
    $url = URL::current();
    $lastWord = substr($url, strrpos($url, '/') + 1);

    $bannerSidebar  = $this->sectionItemsRepository->getEdit(16);

    $menus = MenuItem::where('menu_id', '=', 1)->get(['title_ru', 'title_uk', 'title_en', 'path', 'parent_id']);
    return view('blog::front.show',
      compact('item', 'info', 'menus', 'lastWord', 'bannerSidebar' ));
  }

  public function categoryPost($slug)
  {
    $item = $this->blogCategoryRepository->getEditSlug($slug);
    if (!isset($item) || $item->category_id == 1){
      abort(404);
    }
    MetaTag::setTags(['title'=> $item->title,
      'description'=>$item->description,
      'image'=>$item->img ]);

    $posts = $this->blogPostRepository->getAllCategoryPaginate('category_id', $item->id);
    $info = $this->infoRepository->getEdit(1);
    $url = URL::current();
    $lastWord = substr($url, strrpos($url, '/') + 1);

    $bannerSidebar  = $this->sectionItemsRepository->getEdit(16);

    $menus = MenuItem::where('menu_id', '=', 1)->get(['title_ru', 'title_uk', 'title_en', 'path', 'parent_id']);
//        dd($posts, $menus);
    return view('blog::front.category',
      compact('item', 'info', 'menus', 'lastWord', 'bannerSidebar', 'posts' ));

  }

}

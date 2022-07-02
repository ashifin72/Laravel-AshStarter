<?php

namespace Modules\Blog\Http\Controllers\Api;

use App\Repositories\Admin\LocalRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\BlogCategoryRepository;
use Modules\Blog\Repositories\BlogPostRepository;
use Modules\Blog\Repositories\CommentRepository;
use Modules\Blog\Repositories\TagRepository;
use Modules\Blog\Transformers\PostResource;
use Modules\Section\Entities\SectionItem;
use Modules\Section\Repositories\SectionItemRepository;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Repositories\CurrencyRepository;
use Modules\Shop\Repositories\ProductRepository;

class ApiBlogController extends Controller
{
  private $blogPostRepository,
    $blogCategoryRepository,
    $commentRepository,
    $tagRepository,
    $producRepository,
    $currencRepository,
    $sectionItemRepository;
  public function __construct()
  {
    $this->commentRepository = app(CommentRepository::class);
    $this->blogPostRepository = app(BlogPostRepository::class);
    $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    $this->tagRepository = app(TagRepository::class);
    $this->sectionItemRepository = app(SectionItemRepository::class);
    $this->producRepository = app(ProductRepository::class);
    $this->currencRepository = app(CurrencyRepository::class);
  }
  public function blogPosts()
  {
    $items = $this->blogPostRepository->getFrontPostPaginate(6);
    return compact('items');
  }
  public function showPost($slug)
  {
    $item = $this->blogPostRepository->getEditSlug($slug);
    if (!isset($item)) {
      $item = $this->blogPostRepository->getEditSlug('404');
    }
    $category = $this->blogCategoryRepository->getEditId($item->category_id);
    $comments = $this->commentRepository->getComments($item->id);
    $tags = $item->tags;
    $banner = $this->sectionItemRepository->getEditId(16);
    return compact('item', 'category', 'tags', 'comments', 'banner');
  }
  public function apiPostsOneCategories($slug)
  {
    $category = Category::where('slug', '=', $slug)
      ->first();

    if (!isset($category)) {
      $items = $this->blogPostRepository
        ->getOneCategoryPosts(18, 10);
    } else {
      $items = $this->blogPostRepository
        ->getOneCategoryPosts(18, $category->id);
    }

    return compact('category', 'items');
  }

  public function calcPage()
  {
    $item = $this->blogPostRepository->getEditId(11);
    $colums = ['title_ru', 'title_uk', 'price', 'description_ru', 'description_uk', 'id'];
    $sites = $this->producRepository->getOneCategory(1, $colums);
    $services = $this->producRepository->getOneCategory(2, $colums);
    $in_stock = $this->sectionItemRepository->getAllWithSectionItem($perPage = null, 8);
    $col = ['title', 'code', 'value'];
    $currencies = $this->currencRepository->getAllWithPaginate($perPage = null, $col);
    return compact('item', 'sites', 'services', 'currencies', 'in_stock');
  }


}

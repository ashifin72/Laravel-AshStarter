<?php

namespace Modules\Blog\Http\Controllers;

use App\Repositories\Admin\InfoRepository;
use Modules\Menu\Entities\MenuItem;
use App\Repositories\Admin\LocalRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Front\MailController;
use Modules\Blog\Repositories\BlogCategoryRepository;
use Modules\Blog\Repositories\BlogPostRepository;
use Modules\Blog\Repositories\TagRepository;
use Modules\Section\Repositories\SectionItemRepository;
use URL;
use MetaTag;

class FrontPageController extends Controller
{
  private $blogPostRepository,
          $infoRepository,
          $maillSend;

  public function __construct()
  {
    $this->blogPostRepository = app(BlogPostRepository::class);
    $this->infoRepository = app(InfoRepository::class);
    $this->maillSend = app(MailController::class);

  }

  public function pageContent(Request $request, $slug)
  {
    $this->maillSend->sendMail($request);
    $item = $this->blogPostRepository->getEditSlug($slug);
    if ($item->category_id != 1){
      abort(404);
    }
    MetaTag::setTags(['title' => $item->title]);
    $info = $this->infoRepository->getEdit(1);
    $url = URL::current();
    $lastWord = substr($url, strrpos($url, '/') + 1);


    return view('blog::front.pages.contacts', compact('item', 'info', 'lastWord'));
  }

  public function contactsPage(Request $request)
  {
    $this->maillSend->sendMail($request);
    $item = $this->blogPostRepository->getEditId(1);
    MetaTag::setTags(['title' => $item->title]);
    $info = $this->infoRepository->getEdit(1);
    $url = URL::current();
    $lastWord = substr($url, strrpos($url, '/') + 1);

    return view('blog::front.pages.contacts', compact('item', 'info', 'lastWord'));
  }



}

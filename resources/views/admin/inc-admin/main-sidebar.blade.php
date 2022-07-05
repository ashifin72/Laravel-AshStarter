<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{asset('assets/admin/img/logo-mini.png')}}" alt="Админи панель проекта" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{__('admin.title')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->img == null)
                    <img class="img-circle elevation-2" alt="{{ Auth::user()->name }}" src="{{asset('/assets/img-admin/logo-mini.png')}}"
                         alt="{{Auth::user()->name}}">
                @else <img class="img-circle elevation-2" alt="{{ Auth::user()->name}}" src="{{asset('/uploads/' . Auth::user()->img)}}" alt="{{ Auth::user()->name}}">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.info.edit', 1) }}" class="nav-link">
                        <i class="nav-icon  fas fa-info-circle text-danger"></i>
                        <p>
                            {{__('admin.info')}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.locales.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-globe-africa"></i>
                        <p>
                            {{__('admin.locales')}}

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{asset('/file-manager?type=Images')}}" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            {{__('admin.image-manager')}}

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{asset('/file-manager?type=Files')}}" target="_blank" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            {{__('admin.file-manager')}}

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.menus.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            {{__('admin.menus_site')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            {{__('admin.blog')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.posts.index')}}" class="nav-link">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>{{__('admin.article_blog')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.categories.index')}}" class="nav-link">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>{{__('admin.categories_blog')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.tags.index')}}" class="nav-link">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>{{__('blog.tags')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.comments.index')}}" class="nav-link">
                                <i class="far fa-comments nav-icon"></i>
                                <p>{{__('admin.title_comments')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.pages')}}" class="nav-link">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>{{__('admin.pages')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            {{__('portfolio.portfolio')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.portfolios.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('portfolio.portfolio_article')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.portfolio_categories.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('portfolio.portfolio_categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.portfolio_feedback.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('portfolio.feedback')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Shop
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('shop.offers')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product_categories.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('shop.shop_categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.currencies.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Валюта</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.sections.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-address-card text-info"></i>
                        <p>{{ __('admin.sections') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-user text-info"></i>
                        <p>{{ __('admin.users') }}</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-info"></i> <p> {{ __('admin.exit') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menus -->
    </div>
    <!-- /.sidebar -->
</aside>

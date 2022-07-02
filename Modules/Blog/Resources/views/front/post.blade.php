<main class="container blogpost">
    <div class="row ">
        <div class="col-md-9 blogpost__head">
            <nav aria-label="breadcrumbs">
                <ol class="breadcrumbs">
                    <li><a href="{{route('home')}}">{{__('admin.home')}}</a></li>
                    <li><a href="{{route('site.front.blog.index')}}">{{__('admin.blog')}}</a></li>
                    <li><a href="{{route('site.front.blog.category', $item->category->slug)}}">{{$item->category->title}}</a>
                    </li>
                    <li class="active" aria-current="page">{{$item->title}}</li>
                </ol>
            </nav>
            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->hasRole('admin')?? Auth::user()->hasRole('project-manager'))

                        <a href="{{route('admin.posts.edit', $item->id )}}" class="admin-edit"><i
                                    class="far fa-edit"></i>edit</a>
                    @endif
                @endauth
            @endif
            <div class="post">
                @if($item->status_img == '0')
                <div class="post__img">
                    <img class="post__img" src="{{asset('uploads/' . $item->img)}}" alt="{{$item->title}}">
                </div>
                @endif

                <div class="post__title">
                    <span class="icon-cat">{!! $item->category->icon !!}</span>
                    <div class="post__title-block">
                        <span>{{$item->category->title}}</span>
                        <h1 class="title">{{$item->title}}</h1>
                    </div>

                </div>
                <div class="post__content">
                    @php($dataVideo = $item->youtube || $item->video)
                    @if(!$dataVideo)
                    <div class="post__content-desc">
                        {!! $item->description !!}
                    </div>
                   @else
                        <div class="row video-block">
                            <div class="col-sm-6 pb-2">
                                @if(isset($item->youtube))
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$item->youtube}}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                @else {!! $item->video !!}
                                @endif
                            </div>
                            <div class="col-sm-6 dow-btnblock">
                                <div class="post__content-desc">
                                    {!! $item->description !!}
                                </div>

                                @isset($item->youtube)
                                    <a href="{{$item->youtube}}" target="_blank"
                                       class="btn btn-senter"><span>
                                            <i class="fab fa-youtube-square"></i> {{__('site.show youtube')}}
                                        </span></a>
                                @endisset
                            </div>
                        </div>
                    @endif
                    <div class="post__blog-content">
                        {!! $item->content !!}
                        <div class="post__dow">
                            @isset($item->github)
                                <a href="{{$item->github}}" target="_blank"
                                   class="btn btn-outline-secondary">{{__('site.download')}} GitHub</a>
                            @endisset
                            @isset($item->file_sharing)
                                <a href="{{$item->file_sharing}}" target="_blank"
                                   class="btn btn-outline-secondary">{{__('site.download')}} {{$item->slug}}</a>
                            @endisset
                        </div>

                        <div class="post__share">
                            @include('front.site.include.share')
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-3 ">
            @include('front.site.include.sidebar')
        </div>

    </div>
</main>

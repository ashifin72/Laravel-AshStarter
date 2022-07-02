<div class="container">
    <div class="blog">
        <h1 class="title-archive">{{__('admin.blog')}}</h1>
        <nav aria-label="breadcrumbs">
            <ol class="breadcrumbs">
                <li ><a href="/">{{__('admin.home')}}</a></li>
                <li >{{__('admin.blog')}}</li>

            </ol>
        </nav>
        <div class="row">
            @forelse($items as $item)

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card__img">
                            <img class="animated" src="{{asset('uploads/' . $item->img)}}" alt="{{$item->title}}">
                        </div>

                        <div class="card__content">
                            <h3 class="card__title">{{$item->title}}</h3>

                            <div class="card__customer">
                            <span>Тип: <a href="{{route('site.front.blog.category', $item->category->slug )}}"
                                          target="_blank">{{$item->category->title}}</a></span>
                            </div>
                            <hr class="card__hr">
                            <p class="description">{{mb_substr($item->description_ru, 0, 70, 'utf-8')}}...</p>
                            {{--                    {{dd($item->category->slug, $item->slug  )}}--}}
                            <a class="card__order" href="{{route('site.front.blog.show', $item->slug )}}"
                               role="button">{{__('admin.more')}} »</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-12">
                @if($items->total() > $items->count())
                    {{count($items)}} {{__('admin.entries_from')}} {{$items->total()}}

                @endif
            </div>
        </div>

    </div>
</div>


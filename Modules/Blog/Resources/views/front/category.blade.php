@extends('layouts.home')
@section('header')
    <hesder  class="header">
    @include('front.site.header')
    </hesder>
@endsection
@section('content')
    <main class="container">
        <div class="blog">
            <h1 class="title-archive">{{$item->title}}</h1>
            <nav aria-label="breadcrumbs">
                <ol class="breadcrumbs">
                    <li ><a href="/">{{__('admin.home')}}</a></li>
                    <li ><a href="{{route('site.front.blog.index')}}">{{__('admin.blog')}}</a></li>
                    <li class="active" aria-current="page">{{$item->title}}</li>
                </ol>
            </nav>
            <div class="row">
                @forelse($posts as $post)

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card__img">
                                <img class="animated" src="{{asset('uploads/' . $post->img)}}" alt="{{$item->title}}">
                            </div>

                            <div class="card__content">
                                <h3 class="card__title">{{$post->title}}</h3>

                                <div class="card__customer">

                                </div>
                                <hr class="card__hr">
                                <p class="description">{{mb_substr($post->description_ru, 0, 70, 'utf-8')}}...</p>

                                <a class="card__order" href="{{route('site.front.blog.show', $post->slug )}}"
                                   role="button">{{__('admin.more')}} »</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            @if($posts->total() > $posts->count())
                <div class="row justify-content-center paginate">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p>{{count($posts)}} {{__('admin.entries_from')}} {{$posts->total()}} </p>
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </main>
@endsection
@section('footer')
    @include('front.site.footer')
@endsection



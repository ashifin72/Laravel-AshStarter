@extends('layouts.home')
<hesder  class="header">
    @include('front.site.header')
</hesder>
@section('content')
    <main class="main md-top bg-light pt-5 pb-5">
        <div class="container main-content">
            <div class="row mt-5">
                <div class="col-md-6">
                    <h1>{{$item->title}}</h1>
                    <div class="content-post">
                        {!! $item->content !!}
                    </div>
                </div>
                <div class="col-md-6">
                                        @include('front.include.Info_block')
                    <form action="{{route('contacts')}}" method="post">
                        <div class="form-group">
                            <label for="name">{{__('site.name')}}:</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email1">E-mail: {{__('site.not_obligatory')}}</label>
                            <input type="email" name="email" class="form-control" id="email1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone" >{{__('admin.phone')}}:</label>
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="message" >{{__('site.question')}}:</label>
                            <textarea class="form-control" name="message" ></textarea>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger">{{__('site.send_message')}}</button>
                    </form>
                </div>

            </div>
        </div>
    </main>

    {{--    @include('site.home.include.contact')--}}
@endsection

@section('footer')
    @include('front.site.footer')
@endsection



@extends('layouts.home')
<hesder  class="header">
    @include('front.site.header')
</hesder>
@section('content')
    @include('blog::front.post')
@endsection
@section('footer')
    @include('front.site.footer')
@endsection

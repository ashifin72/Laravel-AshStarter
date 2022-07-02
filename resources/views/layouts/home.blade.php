<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <!-- <base href="/"> -->

  <title>{!! MetaTag::tag('title') !!}</title>
  <meta name="description" content="{!! MetaTag::tag('description') !!}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Template Basic Images Start -->
  <meta property="og:title" content="{!! MetaTag::tag('title') !!}">
  <meta property="og:description" content="{!! MetaTag::tag('description') !!}">

  <meta property="og:image" content="{!! asset(MetaTag::tag('image') ) !!}">
  <meta property="og:image:width" content="600"/>
  <meta property="og:image:height" content="500"/>
  <meta property="og:site_name" content="{!! MetaTag::tag('title') !!}">
  <link rel="icon" href="{{asset('upload/files/home/logo-ash.png')}}">

  <!-- Template Basic Images End -->

  <!-- Custom Browsers Color Start -->
  <meta name="theme-color" content="#038fa8">
  <!-- Custom Browsers Color End -->
  <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->

  <link rel="stylesheet" href="{{asset('css/main.css')}}">
{{--  <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}">--}}
{{--  <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">--}}
{{--  {!! $info->head_code !!}--}}


</head>

<body>

<!--Wrapper-->

  @yield('header')

  @yield('content')

  @yield('footer')

<script src="{{ asset('js/main.js') }}"></script>

{{--{!! $info->footer_code !!}--}}
</body>
</html>





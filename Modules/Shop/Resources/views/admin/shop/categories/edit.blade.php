@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{$item->title}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('filters') {{__('shop.shop_categories')}} @endslot
            @slot('active') {{$item->title}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.product_categories.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @include('shop::admin.shop.categories.form')
        </form>
       <x-form.destroy :route="route('admin.product_categories.destroy', $item->id)"/>



    </section>
@endsection

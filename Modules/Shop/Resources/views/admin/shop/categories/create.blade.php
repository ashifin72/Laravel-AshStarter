@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add')}} {{__('portfolio.product-categories')}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('product-categories') {{__('shop.shop_categories')}} @endslot
            @slot('active') {{__('admin.add')}} {{__('shop.shop_categories')}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card">
        <div class="card-header">
            <h3 class="card-title">{{__('admin.add')}} {{__('portfolio.product-categories')}}</h3>

        </div>
        <div class="card-body">
            <form method="POST" action="{{route('admin.product_categories.store')}}" enctype="multipart/form-data">

                @csrf
                @include('shop::admin.shop.categories.form')

            </form>
        </div>


    </section>
@endsection

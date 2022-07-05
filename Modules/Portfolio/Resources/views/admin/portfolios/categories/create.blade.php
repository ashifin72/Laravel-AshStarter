@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add')}} {{__('portfolio.portfolio_category')}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('portfolio_categories') {{__('portfolio.portfolio_categories')}} @endslot
            @slot('active') {{__('admin.add')}} {{__('portfolio.portfolio_category')}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card">
        <div class="card-header">
            <h3 class="card-title">{{__('admin.add')}} {{__('portfolio.portfolio_category')}}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('admin.portfolio_categories.store', $item->id)}}" enctype="multipart/form-data">

                @csrf
                @include('portfolio::admin.portfolios.categories.form')

            </form>
        </div>


    </section>
@endsection

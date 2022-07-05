@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{$item->title}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('portfolios') {{__('portfolio.portfolio')}} @endslot
            @slot('active') {{$item->title}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.portfolios.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            @include('portfolio::admin.portfolios.form')
        </form>
        <x-form.destroy :route="route('admin.portfolios.destroy', $item->id)" />

    </section>
@endsection

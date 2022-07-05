@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') {{__('admin.add')}} {{__('portfolio.portfolio')}}@endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('portfolios') {{__('portfolio.portfolio_categories')}} @endslot
      @slot('active') {{__('admin.add')}} {{__('portfolio.portfolio')}}@endslot
    @endcomponent
  </div>
  <!-- /.content-header -->

  <section class="content card-body card">
    <!-- Small boxes (Stat box) -->
    <form method="POST" action="{{route('admin.portfolios.store', $item->id)}}" enctype="multipart/form-data">

      @csrf
        @include('portfolio::admin.portfolios.form')

    </form>
  </section>
@endsection

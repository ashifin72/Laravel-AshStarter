@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') {{__('admin.add')}} @endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('sections') {{__('admin.sections')}} @endslot
      @slot('active') {{__('admin.add')}}@endslot
    @endcomponent
  </div>
  <!-- /.content-header -->
  <section class="content card-body card">
    <div class="card-header">
      <h3 class="card-title">{{__('admin.sections')}} {{__('admin.add')}}</h3>

    </div>
    <div class="card-body p-0">
      <form method="POST" action="{{route('admin.sections.store', $item->id)}}">
        @csrf
          @include('section::admin.sections.form')

      </form>
    </div>

  </section>
@endsection

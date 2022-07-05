@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title'){{__('admin.edit')}} {{$item->title}}@endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('sections') {{__('admin.sections')}} @endslot
      @slot('active') {{__('admin.edit')}} {{$item->name}}@endslot
    @endcomponent


  </div>
  <!-- /.content-header -->

  <section class="content card card-body">
    <!-- Small boxes (Stat box) -->
    <div class="card-header">
      <h3 class="card-title">{{$item->title}}</h3>
    </div>
    <div class="card-body p-0">
      <form method="POST" action="{{route('admin.sections.update', $item->id)}}">
        @method('PATCH')
        @csrf
          @include('section::admin.sections.form')
      </form>
      @if($item->id != 1)
          <x-form.destroy :route="route('admin.sections.destroy', $item->id)" />

      @endif
    </div>





  </section>
@endsection

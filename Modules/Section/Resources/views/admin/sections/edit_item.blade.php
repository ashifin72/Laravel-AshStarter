@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') {{__('admin.edit') . " " . $item->title}} @endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('sections') {{__('admin.sections')}} @endslot
      @slot('active') {{__('admin.add')}}@endslot
    @endcomponent


  </div>
  <!-- /.content-header -->

  <section class="content card-body card">
    <!-- Small boxes (Stat box) -->

    <div class="card-body p-0">
      <form method="POST" action="{{route('admin.section_items.update', $item->id)}}">
        @method('PATCH')
        @csrf
          @include('section::admin.sections.form-item')

      </form>
        <x-form.destroy :route="route('admin.section_items.destroy', $item->id)" />
    </div>


  </section>
@endsection

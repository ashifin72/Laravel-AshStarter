@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title'){{__('admin.show')}} {{$item->title}}@endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('sections') {{__('admin.sections')}} @endslot
      @slot('active') {{__('admin.show')}} {{$item->name}}@endslot
    @endcomponent


  </div>
  <!-- /.content-header -->

  <section class="content card card-body">
    <!-- Small boxes (Stat box) -->
    <div class="card-header">
      <h3 class="card-title">{{$item->title}}</h3>
    </div>
    <div class="card-body p-0">
      <div class="card-body table-responsive p-0 card">
        <table class="table table-hover text-nowrap">
          <thead>
          <tr>
            <th>ID</th>
            <th>{{__('admin.name')}}</th>
            <th>{{__('admin.mini_img')}}</th>
            <th>{{__('admin.sort')}}</th>
            <th>{{__('admin.status')}}</th>
            <th>
              <form action="{{route('admin.section_items.create')}}"
                    class="float-right"
                    method="get">
                <input type="hidden" name="section_id" value="{{$item->id}}">
                <button type="submit"
                        class="btn btn-outline-success btn-create-header">
                  {{__('admin.add')}} {{__('admin.article')}} для {{$item->title}}
                </button>
              </form>
            </th>

          </tr>
          </thead>
          @forelse($sectItems as $sectItem)
            <tr>
              <td>{{$sectItem->id}}</td>
              <td>{{$sectItem->title}}</td>
              <td>@isset($sectItem->img)
                  <img style="width: 80px" src="{{$sectItem->img}}" alt="{{$sectItem->title}}">
                @endisset
              </td>
              <td><span class="tag tag-success ml-4">{{$sectItem->sort}}</span></td>
              <td>
                @if ($sectItem->status == 1)
                  <span class="badge badge-success">{{__('admin.active')}}</span>
                @else <span class="badge badge-danger">{{__('admin.disabled')}}</span>
                @endif
              </td>
              <td class="project-actions text-right">
                  <x-form.button-block :item="$sectItem" type="section_items" :show="false" />

              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                {{__('admin.article_none')}}
              </td>
            </tr>

          @endforelse

        </table>
        <form action="{{route('admin.section_items.create')}}" method="get">
          <input type="hidden" name="section_id" value="{{$item->id}}">
          <button type="submit" class="btn btn-outline-success">{{__('admin.add')}}</button>
        </form>

      </div>
    </div>

  </section>
@endsection

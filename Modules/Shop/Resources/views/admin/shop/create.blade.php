@extends('admin.index')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    @component('admin.components.breadcrumb')
      @slot('title') {{__('admin.add')}} продукт@endslot
      @slot('parent') {{__('admin.home')}} @endslot
      @slot('product') Продукты магазина @endslot
      @slot('active') {{__('admin.add')}} @endslot
    @endcomponent
  </div>
  <!-- /.content-header -->

  <section class="content card-body card">
    <!-- Small boxes (Stat box) -->
    <form method="POST" action="{{route('admin.products.store', $item->id)}}" enctype="multipart/form-data">

      @csrf
      <input type="hidden" name="id" value="{{$item->id}}">
      <div class="row">
        <div class="col-sm-8">

          <ul class="nav nav-tabs" id="nav-tab" role="tablist">

            @php $i=1   @endphp
            @forelse($locales as $locale)
              <li class="nav-item">
                <a class="nav-link @if($i==1) active @endif" data-toggle="tab"
                   href="#{{$locale->local}}">{{__('admin.version')}} {{$locale->local}}</a>
              </li>
              @php $i++   @endphp
            @empty
              <h4>{{__('admin.none')}}</h4>
            @endforelse

          </ul>
          <div class="tab-content">
            @php $i=1   @endphp
            @forelse($locales as $locale)

              <div class="tab-pane fade @if($i==1) show active @endif" id="{{$locale->local}}">
                @php
                  $title = 'title_' . $locale->local;
                  $description = 'description_' . $locale->local;
                  $content = 'content_' . $locale->local;
                @endphp
                <div class="tab-content">
                  <div class="tab-pane active">
                    <div class="form-group">

                      <label for="title">{{__('admin.name')}} {{$locale->local}}</label>

                      <input type="text" name="{{$title}}" value="{{$item->$title}}"
                             id="title" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                      <textarea class="form-control content-editor" id="editor{{$loop->iteration}}"
                                rows="10"
                                name="{{$content}}">
                                {{ $item->$content}}
                       </textarea>
                    </div>
                    <div class="form-group">
                      <label for="title">{{__('admin.description')}} {{$locale->local}}</label>
                      <textarea class="form-control" id="editor{{$loop->iteration+10}}" rows="3"
                                name="{{$description}}">
                                {{ $item->$description}}
                                    </textarea>
                    </div>


                  </div>
                </div>
              </div>
              @php $i++   @endphp
            @empty
              <h4>{{__('admin.none')}}</h4>
            @endforelse
          </div>

          <div class="form_check" style="margin: 25px">
            <input type="hidden" name="status" value="0">

            <input type="checkbox"
                   name="status"
                   class="form-check-input"
                   value="1"
                   @if ($item->status)
                   checked="checked"
              @endif
            >
            <label for="status" class="form-check-label">{{__('admin.is_published')}}</label>
          </div>
          <input type="hidden" name=id value="{{$item->id}}">

          <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
        </div>
        @include('shop::admin.shop.inc.sidebar')
      </div>

    </form>
  </section>
@endsection

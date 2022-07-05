@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{$item->name}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('local') {{__('admin.currencies')}} @endslot
            @slot('active') {{__('admin.edit ')}}{{$item->name}}@endslot
        @endcomponent
    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.currencies.update', $item->id)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="title">{{__('Название')}}</label>
                    <input type="text" name="title" value="{{$item->title}}"
                           id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="title">{{__('Кодировка')}}</label>
                    <input type="text" name="code" value="{{$item->code}}"
                           id="code" class="form-control" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="title">{{__('Курс')}}</label>
                    <input type="text" name="value" value="{{$item->value}}"
                           id="local" class="form-control">
                </div>
                <div class="form-group col-md-1">
                    <label for="title">{{__('Сортировка')}}</label>
                    <input type="number" min="1" max="10" name="sort" value="{{$item->sort ?? 1}}"
                           id="local" class="form-control" required>
                </div>
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
                <label for="status" class="form-check-label">Опубликованно</label>
            </div>
            <input type="hidden" name="id" value="{{$item->id}}">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>


    </section>
@endsection

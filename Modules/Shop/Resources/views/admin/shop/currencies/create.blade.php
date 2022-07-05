@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('Добавить валюту')}} @endslot
            @slot('parent') {{__('Главная')}} @endslot
            @slot('currencies') {{__('Валюты')}} @endslot
            @slot('active') {{__('Добавить валюту')}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card card-body">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.currencies.store')}}">

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
                <label for="status" class="form-check-label">{{__('Опубликованно')}}</label>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-add">{{__('Сохранить')}}</button>
        </form>


    </section>
@endsection

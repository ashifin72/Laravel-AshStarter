@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add') . ' '.  __('admin.article') . ' для ' . $section->title}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('sections') {{__('admin.sections')}} @endslot
            @slot('active'){{__('admin.add') . ' '.  __('admin.article') . ' для ' . $section->title}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->

        <div class="card-body p-0">
            <form method="POST" action="{{route('admin.section_items.store', $item->id)}}">
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        @forelse($locales as $locale)
                            @php
                                $title = 'title_' . $locale->local;
                                $description = 'description_' . $locale->local;
                                $content = 'content_' . $locale->local;
                            @endphp
                            <div class="form-group">

                                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>

                                <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                                       id="title" class="form-control" required>
                            </div>
                            <
                            <div class="form-group">
                                <label for="title">{{__('admin.description')}} {{$locale->local}}</label>
                                <x-form.textarea :content="$description" :item="$item" rows="3"/>

                            </div>

                            <div class="form-group">
                                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                                <x-form.editor :content="$content" :item="$item" rows="5"/>

                            </div>
                        @empty
                            <h4>{{__('admin.none')}}</h4>
                        @endforelse
                            <x-form.published :item="$item->status" />
                        <input type="hidden" name="section_id" value="{{$section->id}}">
                        <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
                    </div>
                    <div class="col-sm-3">

                        <div class="form-group">
                            <label for="title">{{__('admin.sort')}}</label>
                            <input type="number" min="1" max="10" name="sort" value="{{$item->sort ?? 1}}"
                                   id="local" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('URL')}}</label>
                            <input type="text" name="path" value="{{$item->path}}"
                                   id="path" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="icon">{{__('admin.icon_cod')}}</label>
                            <input type="icon" name="icon" value="{{$item->icon}}"
                                   id="icon" class="form-control">
                        </div>
                        <x-form.dow-input :item="$item" id="dow_img1" img="img" />
                    </div>

                </div>

            </form>
        </div>


    </section>
@endsection

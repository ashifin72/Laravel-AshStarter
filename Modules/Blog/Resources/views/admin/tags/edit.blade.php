@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{$item->title}}@endslot

                @slot('parent') {{__('admin.home')}} @endslot
                @slot('tags') {{__('blog.tags')}} @endslot
                @slot('active') {{__('admin.edit')}} {{$item->title}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.tags.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @include('blog::admin.tags.form')

        </form>
        <x-form.destroy :route="route('admin.tags.destroy', $item->id)" />



    </section>
@endsection

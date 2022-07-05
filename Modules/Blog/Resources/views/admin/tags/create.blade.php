@extends('admin..index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

        @component('admin.components.breadcrumb')
            @slot('title') {{__('blog.tags')}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('tags') {{__('blog.tags')}} @endslot
            @slot('active') {{__('admin.add_tag')}} @endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.tags.store')}}" enctype="multipart/form-data">

            @csrf
            @include('blog::admin.tags.form')
        </form>




    </section>
@endsection

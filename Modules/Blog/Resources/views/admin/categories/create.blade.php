@extends('admin..index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add_category')}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('category') {{__('admin.categories_blog')}} @endslot
            @slot('active') {{__('admin.add_category')}} @endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content card-body card">
        <!-- Small boxes (Stat box) -->


        <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">

            @csrf
            @include('blog::admin.categories.form')
        </form>




    </section>
@endsection

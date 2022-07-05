@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('admin.add')}} {{__('portfolio::admin.feedback')}}@endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('feedback') {{__('portfolio::admin.feedback')}} @endslot
            @slot('active') {{__('admin.add')}}@endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('admin.add')}} {{__('portfolio.feedback')}}</h3>

                <x-form.card-tool/>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.portfolio_feedback.store', $item->id)}}" enctype="multipart/form-data">

                    @csrf
                    @include('portfolio::admin.portfolios.feedback.form')


                </form>
            </div>
        </div>

    </section>
@endsection

@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

        @component('admin.components.breadcrumb')
            @slot('title') {{__('blog.tags')}} @endslot

            @slot('parent') {{__('admin.home')}} @endslot
            @slot('active') {{__('blog.tags')}} @endslot
        @endcomponent

    </div>
    <!-- /.content-header -->

    <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="card-body table-responsive p-0 card">

            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{__('admin.name')}}</th>
                    <th>{{__('admin.slug')}}</th>
                    <th>
                        <a class="btn btn-outline-success btn-add"
                           href="{{route('admin.tags.create')}}">{{__('admin.add_article')}}
                        </a>
                    </th>

                </tr>
                </thead>
                <tbody>

                @forelse($items as $item)

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->slug}}</td>

                            <td class="project-actions text-right">
                                <x-form.button-block :item="$item" type="tags" :show="false" />
                            </td>
                        </tr>

                @empty
                    <tr>
                        <td colspan="6">{{__('admin.article_none')}}</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="card card-footer clearfix admin-paginate">
            {{ $items->links() }}
        </div>
    </section>



@endsection

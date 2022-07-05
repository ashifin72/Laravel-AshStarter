@extends('admin.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        @component('admin.components.breadcrumb')
            @slot('title') {{__('shop.shop_categories')}} @endslot
            @slot('parent') {{__('admin.home')}} @endslot
            @slot('active') {{__('shop.shop_categories')}} @endslot
        @endcomponent


    </div>
    <!-- /.content-header -->

    <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('shop.shop_categories')}}</h3>

            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('admin.name')}}</th>
                        <th>{{__('admin.mini_img')}}</th>
                        <th>{{__('admin.sort')}}</th>
                        <th>{{__('admin.status')}}</th>

                        <th><a class="btn btn-outline-success btn-create-header mr-2"
                               href="{{route('admin.product_categories.create')}}">{{__('admin.add')}}</a></th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td><img style="width: 50px" src="{{asset($item->img)}}" alt="{{$item->title}}"></td>
                            <td><span class="tag tag-success">{{$item->sort}}</span></td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">{{__('admin.active')}}</span>
                                @else <span class="badge badge-danger">{{__('admin.disabled')}}</span>
                                @endif
                            </td>


                            <td class="project-actions text-right">
                                <x-form.button-block :item="$item" type="product_categories" :show="false"/>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <th colspan="6">{{__('admin.article_none')}}</th>
                        </tr>

                    @endforelse


                    </tbody>
                </table>
            </div>

        </div>

        <div class="card card-footer clearfix admin-paginate">
            {{ $items->links() }}
        </div>
    </section>

@endsection

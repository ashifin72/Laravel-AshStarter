<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                @if (isset($title)){{$title}}@endif
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li  class="breadcrumb-item"><a href="{{asset('/admin')}}"><i class="fas fa-home"></i>{{$parent}}</a>  </li>
                @if (isset($local))
                    <li><a href="{{route('admin.locales.index')}}"><i></i>{{$local}}</a></li>
                @endif
                @if (isset($slider))
                    <li><a href="{{route('admin.slider.index')}}"><i></i>{{$slider}}</a></li>
                @endif
                @if (isset($users))
                    <li><a href="{{route('admin.users.index')}}"><i></i>{{$users}}</a></li>
                @endif
                @if (isset($sections))
                    <li><a href="{{route('admin.sections.index')}}"><i></i>{{$sections}}</a></li>
                @endif
                @if (isset($menus))
                    <li><a href="{{route('admin.menus.index')}}"><i></i>{{$menus}}</a></li>
                @endif
                @if (isset($info))
                    <li><a href="{{route('admin.info.index')}}"><i></i>{{$info}}</a></li>
                @endif
                @if (isset($product))
                    <li><a href="{{route('admin.products.index')}}"><i></i>{{$product}}</a></li>
                @endif
                @if (isset($product_category))
                    <li><a href="{{route('admin.product_categories.index')}}"><i></i>{{$product_category}}</a></li>
                @endif
                @if (isset($currencies))
                    <li><a href="{{route('admin.currencies.index')}}"><i></i>{{$currencies}}</a></li>
                @endif
                @if (isset($category))
                    <li><a href="{{route('admin.categories.index')}}"><i></i>{{$category}}</a></li>
                @endif
                @if (isset($posts))
                    <li><a href="{{route('admin.posts.index')}}"><i></i>{{$posts}}</a></li>
                @endif
                @if (isset($comments))
                    <li><a href="{{route('admin.comments.index')}}"><i></i>{{$comments}}</a></li>
                @endif
                @if (isset($filters))
                    <li><a href="{{route('admin.portfolio_categories.index')}}"><i></i>{{$filters}}</a></li>
                @endif
                @if (isset($portfolios))
                    <li><a href="{{route('admin.portfolios.index')}}"><i></i>{{$portfolios}}</a></li>
                @endif
                @if (isset($feedback))
                    <li><a href="{{route('admin.portfolio_feedback.index')}}"><i></i>{{$feedback}}</a></li>
                @endif
                @if (isset($tags))
                    <li><a href="{{route('admin.tags.index')}}"><i></i>{{$tags}}</a></li>
                @endif
                <li><i class="breadcrumb-item active"></i> {{$active}}</li>

            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->


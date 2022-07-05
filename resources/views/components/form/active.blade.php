@props(["item"=>"item"])
@if($item == 1)
    <div class="alert alert-default-success" role="alert">
        {{__('admin.is_published')}}
    </div>
@else
    <div class="alert alert-default-danger" role="alert">
        {{__('admin.disabled')}}
    </div>

@endif

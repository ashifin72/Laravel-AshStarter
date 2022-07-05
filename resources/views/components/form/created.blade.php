@props(["item"])
<div class="form-group">
    <label for="title">{{__('admin.created_at')}} {{$item->created_at}}</label>
    <input type="date" name="created_at" class="form-control mydate" value="{{$item->created_at}}">
</div>
<div class="form-group">
    <label for="title">{{__('admin.update_at')}} {{$item->updated_at}}</label>
    <input type="date" name="updated_at" class="form-control mydate" value="{{$item->updated_at}}">
</div>

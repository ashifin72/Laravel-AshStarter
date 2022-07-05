@props(["item"=>"item", "img"=> "img", "id"=>"id"])
<div>
    @if($item->$img)
        <img class="admin__img-head" src="{{$item->$img}}" alt="{{$item->title}}">
        <label class="admin__label-img" for="title">{{__('admin.replace_img')}}</label>
    @else
        <label class="admin__label-img" for="title">{{__('admin.upload_img')}}</label>
    @endif
    <span class="input-group-btn">
                              <a id="{{$id}}" data-input="{{'thumbnail' . $id}}" data-preview="holder" class="btn btn-outline-success">
                              <i class="fa fa-picture-o"></i> {{__('portfolio.click-img')}}"
                              </a>
                            </span>
    <div class="input-group">

        <input id="{{'thumbnail' . $id}}" class="form-control" type="text"
               value="{{$item->$img}}"
               name="{{$img}}">
    </div>
</div>

<div class="col-sm-4">
  <x-form.active :item="$item->status" />
  <div class="alert alert-default-dark" role="alert">
    <a href="">{{__('admin.look_article')}}</a>
  </div>

  <div class="form-group">
    <label for="title">URL</label>
    <input type="text" name="slug" value="{{$item->slug}}"
           id="title" class="form-control">
  </div>
    <div class="form-group">
      <label for="title">Стоимость Гр-н</label>
      <input type="number" min="1" max="100000" name="price" value="{{$item->price}}"
             id="title" class="form-control">
    </div>

  <div class="parent_id form-group">
    <label for="title">Категория</label>
    <select type="text" name="category_id" value="{{$item->category_id}}"
            id="category_id" class="form-control" placeholder="Выберите категорию"
            required>
      @foreach($categoryList as $categoryOption)
        <option value="{{$categoryOption->id}}"
                @if($categoryOption->id == $item->category_id) selected @endif>

          {{$categoryOption->id_title}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="title">{{__('admin.sort')}}</label>
    <input type="number" min="1" max="10" name="sort" value="{{$item->sort ?? 1}}"
           id="local" class="form-control" required>
  </div>
  <div class="form-group">
      <x-form.dow-input :item="$item" img="img" id="dow_img1" />
  </div>
<x-form.created :item="$item" />


</div>

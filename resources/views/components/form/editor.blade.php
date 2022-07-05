@props(["item"=>"item", "content"=> "content", "rows"=> "rows"])
<textarea class="form-control content-editor"
          rows="$rows"
          name="{{$content}}">
          {{ $item->$content}}
</textarea>

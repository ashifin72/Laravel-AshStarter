
@props(["item"=>"item", "content"=> "content", "rows"=> "rows"])
<textarea class="form-control ash-editor"
          rows="{{$rows}}"
          name="{{$content}}">
          {{trim($item->$content) }}
</textarea>

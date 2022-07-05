@props(["item"=>"item", "type"=>"type", "show"=>"show"])
@if($show)
    <a class="btn btn-primary btn-sm" href="{{route('front.' . $type . '.edit', $item->slug)}}">
        <i class="fas fa-folder">
        </i>
        View
    </a>
@endif
<a class="btn btn-info btn-sm" href="{{route('admin.' . $type . '.edit', $item->id)}}">
    <i class="fas fa-pencil-alt">
    </i>
    Edit
</a>
<form
    action="{{ route('admin.' . $type . '.destroy', $item->id) }}"
    method="post" class="float-right ml-2">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"
            onclick="return confirm('Подтвердите удаление')">
        <i class="fas fa-trash">
        </i>
    </button>
</form>

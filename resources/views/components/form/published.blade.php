@props(["item"=>"item"])
<div class="form_check" style="margin: 25px">
    <input type="hidden" name="status" value="0">

    <input type="checkbox"
           name="status"
           class="form-check-input"
           value="1"
           @if ($item)
           checked="checked"
        @endif
    >
    <label for="status" class="form-check-label">{{__('admin.is_published')}}</label>
</div>

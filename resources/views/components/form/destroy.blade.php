@props(["route"=>"route"])
<form method="post" onsubmit='return false' action="{{$route}}">
    @method('DELETE')
    @csrf
    <div class="row justify-content-start ml-1" style="margin-top: 25px">
        <button type="submit" onclick=' confirm("to precisely remove?") ? this.form.submit() : ""'
                class="btn btn-outline-danger">{{__('admin.remove')}}</button>
    </div>
</form>

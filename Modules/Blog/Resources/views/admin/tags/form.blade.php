<div class="row">
    <div class="col-sm-8">

        @forelse($locales as $locale)
        <div class="form-group">


            <label for="title">{{__('admin.name')}} {{$locale->local}}</label>
            @php
            $title = 'title_' . $locale->local;

            @endphp
            <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                   id="title" class="form-control" required>
        </div>


        @empty
        <h4>{{__('admin.none')}}</h4>
        @endforelse
    </div>

    <div class=" col-sm-4">

        <div class="form-group">
            <label for="slug">URL {{__('admin.slug_generate')}}</label>
            <input type="text" name="slug" value="{{$item->slug}}"
                   id="slug" class="form-control">
        </div>
    </div>


</div>

<input type="hidden" name="id" value="{{$item->id}}">
<button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>

<div class="row">
    <div class="col-sm-9">
        @forelse($locales as $locale)
            @php
                $title = 'title_' . $locale->local;
                $slogan = 'slogan_' . $locale->local;
                $description = 'description_' . $locale->local;
            @endphp
            <div class="form-group">

                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>

                <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                       id="title" class="form-control" required>
            </div>
            <div class="form-group">

                <label for="title">{{__('admin.slogan')}} {{$locale->local}}</label>

                <input type="text" name="{{$slogan}}" value="{{$item->$slogan}}"
                       id="{{$slogan}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                <x-form.editor :content="$description" :item="$item" rows="10"/>

            </div>
        @empty
            <h4>{{__('admin.none')}}</h4>
        @endforelse
        <div class="form_check" style="margin: 25px">
            <input type="hidden" name="status" value="0">

            <input type="checkbox"
                   name="status"
                   class="form-check-input"
                   value="1"
                   @if ($item->status)
                   checked="checked"
                @endif
            >
            <label for="status" class="form-check-label">{{__('admin.active')}}</label>
        </div>
        <input type="hidden" name="id" value="{{$item->id}}">
        <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
    </div>
    <div class="col-sm-3">

        <div class="form-group">
            <label for="title">{{__('admin.sort')}}</label>
            <input type="number" min="1" max="10" name="sort" value="{{$item->sort ?? 1}}"
                   id="local" class="form-control" required>
        </div>
        @isset($item->img)
            <img class="responsive" style="width: 230px" src="{{$item->img}}"
                 alt="{{$item->title}}">
        @endisset
        <div class="form-group">
            <x-form.dow-input :item="$item" img="img" id="dow_img1" />
        </div>
    </div>

</div>

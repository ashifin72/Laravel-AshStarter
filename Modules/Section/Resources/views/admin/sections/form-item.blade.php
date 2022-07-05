<div class="row">
    <div class="col-sm-9">
        @forelse($locales as $locale)
            @php
                $title = 'title_' . $locale->local;
                $description = 'description_' . $locale->local;
                $content = 'content_' . $locale->local;
            @endphp
            <div class="form-group">

                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>

                <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                       id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">{{__('admin.description')}} {{$locale->local}}</label>
                <x-form.textarea :content="$description" :item="$item" rows="3" />

            </div>

            <div class="form-group">
                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                <x-form.editor :content="$content" :item="$item" rows="5" />

            </div>
        @empty
            <h4>{{__('admin.none')}}</h4>
        @endforelse
        <x-form.published :item="$item->status" />
        <input type="hidden" name="section_id" value="{{$item->section_id}}">
        <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
    </div>
    <div class="col-sm-3">
        <x-form.active :item="$item->status" />


        <div class="form-group">
            <label for="title">{{__('admin.sort')}}</label>
            <input type="number" min="1" max="10" name="sort" value="{{$item->sort ?? 1}}"
                   id="local" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">{{__('URL')}}</label>
            <input type="text" name="path" value="{{$item->path}}"
                   id="path" class="form-control">
        </div>
        <div class="form-group">
            <label for="icon">{{__('admin.icon_cod')}}</label>
            <input type="icon" name="icon" value="{{$item->icon}}"
                   id="icon" class="form-control">
        </div>
        <x-form.dow-input :item="$item" id="dow_img1" img="img" />

    </div>

</div>

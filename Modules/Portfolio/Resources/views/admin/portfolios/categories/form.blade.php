<div class="row">
    <div class="col-sm-8">
        @forelse($locales as $locale)
            <div class="form-group">


                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>
                @php
                    $title = 'title_' . $locale->local;
                    $description = 'description_' . $locale->local;
                    $content = 'content_' . $locale->local;
                @endphp
                <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                       id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">{{__('admin.description')}} {{$locale->local}}</label>
                <x-form.textarea :content="$description" :item="$item" rows="10"/>

            </div>
            <div class="form-group">
                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                <x-form.editor  :content="$content" :item="$item" rows="10"/>


            </div>
        @empty
            <h4>{{__('admin.none')}}</h4>
        @endforelse


       <x-form.published :item="$item->status" />
        <input type="hidden" name=id value="{{$item->id}}">

        <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="title">URL</label>
            <input type="text" name="slug" value="{{$item->slug}}"
                   id="title" class="form-control">
            <small id="emailHelp" class="form-text text-muted">
                {{__('admin.slug_generate')}}
            </small>
        </div>

        <div class="form-group">
            <label for="title">{{__('admin.sort')}}</label>
            <input type="number" min="1" max="10" name="sort" value="{{$item->sort}}"
                   id="local" class="form-control" required>
        </div>
        <div class="form-group  admin__img-block">
            <x-form.dow-input :item="$item" img="img" id="dow_img1" />
        </div>
    </div>
</div>

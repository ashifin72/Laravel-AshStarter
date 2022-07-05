<div class="row">
    <div class="col-sm-8">
        @forelse($locales as $locale)
            @php
                $title = 'title_' . $locale->local;
                $description = 'description_' . $locale->local;
                $name = 'name_' . $locale->local;
            @endphp
            <div class="form-group">

                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>
                <input type="text" name="title_{{$locale->local}}" value="{{$item->$title}}"
                       id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">{{__('admin.name_feedback')}} {{$locale->local}}</label>
                <input type="text" name="name_{{$locale->local}}" value="{{$item->$name}}"
                       id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                <x-form.editor  :item="$item" :content="$description" rows="5"/>
            </div>
        @empty
            <h4>{{__('admin.none')}}</h4>
        @endforelse


       <x-form.published :item="$item->status" />
        <input type="hidden" name=id value="{{$item->id}}">

        <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
    </div>
    <div class="col-sm-4">
        @if($item->status == 1)
            <div class="alert alert-default-success" role="alert">
                {{__('admin.is_published')}}
            </div>
        @else
            <div class="alert alert-default-danger" role="alert">
                {{__('admin.disabled')}}
            </div>

        @endif

        <div class="form-group">
            <label for="title">{{__('admin.sort')}}</label>
            @php $sort =  $item->sort ?? 1 @endphp
            <input type="number" min="1" max="10" name="sort" value="{{$sort}}"
                   id="local" class="form-control" required>
        </div>
        <div class="parent_id form-group">
            <label for="portfolio_id">{{__('admin.portfolio_filter')}}</label>

            <select type="text" name="portfolio_id" value="{{$item->portfolio_id}}"
                    id="portfolio_id" class="form-control" placeholder="Выберите">
                @foreach($feedbackList as $feedbackOption)
                    <option value="{{$feedbackOption->id}}"
                            @if($feedbackOption->id == $item->portfolio_id) selected @endif>
                        {{$feedbackOption->id_title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <x-form.dow-input :item="$item" img="img" id="dow_img1" />


        </div>
        <div class="form-group">
            <x-form.dow-input :item="$item" img="screen" id="dow_img2" />

{{--            <label for="slug">@if($item->sreen) <img class="admin__img-head" src="{{$item->sreen}}"--}}
{{--                                                     alt="{{$item->img_alt}}">--}}


{{--                {{__('admin.sreen')}}--}}
{{--                @else <i class="fas fa-images"></i> {{__('Загрузить фото')}}--}}
{{--                @endif--}}
{{--            </label>--}}
{{--            <input type="text" name="screen" readonly="readonly"--}}
{{--                   id="dow_img2"--}}
{{--                   placeholder="{{__('portfolio::admin.click-img')}}"--}}
{{--                   value="{{$item->sreen}}" class="form-control btn btn-outline-success"/>--}}

        </div>
        <div class="form-group">
            <label for="title">{{__('admin.created_at')}}</label>
            <input type="text" class="form-control" value="{{$item->created_at}}" disabled>
        </div>
        <div class="form-group">
            <label for="title">{{__('admin.update_at')}}</label>
            <input type="text" class="form-control" value="{{$item->updated_at}}" disabled>
        </div>
    </div>
</div>

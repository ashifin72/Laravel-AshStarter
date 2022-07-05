
<div class="row">
    <div class="col-sm-8">
        <ul class="nav nav-tabs" id="nav-tab" role="tablist">
            @php $i=1   @endphp
            @forelse($locales as $locale)
                <li class="nav-item">
                    <a class="nav-link @if($i==1) active @endif" data-toggle="tab"
                       href="#{{$locale->local}}">{{__('admin.version')}} {{$locale->local}}</a>
                </li>
                @php $i++   @endphp
            @empty
                <h4>{{__('admin.none')}}</h4>
            @endforelse

        </ul>
        <div class="tab-content">
            @php $i=1   @endphp
            @forelse($locales as $locale)

                <div class="tab-pane fade @if($i==1) show active @endif" id="{{$locale->local}}">
                    @php
                        $title = 'title_' . $locale->local;
                        $description = 'description_' . $locale->local;

                        $content = 'content_' . $locale->local;
                    @endphp
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="form-group">

                                <label for="title">{{__('admin.name')}} {{$locale->local}}</label>

                                <input type="text" name="{{$title}}" value="{{$item->$title}}"
                                       id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="title">{{__('admin.text')}} {{$locale->local}}</label>
                                <x-form.editor :content="$content" :item="$item" rows="10" />
                            </div>
                            <div class="form-group">
                                <label for="title">{{__('admin.description')}} {{$locale->local}}</label>
                                <x-form.textarea :content="$description" :item="$item" rows="3" />
                            </div>


                        </div>
                    </div>
                </div>
                @php $i++   @endphp
            @empty
                <h4>{{__('admin.none')}}</h4>
            @endforelse
        </div>

       <x-form.published :item="$item->status" />
        <input type="hidden" name=id value="{{$item->id}}">

        <button type="submit" class="btn btn-outline-success">{{__('admin.save')}}</button>
    </div>
    @include('shop::admin.shop.inc.sidebar')
</div>

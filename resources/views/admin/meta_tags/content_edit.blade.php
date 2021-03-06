<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Meta теги</h6>
    </div>

    <div class="panel-body">
        <form method="post" class="form-horizontal">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    @foreach($languages as $language)
                        <li class="{{$language->locale==Lang::getLocale() ? 'active' : ''}}">
                            <a href="#tab_{{$language->id}}" data-toggle="tab">
                                <img src="{{asset('assets/admin/assets/images/flags/'.$language->image)}}">
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach($languages as $language)
                        <div class="tab-pane {{$language->locale==Lang::getLocale() ? 'active' : ''}}" id="tab_{{$language->id}}">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Title</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title[{{$language->locale}}]" value="{{ $metaTagsTransaltionsLite['title'][$language->locale] }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Description</label>
                                <div class="col-lg-10">
                                    <textarea id="description[{{$language->locale}}]" name="description[{{$language->locale}}]" class="form-control">{!! $metaTagsTransaltionsLite['description'][$language->locale] !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Keywords</label>
                                <div class="col-lg-10">
                                    <input type="text" name="keywords[{{$language->locale}}]" value="{{ $metaTagsTransaltionsLite['keywords'][$language->locale] }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
        </form>
    </div>
</div>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Создать</h6>
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
                                <label class="control-label col-lg-2">Название</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name[{{$language->locale}}]" value="{{ old('name.'.$language->locale) }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Описание</label>
                                <div class="col-lg-10">
                                    <textarea name="description[{{$language->locale}}]" class="form-control">{{ old('description.'.$language->locale) }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Цена</label>
                <div class="col-lg-10">
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Категория</label>
                <div class="col-lg-10">
                    <select name="menu_category_id" class="form-control">
                        @foreach($menuCategories as $menuCategory)
                            <option value="{{$menuCategory->id}}">{{$menuCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Создать <i class="icon-arrow-right14 position-right"></i></button>
        </form>
    </div>
</div>
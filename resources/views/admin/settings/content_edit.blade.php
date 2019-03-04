<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Настройки</h6>
    </div>

    <div class="panel-body">
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-lg-2">Номер Телефона</label>
                <div class="col-lg-10">
                    <input type="text" name="phone" value="{{ $settings->phone }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Адрес</label>
                <div class="col-lg-10">
                    <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Facebook Линк</label>
                <div class="col-lg-10">
                    <input type="text" name="facebook_link" value="{{ $settings->facebook_link }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Название Инстаграм Страницы</label>
                <div class="col-lg-10">
                    <input type="text" name="instagram_page_name" value="{{ $settings->instagram_page_name }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">WhatsApp Линк</label>
                <div class="col-lg-10">
                    <input type="text" name="whatsapp_link" value="{{ $settings->whatsapp_link }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Широта</label>
                <div class="col-lg-10">
                    <input type="text" name="map_latitude" value="{{ $settings->map_latitude }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Долгота</label>
                <div class="col-lg-10">
                    <input type="text" name="map_longitude" value="{{ $settings->map_longitude }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Zoom</label>
                <div class="col-lg-10">
                    <input type="number" name="map_zoom" value="{{ $settings->map_zoom }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Кол-во последних постов с Инстаграма</label>
                <div class="col-lg-10">
                    <input type="number" max="12" name="instagram_feed_count_of_lasts" value="{{ $settings->instagram_feed_count_of_lasts }}" class="form-control">
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
        </form>
    </div>
</div>
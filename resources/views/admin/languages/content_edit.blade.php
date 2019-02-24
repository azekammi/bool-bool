<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">{{Lang::get("admin.edit_category")}}</h6>
    </div>

    <div class="panel-body">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-lg-2">{{Lang::get("admin.locale")}}</label>
                <div class="col-lg-10">
                    <input type="text" name="locale" value="{{ $language->locale }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">{{Lang::get("admin.image")}}</label>
                <div class="col-lg-10">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <img src="{{asset("assets/site/img/flags/".$language->image)}}">
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">{{Lang::get("admin.edit")}} <i class="icon-arrow-right14 position-right"></i></button>
        </form>
    </div>
</div>
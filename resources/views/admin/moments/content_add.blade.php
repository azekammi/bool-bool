<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Картины "О нас"</h6>
    </div>

    <div class="panel-body">
        <form method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-lg-2">Картина</label>
                <div class="col-lg-10">
                    <input type="file" name="image" class="file-styled">
                </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Создать <i class="icon-arrow-right14 position-right"></i></button>
        </form>
    </div>
</div>
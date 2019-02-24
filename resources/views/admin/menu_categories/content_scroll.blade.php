<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Категории меню</h5>
        <div class="heading-elements">
            <a href="{{route('adminMenuCategoryAdd')}}" class="btn btn-success">Добавить</a>
        </div>
    </div>
    <div class="panel-body text-center">
        <form method="get" action="" class="form-horizontal">
            <div class="form-group col-lg-6">
                <label class="control-label col-lg-6">Название</label>
                <div class="col-lg-6">
                    <input type="text" name="name" value="{{Request::input("name")}}" class="form-control">
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="col-lg-6">
                    <button type="submit" class="form-control">Отфильтровать</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($menuCategories)>0)
        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>
                    <a href="{{route("adminMenuCategoriesScroll").(!empty($filterQuery) || $orderBy!="id"||$orderType!="desc" ? "?" : "").$filterQuery.($orderBy=="id"&&$orderType=="desc" ? "" : (!empty($filterQuery) ? "&" : "")."order_by=id&order_type=".($orderType=="asc" && $orderBy=="id" ? "desc" : "asc"))}}">
                        #
                    </a>
                </th>
                @foreach($languages as $language)
                    <th>
                        <a href="{{route("adminMenuCategoriesScroll").(!empty($filterQuery) || $orderBy!="name"||$orderType!="desc" ? "?" : "").$filterQuery.($orderBy=="name"&&$orderType=="desc" ? "" : (!empty($filterQuery) ? "&" : "")."order_by=name&order_type=".($orderType=="asc" && $orderBy=="name" ? "desc" : "asc"))}}">
                            Название ({{$language->locale}})
                        </a>
                    </th>
                @endforeach
                <th>
                    Операции
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach($menuCategories as $menuCategory)
                    <tr>
                        <td>{{$menuCategory->menu_category_id}}</td>

                        @foreach($languages as $language)
                            <td>{{(isset($menuCategory->namesWithLangs[$language->locale]) ? $menuCategory->namesWithLangs[$language->locale] : "Default: ".Lang::getLocale())}}</td>
                        @endforeach
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('adminMenuCategoryEdit', ['id'=>$menuCategory->menu_category_id])}}"><i class="icon-pencil"></i> Редактировать</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#deleteModal" data-href="{{route('adminMenuCategoryDelete', ['id'=>$menuCategory->menu_category_id])}}"><i class="icon-bin"></i> Удалить</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="panel-body text-center">
            @include('pagination.admin', ['paginator' => $menuCategories, "route" => "adminMenuCategoriesScroll"])
        </div>
    @else
        <div class="panel-body text-center">
            <h6 class="no-margin text-semibold">Данные отсутствуют</h6>
        </div>
    @endif
</div>
<!-- /basic datatable -->

<!-- Danger modal -->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Удаление</h6>
            </div>

            <div class="modal-body">
                <h6 class="text-semibold">Вы действительно хотите удалить?</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
                <a type="button" class="btn btn-danger">Удалить</a>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('href') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-footer a').attr('href', recipient);
    })
</script>
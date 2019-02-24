<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">{{Lang::get("admin.languages")}}</h5>
        <div class="heading-elements">
            <a href="{{route('adminLanguageAdd')}}" class="btn btn-success">{{Lang::get("admin.create")}}</a>
        </div>
    </div>
    <div class="panel-body text-center">
        <form method="get" action="" class="form-horizontal">
            <div class="form-group col-lg-6">
                <label class="control-label col-lg-6">{{Lang::get("admin.name")}}</label>
                <div class="col-lg-6">
                    <select name="locale" class="form-control">
                        <option value="">{{Lang::get("admin.choose")}}</option>
                        @foreach($languagesAll as $languageAll)
                            <option {{(Request::input("locale")==$languageAll->locale ? "selected" : "")}} value="{{$languageAll->locale}}">{{$languageAll->locale}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="col-lg-6">
                    <button type="submit" class="form-control">{{Lang::get("admin.to_filter")}}</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($languages)>0)
        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>
                    <a href="{{route("adminLanguagesScroll").(!empty($filterQuery) || $orderBy!="id"||$orderType!="desc" ? "?" : "").$filterQuery.($orderBy=="id"&&$orderType=="desc" ? "" : (!empty($filterQuery) ? "&" : "")."order_by=id&order_type=".($orderType=="asc" && $orderBy=="id" ? "desc" : "asc"))}}">
                        #
                    </a>
                </th>
                <th>
                    <a href="{{route("adminLanguagesScroll").(!empty($filterQuery) || $orderBy!="locale"||$orderType!="desc" ? "?" : "").$filterQuery.($orderBy=="locale"&&$orderType=="desc" ? "" : (!empty($filterQuery) ? "&" : "")."order_by=locale&order_type=".($orderType=="asc" && $orderBy=="locale" ? "desc" : "asc"))}}">
                        {{Lang::get("admin.locale")}}
                    </a>
                </th>
                <th>
                    <a href="{{route("adminLanguagesScroll").(!empty($filterQuery) || $orderBy!="image"||$orderType!="desc" ? "?" : "").$filterQuery.($orderBy=="image"&&$orderType=="desc" ? "" : (!empty($filterQuery) ? "&" : "")."order_by=image&order_type=".($orderType=="asc" && $orderBy=="image" ? "desc" : "asc"))}}">
                        {{Lang::get("admin.flag")}}
                    </a>
                </th>
                <th>
                    {{Lang::get("admin.operations")}}
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>{{$language->id}}</td>

                        <td>{{$language->locale}}</td>
                        <td>
                            <img src="{{asset("assets/site/img/flags/".$language->image)}}">
                        </td>

                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{route('adminLanguageEdit', ['id'=>$language->id])}}"><i class="icon-pencil"></i> {{Lang::get("admin.edit")}}</a></li>
                                        <li><a href="" data-toggle="modal" data-target="#deleteModal" data-href="{{route('adminLanguageDelete', ['id'=>$language->id])}}"><i class="icon-bin"></i> {{Lang::get("admin.delete")}}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="panel-body text-center">
            @include('pagination.admin', ['paginator' => $languages, "route" => "adminLanguagesScroll"])
        </div>
    @else
        <div class="panel-body text-center">
            <h6 class="no-margin text-semibold">{{Lang::get("site.data_absent")}}</h6>
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
                <h6 class="modal-title">{{Lang::get("admin.warning_about_deleting")}}</h6>
            </div>

            <div class="modal-body">
                <h6 class="text-semibold">{{Lang::get("admin.do_you_realy_want_to_delete")}}</h6>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">{{Lang::get("admin.close")}}</button>
                <a type="button" class="btn btn-danger">{{Lang::get("admin.delete")}}</a>
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
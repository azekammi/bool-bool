<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Картины "О нас"</h5>
        <div class="heading-elements">
            <a href="{{route('adminMomentsImageAdd')}}" class="btn btn-success">Добавить</a>
        </div>
    </div>

    <table class="table datatable-basic">
        <thead>
        <tr>
            <th>#</th>
            <th>Картины</th>
            <th>Операции</th>
        </tr>
        </thead>

        <tbody>
            @foreach($momentsImages as $momentsImage)
                <tr>
                    <td>{{$momentsImage->id}}</td>
                    <td><img src="{{asset('assets/site/images/'.$momentsImage->image_name)}}" style="width:200px;"></td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('adminMomentsImageEdit', ['id'=>$momentsImage->id])}}"><i class="icon-pencil"></i> Сохранить</a></li>
                                    <li><a href="" data-toggle="modal" data-target="#deleteModal" data-href="{{route('adminMomentsImageDelete', ['id'=>$momentsImage->id])}}"><i class="icon-bin"></i> Удалить</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
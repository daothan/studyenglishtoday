
<!-- Show information User -->

    <div id="view_user" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <form action="" method="POST">
            <input type="text" class="user_id" name="user_id" value="">
        </form>
            @foreach($user as $data)
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center">{{$data->name}}</h3>
                </div>
                <div class="modal-body detail_user">
                    <div class="form-group col-centered">
                        <label>Username: </label>
                        <strong class="text-info"><i>{{$data->name}}</i></strong>
                    </div><hr>
                    <div class="form-group col-centered">
                        <label>Level: </label>
                        <strong class="text-info">
                            <i>
                                {{($data->level=='0') ? 'Super Admin' :''}}
                                {{($data->level=='1') ? 'Admin':''}}
                                {{($data->level=='2') ? 'Member':''}}
                            </i>
                        </strong>
                    </div><hr>
                    <div class="form-group col-centered">
                        <label>Email: </label>
                        <strong class="text-info"><i>{{$data->email}}</i></strong>
                    </div><hr>
                    <div class="form-group col-centered">
                    @foreach($user as $data)
                        <label>Created: </label>
                        <strong class="text-info"><i>{{Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diffForHumans() }} ({{ $data->created_at}})</i></strong>
                    @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_admin danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
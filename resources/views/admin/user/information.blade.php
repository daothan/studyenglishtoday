
<!-- Show information User -->

<div class="modal fade" id="view" role="dialog">
        <div class="modal-dialog modal-lg">
            @foreach($user as $data)
            <div class="content modal_background">
                <div class="modal-title">
                    <h3 class="modal_header" align="center">{{$data->name}}</h3>
                	<button id="reset" type="reset" class="close" data-dismiss="modal" style="color:black;"><span class="glyphicon glyphicon-remove"></span></button>
                </div>
                <div class="modal-body">
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
                    </div><hr>
                </div>
            </div>
            @endforeach
        </div>
    </div>
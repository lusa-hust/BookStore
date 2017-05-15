<!-- modal -->
<div class="modal fade" id="edit-user-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit user</h4>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="form-horizontal" action="{{route('dashboard.user.update')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10"> 
                            <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">New password:</label>
                        <div class="col-sm-10"> 
                            <input type="password" id="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="confirm_password">Confirm password:</label>
                        <div class="col-sm-10"> 
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-sm-2">Admin:</label>
                        <div class="col-sm-10">
                                <div class="checkbox">
                                    <label><input name="admin" value="1" type="checkbox" {{ $user->admin? 'checked' : ''}}></label>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="edit-user-button" type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
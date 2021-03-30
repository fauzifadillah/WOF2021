<form class="form" method="POST" action="{{ $model->exists ? route('account.update', $model->id) : route('account.store') }}">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input id="email" type="text" class="form-control" name="email" value="{{$model->email}}" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" value="{{$model->password}}" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="role" class="control-label">Role</label><br>
            <select id="role" type="text" class="form-control" name="role">
                <option value="0" selected="selected" disabled>Select Role</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" @if($role->id == $model->roles_id) selected="selected" @endif>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="control-label">Image</label>
            <input id="image" type="file" name="image">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

</form>
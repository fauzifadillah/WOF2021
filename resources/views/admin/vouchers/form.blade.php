<form class="form" method="POST" action="{{ $model->exists ? route('voucher.update', $model->id) : route('voucher.store') }}">
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
            <label for="desc" class="control-label">Description</label>
            <input id="desc" type="text" class="form-control" name="desc" value="{{$model->desc}}" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="points" class="control-label">Points</label>
            <input id="points" type="text" class="form-control" name="points" value="{{$model->points}}" placeholder="Points">
        </div>
        <div class="form-group">
            <label for="user" class="control-label">Merchant</label><br>
            <select id="user" type="text" class="form-control" name="user">
                <option value="0" selected="selected" disabled>Select Merchant</option>
                @foreach($users as $user)
                <option value="{{$user->id}}" @if($user->id == $model->users_id) selected="selected" @endif>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

</form>
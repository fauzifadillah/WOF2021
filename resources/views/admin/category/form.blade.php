<form class="form" method="POST" action="{{ $model->exists ? route('category.update', $model->id) : route('category.store') }}" files=true>
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
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="modal-save"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close"></button>
    </div>

</form>
<form id="form_modal" class="form" method="POST" action="{{ $model->exists ? route('event.update', $model->id) : route('event.store') }}" enctype="multipart/form-data">
    @csrf {{ method_field($model->exists ? 'PUT' : 'POST') }}

    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            &times;
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="name" class="control-label">Title</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$model->name}}" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="desc" class="control-label">Description</label>
            <textarea form ="form_modal" id="desc" class="form-control" name="desc" placeholder="Description">{{$model->desc}}</textarea>
        </div>
        <div class="form-group">
            <label for="category" class="control-label">Category</label><br>
            <select id="category" type="text" class="form-control" name="category">
                <option value="0" selected="selected" disabled>Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $model->categories_id) selected="selected" @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date" class="control-label">Date</label>
            <input id="date" type="date" class="form-control" name="date" value="{{$model->date}}" placeholder="Date">
        </div>
        <div class="form-group">
            <label class="control-label">Time</label>
            <input id="start" type="time" class="form-control" name="start" value="{{$model->start}}" placeholder="Time Start">
            <input id="end" type="time" class="form-control" name="end" value="{{$model->end}}" placeholder="Time End">
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

    <script type="text/javascript">
    </script>

</form>
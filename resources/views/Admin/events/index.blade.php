@extends('layouts.dashboard')

@section('title','EVENT')

@push('css')
  <link href="/assets/DataTables/DataTables-1.10.23/css/jquery.dataTables.css" rel="stylesheet"/>
  <link href="/assets/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.css">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: 'textarea.desc'
  });
  </script>
@endpush

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="event-tab" data-toggle="tab" href="#events" role="tab" aria-controls="event" aria-selected="true">Event</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="category-tab" data-toggle="tab" href="#categories-tabs" role="tab" aria-controls="category" aria-selected="false">Category</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="card">
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="events" role="tabpanel" aria-labelledby="event-tab">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">EVENT</h6>
          <button class="btn btn-primary btn-sm modal-show" type="button" href="{{ route('event.create') }}" name="Create New Event" data-toggle="modal" data-target="#modal">+ Add New</button>
        </div>
        <div class="table-responsive">
          <table id="event-table" class="table hover" style="width:100%"></table>
        </div>
      </div>
      <div class="tab-pane" id="categories-tabs" role="tabpanel" aria-labelledby="category-tab">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">CATEGORY</h6>
          <button class="btn btn-primary btn-sm modal-show" type="button" href="{{ route('category.create') }}" name="Create New Category" data-toggle="modal" data-target="#modal">+ Add New</button>
        </div>
        <div class="table-responsive">
          <table id="category-table" class="table hover" style="width:100%"></table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/assets/DataTables/DataTables-1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="/assets/DataTables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
  {{-- <script src="/assets/sweetalert2/sweetalert2.all.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
  {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

  <script>
    // tinymce.init({
    //   selector: 'textarea.desc',
    //   width: 900,
    //   height: 300
    // });

    var event = $('#event-table').DataTable({
      responsive: true,
      serverSide: true,
      ajax: "{{ route('event.data') }}",
      order: [[ 1, "asc" ]],
      columns: [
        {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '7.5%', className: 'dt-center'},
        {title: 'Name', data: 'name', name: 'name', width: '30%', className: 'dt-head-center'},
        {title: 'Description', data: 'desc', name: 'desc', width: '30%', className: 'dt-head-center'},
        {title: 'Category', data: 'categories.name', name: 'categories.name', width: '30%', className: 'dt-head-center'},
        {title: 'Timeline', data: 'timeline', name: 'timeline', width: '30%', className: 'dt-head-center'},
        {title: 'Action', data: 'action', name: 'action', width: '12.5%', className: 'dt-center'},
      ],
    });

    var category = $('#category-table').DataTable({
      responsive: true,
      serverSide: true,
      ajax: "{{ route('category.data') }}",
      order: [[ 1, "asc" ]],
      columns: [
        {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '20%', className: 'dt-center'},
        {title: 'Name', data: 'name', name: 'name', width: '50%', className: 'dt-head-center'},
        {title: 'Action', data: 'action', name: 'action', width: '30%', className: 'dt-center'},
      ],
    });

    $('body').on('click', '.modal-show', function(event){
      event.preventDefault();
      var me = $(this),
          url = me.attr('href'),
          title = me.attr('name');
      $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          $('#modal-body').html(response);
          $('#modal-title').text(title);
          $('#modal-close').text(me.hasClass('edit') ? 'Cancel' : 'Close');
          $('#modal-save').text(me.hasClass('edit') ? 'Update' : 'Create');
        }
      });
    });

    $('body').on('submit','.form', function(event){
      event.preventDefault();

      var form = $('form'),
          url = form.attr('action');

      $('#modal-save').append('<i class="fas fa-spinner fa-pulse"></i>');
      $('.loading').removeClass('hidden');
      $.ajax({
        url : url,
        type : "POST",
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
          $('.loading').addClass('hidden');
          $('.table').DataTable().ajax.reload();
          $("#modal .close").click()
          $('#modal-body').trigger('reset');
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            type: 'success',
            title: 'Data has been saved!'
          })
        },
        error: function(xhr){
          $('.fa-pulse').remove();
          var res = xhr.responseJSON;
          if ($.isEmptyObject(res) == false) {
            form.find('.invalid-feedback').remove();
            form.find('.is-invalid').removeClass('is-invalid');
            $.each(res.errors, function (key, value) {
              $('#' + key)
                .addClass('is-invalid')
                .after('<div class="invalid-feedback d-block">'+value+'</div>');
            });
          }
        }
      });
    });

    $('body').on('click', '.delete', function (event) {
      event.preventDefault();

      var me = $(this),
          url = me.attr('href'),
          name = me.attr('name');
          $('.swal2-confirm').append('<i class="fas fa-spinner fa-pulse"></i>');
      swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result)=>{
        $('.swal2-confirm').append('<i class="fas fa-spinner fa-pulse"></i>');
        $('.loading').removeClass('hidden');
        if(result.value){
          $.ajax({
            url: url,
            type: "POST",
            data: {
              '_method': 'DELETE',
              '_token': '{{ csrf_token() }}'
            },
            success: function(response){
              $('.loading').addClass('hidden');
              $('.table').DataTable().ajax.reload();
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                type: 'success',
                text: 'Data has been deleted'
              })
            },
            error: function(xhr){
              $('.fa-pulse').remove();
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
              });
            }
          });
        }
      });
    });
  </script>
@endpush
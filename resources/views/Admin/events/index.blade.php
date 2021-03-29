@extends('layouts.dashboard')

@section('title','EVENT')

@push('css')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">{{ strtoupper(basename(request()->path())) }}</h6>
            <button class="btn btn-primary btn-sm modal-show" type="button" href="{{ route('event.create') }}" name="Create New Event">
              + Create
            </button>
          </div>
          <div class="table-responsive">
            <table id="table" class="table" style="width:100%"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>

  <script>
    $('#table').DataTable({
      responsive: true,
      serverSide: true,
      scrollX: true,
      ajax: "{{ route('event.data') }}",
      order: [[ 1, "asc" ]],
      columns: [
        {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '10%', className: 'dt-center'},
        {title: 'Name', data: 'name', name: 'name', width: '35%', className: 'dt-head-center'},
        {title: 'Action', data: 'action', name: 'action', width: '20%', className: 'dt-center'},
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
          $('#modal').modal('show');
        }
      });
    });
  </script>
@endpush
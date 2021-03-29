@extends('layouts.dashboard')

@section('title','EVENT')

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
  <div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
            <h6 class="card-title mb-0">{{ strtoupper(basename(request()->path())) }}</h6>
            <button class="btn btn-primary btn-sm modal-show" type="button" id="create">
              + Create
            </button>
          </div>
          <div class="row align-items-start mb-2">
          </div>
          <div class="flot-wrapper">
            <table id="table" class="table table-striped table-bordered text-sm" style="width:100%"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{ asset('assets/DataTables/DataTables-1.10.23/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/DataTables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js') }}"></script>
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
        {title: 'Email', data: 'email', name: 'email', width: '35%', className: 'dt-center'},
        {title: 'Action', data: 'action', name: 'action', width: '20%', className: 'dt-center'},
      ],
    });
  </script>
@endpush
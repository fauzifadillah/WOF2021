@extends('layouts.dashboard')

@section('title','HOME')

@push('css')
  <link href="/assets/DataTables/DataTables-1.10.23/css/jquery.dataTables.css" rel="stylesheet"/>
  <link href="/assets/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.css">
@endpush

@section('content')
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome Admin</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Accounts</h6>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <h3 class="mb-2">3,897</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+3.3%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Events</h6>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <h3 class="mb-2">35,084</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-danger">
                      <span>-2.8%</span>
                      <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-2">Points</h6>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <h3 class="mb-2">89.87%</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+2.8%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
              <h6 class="card-title mb-0">LEADERBOARDS</h6>
          </div>
          <div class="table-responsive">
              <table id="table" class="table hover" style="width:100%"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/assets/DataTables/DataTables-1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="/assets/DataTables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>

  <script>
    $('#table').DataTable({
      responsive: true,
      serverSide: true,
      ajax: "{{ route('leaderboard.data') }}",
      order: [[ 1, "asc" ]],
      columns: [
        {title: '#', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '7.5%', className: 'dt-center'},
        {title: 'Name', data: 'name', name: 'name', width: '30%', className: 'dt-head-center'},
        {title: 'Point', data: 'leaderboard.total_point', name: 'leaderboard.total_point', width: '30%', className: 'dt-head-center'},
        {title: 'Rank', data: 'rank', name: 'rank', width: '30%', className: 'dt-head-center'},
      ],
    });
  </script>
@endpush
@extends('layouts')

@section('title','EVENT')

@push('css')
    <link href="/assets/css/app-new.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/event-detail.css">
    <link rel="stylesheet" href="/css/leaderboard.css">
    <link href="/assets/DataTables/DataTables-1.10.23/css/jquery.dataTables.css" rel="stylesheet"/>
    <link href="/assets/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.css">
@endpush

@section('content')
    <div class="leaderboard__container">
        <div class="leaderboard__container-wrap">
            <div class="leaderboard-header">
                <div class="leaderboard-head-wrap">
                    <div class="leaderboard-header-1">

                    </div>
                    <div class="leaderboard-header-2">
                        <p>Leaderboards</p>
                    </div>
                </div>
                <div class="leaderboard-prize">
                    <button>Prize Info</button>
                </div>
            </div>

            <div class="leaderboard-player">
                <table id="table" class= "table">

                </table>
            </div>
        </div>
    </div>

    <div class="oam__container">
        <div class="oam__container__wrap">
            <div class="oam-official">
                <img src="/css/assets/partner-1.png" alt="partner-1">
            </div>
            <div class="oam-media">
                <div class="oam-media-header">
                    <h1>MEDIA PARTNER</h1>
                </div>
                <div class="oam-media-img">
                    <img src="/css/assets/partner-2.png" alt="partner-2">
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
      order: [[ 2, "desc" ]],
      columns: [
        {title: 'Rank', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, width: '7.5%', className: 'dt-center'},
        {title: 'Username', data: 'name', name: 'name', width: '30%', orderable:false, className: 'dt-head-center'},
        {title: 'Point', data: 'leaderboard.current_point', name: 'point', orderable:false,width: '30%', className: 'dt-head-center'},
      ],
    });
  </script>
@endpush

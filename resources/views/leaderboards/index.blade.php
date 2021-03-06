@extends('layouts')

@section('title','EVENT')

@push('css')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/event-detail.css">
    <link rel="stylesheet" href="/css/leaderboard.css">
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
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>User</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->leaderboard->total_point}}</td>
                            @php $i++; @endphp
                        </tr>
                        @endforeach
                    </tbody>
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

@endpush

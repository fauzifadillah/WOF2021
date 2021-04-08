@extends('layouts')

@section('title','PROFILE')

@push('css')
    <link rel="stylesheet" href="/css/profile.css">
@endpush

@section('content')
    <div class="profile__container">
        <div class="profile__container__wrap">
            <div class="profile-img">
                <div class="profile-img-wrap">
                    <img src="{{ auth()->user()->avatar }}" alt="avatar">
                    <a href="{{ route('profile.edit') }}" class="profile-img-wrap-edit">
                        <p>EDIT</p>
                    </a>
                </div>
            </div>
            <div class="profile-detail">
                <div class="profile-detail-text">
                    <div class="profile-detail-name">
                        <a href="{{ route('profile.edit') }}" >{{ auth()->user()->name }} <img src="/css/assets/edit.svg" alt="edit"></a>
                    </div>
                    <h2>{{ auth()->user()->email }}</h2>
                    <table>
                        <tr>
                            <td>Rank</td>
                            <td>:</td>
                            <td class="right">{{ $rank }}</td>
                        </tr>
                        <tr>
                            <td>Points</td>
                            <td>:</td>
                            <td class="right">{{ auth()->user()->leaderboard->current_point }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="profile-setting">
                <a href="{{ route('profile.password') }}" class="setting-edit">
                    <button>Change Password</button>
                </a>
                <a href="{{ route('profile.voucher') }}" class="setting-voucher">
                    <button>Reedem Voucher</button>
                </a>
            </div>
        </div>
    </div>
@endsection
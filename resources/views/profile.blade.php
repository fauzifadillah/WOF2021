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
                </div>
            </div>

            <div class="profile-detail">
                <div class="profile-detail-text">
                    <h1>{{ auth()->user()->name }}</h1>
                    <h2>{{ auth()->user()->email }}</h2>
                    <table>
                        <tr>
                            <td>Rank</td>
                            <td>:</td>
                            <td class="right">Denim Lord</td>
                        </tr>
                        <tr>
                            <td>Points</td>
                            <td>:</td>
                            <td class="right">xxxx</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="profile-setting">
                <div class="setting-edit">
                    <button>Edit Profile</button>
                </div>
                <div class="setting-voucher">
                    <button>Reedem Voucher</button>
                </div>
            </div>
        </div>
    </div>
@endsection
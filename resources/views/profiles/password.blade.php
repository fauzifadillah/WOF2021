@extends('layouts')

@section('title','CHANGE PASSWORD')

@push('css')
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/changePassword.css">
@endpush

@section('content')
    <div class="edit__container">
        <div class="edit__container__wrap">
            <div class="edit-header">
                <h1>Change Password</h1>
            </div>
            <div class="edit-form">
                <form id="EDIT" method="POST" action="{{ route('profile.updatePassword') }}">
                    @csrf {{ method_field('PUT') }}
                    <div class="form-control">
                        <label for="current">Current Password</label>
                        <input type="password" id="current" name="current" placeholder="Current Password" >
                        <img class="check" src="/css/assets/check-mark.svg" alt="v">
                        <img class="wrong" src="/css/assets/remove.svg" alt="x">
                        <small>Error Message</small>
                    </div>
                    <div class="form-control">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Password">
                        <img class="check" src="/css/assets/check-mark.svg" alt="v">
                        <img class="wrong" src="/css/assets/remove.svg" alt="x">
                        <small>Error Message</small>
                    </div>
                    <div class="form-control">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" id="confirm" name="password_confirmation" placeholder="Confirm Password" >
                        <img class="check" src="/css/assets/check-mark.svg" alt="v">
                        <img class="wrong" src="/css/assets/remove.svg" alt="x">
                        <small>Error Message</small>
                    </div>
                </form>
            </div>
            <div class="edit-button">
                <a href="{{ route('profile.index') }}"  class="button-cancel">
                    <button>Cancel</button>
                </a>
                <div class="button-save">
                    <button form="EDIT" type="input">Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
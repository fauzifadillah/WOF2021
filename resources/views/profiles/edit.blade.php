@extends('layouts')

@section('title','CHANGE PROFILE')

@push('css')
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/changePassword.css">
    <link rel="stylesheet" href="/css/changeProfile.css">
@endpush

@section('content')
    <div class="edit__container">
        <div class="edit__container__wrap">
            <div class="edit-header">
                <h1>Change Profile</h1>
            </div>
            <div class="edit-form">
                <form id="PROFILE" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf {{ method_field('PUT') }}
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Name" value="{{ auth()->user()->name }}">
                        <img class="check" src="/css/assets/check-mark.svg" alt="v">
                        <img class="wrong" src="/css/assets/remove.svg" alt="x">
                        <small>Error Message</small>
                    </div>
                    <div class="form-control">
                        <label for="file">Choose Image</label>
                        <input type="file" id="file" name="file" accept="image/*" placeholder="Choose Image" value="{{ auth()->user()->avatar }}">
                        <img class="check" src="/css/assets/check-mark.svg" alt="v">
                        <img class="wrong" src="/css/assets/remove.svg" alt="x">
                        <small>Error Message</small>
                    </div>
                </form>
            </div>
            <div class="edit-button">
                <a href="{{ route('profile.index') }}" class="button-cancel">
                    <button>Cancel</button>
                </a>
                <div class="button-save">
                    <button form="PROFILE" type="input">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
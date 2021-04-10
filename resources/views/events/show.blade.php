@extends('layouts')

@section('title','EVENT')

@push('css')
    {{-- <link rel="stylesheet" href="/css/event.css"> --}}
    <link rel="stylesheet" href="/css/event-show.css">
@endpush

@section('content')
<div class="video__container">
    <div class="video__container__wrap">
        <div class="video-header">
            <div class="video-header-1">
            </div>
            <div class="video-header-2">
                <p>LIVE MUSIC !</p>
            </div>
        </div>
        <div class="video-play">
            TAMPILAN VIDEO
        </div>
        <div class="video-button">
            <div class="video-button-wrap">
                <p>CHECK IN</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="/js/event.js"></script> --}}
@endpush

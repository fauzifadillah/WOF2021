@extends('layouts')

@section('title','EVENT')

@push('css')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/event-detail.css">
@endpush

@section('content')
    <div class="detail1__container">
        <div class="detail1__container-wrap">
            <div class="detail1-img">
                <div class="detail1-img-header">
                    <h1>{{ $model->name }}</h1>
                    <h3>CATEGORY : {{ $model->categories->name }}</h3>
                    <p>{{ date('d M, Y', strtotime($model->date)).' - '.date('H:i', strtotime($model->start)).' - '.date('H:i', strtotime($model->end)) }}</p>
                </div>
                <div class="detail1-img-button">
                    <div class="detail1-img-button-signin">
                        <p>VIEW</p>
                    </div>
                    <div class="detail1-img-button-signup">
                        <p>CHECK IN</p>
                    </div>
                </div>
            </div>

            <div class="detail1-fake-text">
                <h1>{{ $model->name }}</h1>
                <h3>CATEGORY : {{ $model->categories->name }}</h3>
                <p>{{ date('d M, Y', strtotime($model->date)).' - '.date('H:i', strtotime($model->start)).' - '.date('H:i', strtotime($model->end)) }}</p>
            </div>

            <div class="detail1-text">
                <p>{{ $model->desc }}</p>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
            </div>

            <div class="detail1-fake-button">
                <div class="detail1-fake-button-signin">
                    <p>VIEW</p>
                </div>
                <div class="detail1-fake-button-signup">
                    <p>CHECK IN</p>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- END DETAIL_1 -->


    <!-- OFFICIAL AND MEDIA -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/event.js') }}"></script>    
@endpush
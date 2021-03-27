@extends('layouts')

@section('title','HOME')

@section('content')
    <div class="commercial__container">
        <div class="commercial__container-wrap">
            <div class="commercial__section1">
                <div class="commercial__section1-left">
                    <h2>Welcome To</h2>
                    <h2>Wall Online Fades 2021!</h2>
                    <div class="commercial__section1-left-box">
                        <div class="box-1">
                            <h3>DAY 1</h3>
                        </div>
                        <div class="box-2">
                            <h3>APRIL 10, 2021</h3>
                        </div>
                    </div>
                </div>
                <div class="commercial__section1-right">
                    <div class="commercial__section1-content1">
                        <div class="box-3">
                            <h3>LIVE NOW!</h3>
                        </div>
                        <div class="box-4">
                            <h3>18:00 | THE ADAMS LIVE MUSIC !</h3>
                        </div>
                    </div>
                    <div class="commercial__section1-content2">
                        <div class="box-5">
                            <h3>NEXT UP>></h3>
                        </div>
                        <div class="box-6">
                            <h3>21:00 | LIVE! FADE CONTEST</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news__container">
        <div class="news__container__wrap">
            <div class="news-box">
                <div class="news-box-img-1">
                    <div class="news-box-img-detail">
                        <p>Open on 16 April</p>
                    </div>
                </div>
                <div class="news-box-text">
                    <h2>EXHIBITION</h2>
                    <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                    <p>Yesterday, 23:22</p>
                </div>
            </div>
            <div class="news-box">
                <div class="news-box-img-2">
                    <div class="news-box-img-detail">
                        <p>Now Open!</p>
                    </div>
                </div>
                <div class="news-box-text">
                    <h2>EVENTS</h2>
                    <p>Immerse in our curated event content from talks, workshop and music performance. See the lineups and schedule!</p>
                    <p>Yesterday, 23:22</p>
                </div>
            </div>
            <div class="news-box">
                <div class="news-box-img-3">
                    <div class="news-box-img-detail">
                        <p>Open on 23 April</p>
                    </div>
                </div>
                <div class="news-box-text">
                    <h2>MARKET</h2>
                    <p>Head to our market filled with our best selections of local brands. Find and shop your favourite brands now!</p>
                    <p>Yesterday, 23:22</p>
                </div>
            </div>
        </div>
    </div>

    <div class="talent__container">
        <div class="talent__container__wrap">
            <div class="talent-left">
                <div class="talent-left-header">
                    <div class="talent-left-header-1">
                    </div>
                    <div class="talent-left-header-2">
                        <p>Lineups!</p>
                    </div>
                </div>
                <div class="talent-left-content">
                </div>
            </div>
            <div class="talent-right">
                <div class="talent-right-header">
                    <div class="talent-right-header-1">
                    </div>
                    <div class="talent-right-header-2">
                        <p>Local Brands</p>
                    </div>
                </div>
                <div class="talent-right-content">
                </div>
            </div>
        </div>
    </div>

    <div class="official__container">
        <div class="official__container__wrap">
            <img src="{{ asset('css/assets/partner-1.png') }}" alt="partner-1">
        </div>
    </div>

    <div class="media__container">
        <div class="media__container__wrap">
            <div class="media-header">
                <h1>MEDIA PARTNER</h1>
            </div>
            <div class="media-img">
                <img src="{{ asset('css/assets/partner-2.png') }}" alt="partner-2">
            </div>
        </div>
    </div>

    <div class="footer__container">
        <div class="footer__container__wrap">
            <div class="footer-1">

            </div>
            <div class="footer-2">

            </div>
        </div>
    </div>
@endsection
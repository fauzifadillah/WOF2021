@extends('layouts')

@section('title','EVENT')

@push('css')
    <link rel="stylesheet" href="/css/event.css">
@endpush

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

<div class="timeline__container">
    <div class="timeline__container__wrap">
        <div class="timeline-progressbar">
            <div class="progressbar-header">
                <p>16 April 2021</p>
            </div>
            <div class="progressbar-line-first"> </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-line">
                <div class="progress-bar-round"></div>
            </div>
            <div class="progressbar-end">
                <p>Load More</p>
            </div>
        </div>

        <div class="timeline-grid">
            {{-- @foreach($events as $index => $event)
            <a class="timeline-grid-x" href="{{ route('event.show', $event->id) }}">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-1">
                        <img src="{{ $event->image}}" alt="imageku">
                        <div class="timeline-box-img-detail">
                            <p>{{ date('H:i', strtotime($event->start)) }} - {{ date('H:i', strtotime($event->end)) }}</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>{{ $event->name }}</h2>
                        <p>{{ implode(' ', array_slice(str_word_count($event->desc,1), 0, 15)) }}</p>
                        <p>{{ $event->updated_at->diffForHumans()  }}</p>
                    </div>
                </div>
            </a>
            @if($index%2==0)
                <div class="timeline-grid-x">
                    <div class="timeline-grid-item no"></div>
                </div>
                <div class="timeline-grid-x">
                    <div class="timeline-grid-item no"></div>
                </div>
            @endif
            @endforeach --}}

            <a class="timeline-grid-x" href="{{ route('event.detail', 1) }}">
            {{-- <div class="timeline-grid-x"> --}}
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-1">
                        <img src="/css/assets/timeline-1.jpg" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>The Adams Live Music</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </a>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-2">
                        <img src="/css/assets/timeline-1.jpg" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>LIVE FADE CONTESET</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-3">
                        <img src="/css/assets/image-1.png" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>TALSK! with RUEDY</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>

            <!-- COBA 1 -->

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>    

            <div class="timeline-grid-x">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-2">
                        <img src="/css/assets/image-1.png" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>The Adams Live Music</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-1">
                        <img src="/css/assets/image-1.png" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>LIVE FADE CONTESET</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item no"></div>
            </div>

            <div class="timeline-grid-x">
                <div class="timeline-grid-item yes">
                    <div class="timeline-box-img img-2">
                        <img src="/css/assets/image-1.png" alt="assets1">
                        <div class="timeline-box-img-detail">
                            <p>16 April 2021</p>
                        </div>
                    </div>
                    <div class="timeline-box-text">
                        <h2>TALSK! with RUEDY</h2>
                        <p>Experience our signature exhibition now in 360 tour, featuring your favourite denim exhibitions and more.</p>
                        <p>Yesterday, 23:22</p>
                    </div>
                </div>
            </div>            

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/event.js"></script>    
@endpush
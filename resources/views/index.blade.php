@extends('layouts.layout-invitation')

@section('content')

<section id="about">
    <h1 class="about-title my-3">───<span>The Wedding Of</span>───</h1>
    <div class="about-wrapper container-fluid py-5">
        <div class="about-body d-flex align-items-center flex-column text-center">
            <div class="bride-side">
                <h1>Nobita Nobi <sub id="nickname">Nobita</sub></h1>
                <h3>野比のび太</h3>
                <p>Son of Mr. Nobisuke Nobi & Mrs. Tamako Nobi</p>
            </div>
            <div class="mid-side my-3">
                <h1>&</h1>
            </div>
            <div class="bride-side">
                <h1>Shizuka Minamoto <sub id="nickname">Shizuka</sub></h1>
                <h3>源 静香</h3>
                <p>Daughter of Mr. Yoshio Minamoto & Mrs. Shizuka</p>
            </div>
        </div>
    </div>
</section>
<section id="schedule">
    <div class="schedule-wrapper">
        <h1 class="schedule-title pb-4 m-0">•<span>Schedule</span>•</h1>
        <div class="container text-center">
            <div class="information-schedule-wrapper">
                <h4>Date</h4>
                <p><i class="fa-solid fa-calendar-day pe-2"></i>
                    Friday, 19 February 2121</p>
                <p><i class="fa-solid fa-clock pe-2"></i>
                    All Day
                </p>
            </div>
            <p class="my-2">───────────────</p>
            <div class="information-schedule-wrapper">
                <h4>Venue</h4>
                <p><i class="fa-solid fa-location-dot pe-2"></i>
                    Prince Melon Hotel, Japan
                </p>
            </div>
        </div>
    </div>
    <div class="quote-wrapper container-fluid text-center py-3">
        <h5>"Marriage is always together and remains in the same goal, although in different ways"</h5>
    </div>
</section>
<section id="gallery">
    <h1 class="gallery-title my-3">•<span>Gallery</span>•</h1>
    <div class="container py-5">
        <div class="row">
            @for($i = 1; $i <= 4; $i++)
                <div class="col-12 col-md-6">
                    <img
                        src="{{ asset("img/gallery-$i.jpg") }}"
                        class="w-100 shadow rounded mb-4"
                        alt="Gallery {{ $i }}"
                    />
                </div>
            @endfor
        </div>
      </div>
</section>
<section id="information">
    <div class="information-wrapper container text-center px-5">
        <p class="pt-4 mb-3">この招待状は一般公開されていません。のび太と静香の結婚式に参加するには、バーコード形式のアクセス権が必要ですが、YouTubeでライブストリーム放送を視聴できます。</p>
        <p class="pb-4 m-0">This invitation is not open to the public, to be able to attend Nobita & Shizuka's wedding you must have access rights in the form of a barcode, but you can watch the live stream on YouTube</p>
    </div>
    <div class="stream-wrapper container text-center mt-4 mb-5 py-5">
        <h3>Live Stream</h3>
        <div class="d-flex justify-content-center mt-4">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SYQ4efaVN4A" allowfullscreen></iframe>
        </div>
    </div>
    <x-running-text />
    <div class="my-5">
        <livewire:guestbook-sender />
    </div>
</section>

@endsection

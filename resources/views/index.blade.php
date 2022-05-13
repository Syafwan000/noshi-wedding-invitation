@extends("layout.main")

@section("content")

<section id="about" class="my-5" data-aos="fade-down" data-aos-duration="1500">
    <h1 class="about-title my-3">───&nbsp;&nbsp;The Wedding Of&nbsp;&nbsp;───</h1>
    @include("partials.content.about")
</section>
<section id="schedule" class="mt-5">
    <div data-aos="zoom-in" data-aos-duration="1000">
        <h1 class="schedule-title pt-5 pb-4 m-0">•&nbsp;&nbsp;Schedule&nbsp;&nbsp;•</h1>
        @include("partials.content.schedule")
    </div>
</section>
<section class="quote container-fluid text-center mb-5 py-3">
    <h5 data-aos="fade" data-aos-duration="1000">"Marriage is always together and remains in the same goal, although in different ways"</h5>
</section>
<section id="gallery" class="mt-5 mb-4">
    <h1 class="gallery-title my-3" data-aos="zoom-in" data-aos-duration="1000">•&nbsp;&nbsp;Gallery&nbsp;&nbsp;•</h1>
    @include("partials.content.gallery")
</section>
<section id="others">
    @include("partials.content.information")
    @include("partials.content.marquee")
    <div class="my-5" data-aos="fade" data-aos-duration="1000">
        <livewire:wish></livewire:wish>
    </div>
</section>
    
@endsection
 {{-- carousel ads section start--}}
 <section id="edition">
    <div class="carousel-container">
        <div class="carousel">
            <div class="slides">
                <div class="slide active">
                    <img src="{{ asset('asset-views/img/ads/haloween-edition.png') }}" alt="Slide 1">
                </div>
                <div class="slide">
                    <img src="{{ asset('asset-views/img/ads/slideshow-coquette.jpg') }}" alt="Slide 2">
                </div>
                <div class="slide">
                    <img src="{{ asset('asset-views/img/ads/slideshow-sea-edition.jpg') }}" alt="Slide 3">
                </div>
                <div class="slide">
                    <img src="{{ asset('asset-views/img/ads/slideshow-batik.jpg') }}" alt="Slide 4">
                </div>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>
</section>

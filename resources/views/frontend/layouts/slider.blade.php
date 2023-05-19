<div class="textBoxing">
    <h1>{{ $sliderTitle }}</h1>
    <p>{{ $sliderDescription }}</p>
</div>
<div class="carousel-inner">
    @foreach($sliders as $slider)
        <div class="carousel-item active">
            <img src="{{ asset($slider->photo) }}" class="d-block w-100" alt="softrans.az">
        </div>
    @endforeach
</div>

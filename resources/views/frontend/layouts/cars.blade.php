<section id="mySlider">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="title">
                    <h2>@lang('backend.our-cars')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div class="carousell">
            @foreach($cars as $car)
                <div>
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset($car->photo) }}"
                                 alt="{{ $car->translate(app()->getLocale())->name ?? '-' }}">
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <div class="card-title">{{ $car->translate(app()->getLocale())->name ?? '-' }}</div>
                                <div class="card-text">
                                    <p>{!!  $car->translate(app()->getLocale())->description ?? '-' !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

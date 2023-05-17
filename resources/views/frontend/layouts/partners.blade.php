<section id="Partners">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="title">
                    <h2>@lang('backend.our-partners')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="slide-track">
            @foreach($partners as $partner)
                <div class="slide">
                    <a href="{{ $partner->link }}" target="_blank">
                        <img src="{{ asset($partner->photo)  }}" height="100" width="250" alt="Softrans.az">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="AboutIndex">
    <div class="container">
        <div class="row my-5 align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="aboutText" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <h1>@lang('backend.who')</h1>
                    <p>{!! $who->translate(app()->getLocale())->description ?? '-' !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="aboutImg">
                    <div class="line"></div>
                    <img src="{{ asset($who->photo) }}" alt="softrans.az">
                </div>
            </div>
        </div>
        @foreach($directors as $director)
            <div class="row seoRow  align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="seoImg">
                        <img src="{{ asset($director->photo) }}"
                             alt="{{ $director->translate(app()->getLocale())->name ?? '-' }}">
                        <div class="nameSeo">
                            <strong>{{ $director->translate(app()->getLocale())->name ?? '-' }}</strong>
                            <span class="salam">{!! $director->translate(app()->getLocale())->description ?? '-' !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="seoaboutText">
                        <div class="line"></div>
                        <p>{!! $director->translate(app()->getLocale())->about ?? '-'  !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

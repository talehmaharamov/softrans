@extends('master.frontend')
@section('title',__('backend.about').' | ' )
@section('front')
    <section id="AboutIndex">
        <div class="container">
            @foreach($abouts as $key => $about)
                @if(($key + 1) % 2 == 0)
                    <div class="row topAbout my-5 align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="aboutImg">
                                <img src="{{ asset($about->photo) }}" alt="softrans.az">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="aboutText">
                                <p>
                                    {!! $about->translate(app()->getLocale())->description ?? '-' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row bottomAbout my-5 align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="aboutText">
                                <p>
                                    {!! $about->translate(app()->getLocale())->description ?? '-' !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="aboutImg">
                                <img src="{{ asset($about->photo) }}" alt="softrans.az">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    @include('frontend.layouts.cars')
@endsection

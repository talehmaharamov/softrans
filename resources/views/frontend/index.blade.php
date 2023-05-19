@extends('master.frontend')
@section('front')
    <section id="BackImg">
        <div class="backImgIn">
            <div class="backImgOut"></div>
        </div>
    </section>
    @include('frontend.layouts.who')
    @include('frontend.layouts.why')
    @include('frontend.layouts.cars')
    @include('frontend.layouts.partners')
    <section id="Map">
        <iframe src="{{ settings('location_link') }}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection


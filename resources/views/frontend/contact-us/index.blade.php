@extends('master.frontend')
@section('title',__('backend.contact-us').' | ' )
@section('front')
    <section id="Contact">
        <div class="container">
            <div class="row my-5 formBoxContact">
                <div class="col-lg-6 col-md-12 col-sm-12 myP">
                    <div class="orderForm">
                        <form action="{{ route('frontend.sendMessage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row RowBox w-100 m-auto">
                                <div class="col-12">
                                    <div class="titleForm">
                                        <h2>@lang('backend.contact-us')</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="nameInput inpBox">
                                        <label for="">@lang('backend.name')
                                            <input type="text" name="name" placeholder="@lang('backend.name')" required>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="surNameInput inpBox">
                                        <label for="">
                                            @lang('backend.surname')
                                            <input type="text" name="surname" placeholder="@lang('backend.surname')"
                                                   required>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="surNameInput inpBox">
                                        <label for="">
                                            @lang('backend.email')
                                            <input type="email" name="email" placeholder="@lang('backend.name')"
                                                   required>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="numbreInput inpBox">
                                        <label for="">
                                            @lang('backend.subject')
                                            <input type="text" name="subject" placeholder="@lang('backend.subject')"
                                                   required>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="textArea inpBox">
                                        <label for="">
                                            @lang('backend.your-order')
                                            <textarea placeholder="@lang('backend.your-order')" name="msg" id=""
                                                      cols="30"
                                                      rows="10" required></textarea>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBtn">
                                        <button type="submit">@lang('backend.send')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 myP">
                    <div class="rightBackSocial">
                        <div class="row RowBox  w-100 m-auto">
                            <div class="col-12">
                                <div class="titleFormRight">
                                    <h2>@lang('backend.contact-information')</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="tel:{{ settings('phone') }}"><i
                                        class="fal fa-phone-alt"></i>{{ settings('phone') }}</a>
                            </div>
                            <div class="col-12">
                                <a href="#">
                                    <i class="fal fa-map-marker-alt"></i>{{ settings('address_'.app()->getLocale()) }}
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="iconBox">
                                    <a href="mailto:{{ settings('email') }}"><i class="fas fa-envelope"></i></a>
                                    <a href="{{ settings('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ settings('instagram') }}"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mapRight mt-3">
                                    <iframe src="{{settings('location_link')}}" width="100%" height="300"
                                            style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

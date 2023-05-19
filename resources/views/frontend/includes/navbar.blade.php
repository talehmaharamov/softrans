<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="overlay"></div>
    <div class="mobileLogo">
        <div class="container">
            <div class="row mt-1">
                <div class="col-12">
                    <div class="logo">
                        <a href="{{ route('frontend.index') }}"><img
                                src="{{ asset('backend/images/logo.png') }}" alt="Softrans.az"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="myNavBar">
        <div class="container">
            <div class="myNavBox">
                <div class="row mt-2 align-items-center">
                    <div class="col-4">
                        <div class="social">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ \Illuminate\Support\Str::upper(app()->getLocale()) }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach(active_langs() as $lang)
                                        @continue($lang->code == app()->getLocale())
                                        <li><a class="dropdown-item"
                                               href="{{ route('frontend.frontLanguage',$lang->code) }}">{{ \Illuminate\Support\Str::upper($lang->code) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="socialIcon">
                                <a href="{{ settings('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ settings('instagram') }}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="logo">
                            <a href="{{ route('frontend.index') }}"><img
                                    src="{{ asset('backend/images/logo.png') }}" alt="Softrans.az"></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="pagesList">
                            <a href="{{ route('frontend.about') }}">@lang('backend.about')</a>
                            <a href="{{ route('frontend.contact-us-page') }}"
                            >@lang('backend.contact-us')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.slider')
</div>
<div class="burger-menu">
    <a href="" class="burger-menu_button">
        <spun class="burger-menu_lines"></spun>
    </a>
    <nav class="burger-menu_nav">
        <div class="social">
            <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    {{ \Illuminate\Support\Str::upper(app()->getLocale()) }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach(active_langs() as $lang)
                        @continue($lang->code == app()->getLocale())
                        <li><a class="dropdown-item"
                               href="{{ route('frontend.frontLanguage',$lang->code) }}">{{ \Illuminate\Support\Str::upper(app()->getLocale()) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="socialIcon">
                <a href="{{ settings('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ settings('instagram') }}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <a href="{{ route('frontend.about') }}" class="burger-menu_link">@lang('backend.about')</a>
        <a href="{{ route('frontend.contact-us-page') }}" class="burger-menu_link"
        >@lang('backend.contact-us')</a>
    </nav>
    <div class="burger-menu_overlay"></div>
</div>

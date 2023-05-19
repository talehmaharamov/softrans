<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('backend.dashboard') }}" class="waves-effect">
                        <i class="ri-home-4-fill"></i>
                        <span>@lang('backend.dashboard')</span>
                    </a>
                </li>
                {{--                {{ creation('Who','Who',true,false) }}--}}
                {{--                {{ creation('Director','Director',true,false) }}--}}
                <li class="menu-title">@lang('backend.site-setting')</li>
                @can('cars index')
                    <li>
                        <a href="{{ route('backend.cars.index') }}" class="waves-effect">
                            <i class="fas fa-car"></i>
                            <span>@lang('backend.cars')</span>
                        </a>
                    </li>
                @endcan
                @can('partners index')
                    <li>
                        <a href="{{ route('backend.partners.index') }}" class="waves-effect">
                            <i class="fas fa-handshake"></i>
                            <span>@lang('backend.partners')</span>
                        </a>
                    </li>
                @endcan
                @can('who index')
                    <li>
                        <a href="{{ route('backend.who.index') }}" class="waves-effect">
                            <i class="fas fa-question"></i>
                            <span>@lang('backend.who')</span>
                        </a>
                    </li>
                @endcan
                @can('director index')
                    <li>
                        <a href="{{ route('backend.director.index') }}" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span>@lang('backend.director')</span>
                        </a>
                    </li>
                @endcan
                @can('slider index')
                    <li>
                        <a href="{{ route('backend.slider.index') }}" class="waves-effect">
                            <i class="fas fa-images"></i>
                            <span>@lang('backend.slider')</span>
                        </a>
                    </li>
                @endcan
                @can('about index')
                    <li>
                        <a href="{{ route('backend.about.index') }}" class="waves-effect">
                            <i class="fas fa-info"></i>
                            <span>@lang('backend.about')</span>
                        </a>
                    </li>
                @endcan
                @can('languages index')
                    <li>
                        <a href="{{ route('backend.site-languages.index') }}" class="waves-effect">
                            <i class="fas fa-language"></i>
                            <span>@lang('backend.languages')</span>
                        </a>
                    </li>
                @endcan
                @can('contact index')
                    <li>
                        <a href="{{ route('backend.contact-us.index') }}" class="waves-effect">
                            <i class="ri-contacts-fill"></i>
                            <span>@lang('backend.contact-us')</span>
                        </a>
                    </li>
                @endcan
                @can('settings index')
                    <li>
                        <a href="{{ route('backend.settings.index') }}" class="waves-effect">
                            <i class="ri-settings-2-fill"></i>
                            <span>@lang('backend.settings')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.ap-setting')</li>
                @can('users index')
                    <li>
                        <a href="{{ route('backend.users.index') }}" class=" waves-effect">
                            <i class="ri-account-circle-fill"></i>
                            <span>@lang('backend.users')</span>
                        </a>
                    </li>
                @endcan
                @can('permissions index')
                    <li>
                        <a href="{{ route('backend.permissions.index') }}" class=" waves-effect">
                            <i class="ri-lock-2-fill"></i>
                            <span>@lang('backend.permissions')</span>
                        </a>
                    </li>
                @endcan
                @can('report index')
                    <li>
                        <a href="{{ route('backend.report') }}" class="waves-effect">
                            <i class="fas fa-file"></i>
                            <span>@lang('backend.report')</span>
                        </a>
                    </li>
                @endcan
                @can('dodenv index')
                    <li>
                        <a target="_blank" href="{{ url('admin/env') }}" class="waves-effect">
                            <i class="fab fa-envira"></i>
                            <span>@lang('backend.dod-env')</span>
                        </a>
                    </li>
                @endcan
                @can('languages index')
                    <li>
                        <a target="_blank" href="{{ url('admin/manage-languages') }}" class="waves-effect">
                            <i class="fas fa-flag"></i>
                            <span>@lang('backend.language-panel')</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-title">@lang('backend.user-setting')</li>
                <li>
                    <a href="{{ route('backend.my-informations.index') }}" class=" waves-effect">
                        <i class="ri-information-fill"></i>
                        <span>@lang('backend.informations')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

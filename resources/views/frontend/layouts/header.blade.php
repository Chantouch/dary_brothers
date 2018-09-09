<header class="header2">
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            @if(config('settings.social_activated'))
                <div class="topbar-social">
                    <a target="_blank" href="{!! config('settings.facebook_page_url') !!}"
                       class="topbar-social-item fa fa-facebook"
                    ></a>
                    <a target="_blank" href="{!! config('settings.instagram_url') !!}"
                       class="topbar-social-item fa fa-instagram"
                    ></a>
                    <a target="_blank" href="{!! config('settings.vimeo_url') !!}"
                       class="topbar-social-item fa fa-vimeo"
                    ></a>
                    <a target="_blank" href="{!! config('settings.g_plus_url') !!}"
                       class="topbar-social-item fa fa-google-plus"
                    ></a>
                    <a target="_blank" href="{!! config('settings.youtube_url') !!}"
                       class="topbar-social-item fa fa-youtube-play"
                    ></a>
                </div>
            @endif
            <a href="{{ route('frontend.home') }}" class="logo2">
                <img src="{!! asset(config('settings.app_logo')) !!}"
                     alt="{{ MetaTag::get('title') }} - {!! config('settings.app_name') !!}"
                >
            </a>
            <div class="topbar-child2">
                @auth
                    <span class="topbar-email">
                        {!! Auth::user()->full_name !!}
                    </span>
                @endauth

                <div class="topbar-language rs1-select2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle"
                                type="button"
                                id="dropDownLanguage"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        >
                            {{ check_lang(app()->getLocale()) }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropDownLanguage">
                            @foreach (config('translatable.locales') as $lang => $language)
                                @if ($lang != app()->getLocale())
                                    <a class="dropdown-item"
                                       href="{{ route('lang.switch', $lang) }}">{{ $language }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{!! route('customer.carts.index') !!}" class="header-wrapicon1 dis-block m-l-30">
                    <img src="{{ asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
                </a>

                <a href="{!! route('customer.wish-lists.index') !!}" class="header-wrapicon1 dis-block m-l-30">
                    <i class="fa fa-heart-o"></i>
                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2 m-r-13">
                    <img src="{!! asset('images/icons/icon-header-02.png') !!}"
                         class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">{!! count(Cart::content()) !!}</span>

                    @include('frontend.layouts.cart')
                </div>
            </div>
        </div>

        <div class="wrap_header">
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{ route('frontend.home') }}">{{ __('app.menu.home') }}</a>
                        </li>

                        <li>
                            <a href="{!! route('products.index') !!}">{{ __('app.menu.shop') }}</a>
                        </li>

                        <li class="sale-noti">
                            <a href="#">{{ __('app.menu.sale') }}</a>
                        </li>

                        <li>
                            <a href="{!! route('about.index') !!}">{{ __('app.menu.about') }}</a>
                        </li>

                        <li>
                            <a href="{!! route('contact.index') !!}">{{ __('app.menu.contact') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-icons"></div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="{{ route('frontend.home') }}" class="logo-mobile">
            <img src="{!! asset('images/icons/logo.png') !!}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="{!! asset('images/icons/icon-header-01.png') !!}" class="header-icon1" alt="ICON">
                </a>

                <a href="{!! route('customer.wish-lists.index') !!}" class="header-wrapicon1 dis-block m-l-30">
                    <i class="fa fa-heart-o"></i>
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="{!! asset('images/icons/icon-header-02.png') !!}"
                         class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    @include('frontend.layouts.cart')
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <span class="topbar-child1">
                        Free shipping for standard order over $100
                    </span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        @auth
                            <span class="topbar-email">
                                {!! Auth::user()->full_name !!}
                            </span>
                        @endauth

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="lang">
                                <option value="kh">{{ __('app.languages.kh') }}</option>
                                <option value="en">{{ __('app.languages.en') }}</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="{{ route('frontend.home') }}">{{ __('app.menu.home') }}</a>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="{!! route('products.index') !!}">{{ __('app.menu.shop') }}</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">{{ __('app.menu.sale') }}</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="{!! route('about.index') !!}">{{ __('app.menu.about') }}</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="#">{{ __('app.menu.contact') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

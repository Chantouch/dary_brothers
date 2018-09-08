<div class="wrap_header fixed-header2 trans-0-4">
    <a href="{!! route('frontend.home') !!}" class="logo">
        <img src="{!! asset(config('settings.app_logo')) !!}" alt="{{ MetaTag::get('title') }} - {!! config('settings.app_name') !!}">
    </a>
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="{!! route('frontend.home') !!}">{{ __('app.menu.home') }}</a>
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
                    <a href="#">{{ __('app.menu.contact') }}</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-icons">
        <a href="{!! route('customer.carts.index') !!}" class="header-wrapicon1 dis-block">
            <img src="{{ asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
        </a>
        <a href="{!! route('customer.wish-lists.index') !!}" class="header-wrapicon1 dis-block m-l-30">
            <i class="fa fa-heart-o"></i>
        </a>
        <span class="linedivide1"></span>
        <div class="header-wrapicon2">
            <img src="{{ asset('images/icons/icon-header-02.png') }}"
                 class="header-icon1 js-show-header-dropdown"
                 alt="ICON"
            >
            <span class="header-icons-noti">{!! count(Cart::content()) !!}</span>

            @include('frontend.layouts.cart')
        </div>
    </div>
</div>

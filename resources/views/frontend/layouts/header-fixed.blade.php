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
                    <a href="{!! route('contact.index') !!}">{{ __('app.menu.contact') }}</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-icons">
        @include('frontend.layouts.header-sub')
    </div>
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{!! asset(config('settings.app_favicon')) !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Security-Policy" content="script-src 'unsafe-inline'; style-src 'unsafe-inline'; img-src data:">

    <title>{{ MetaTag::get('title') }} - {!! config('settings.app_name') !!}</title>
    {!! MetaTag::tag('description') !!}{!! MetaTag::tag('keywords') !!}
    {!! MetaTag::tag('canonical', Request::url()) !!}
    {!! MetaTag::tag('image') !!}
    {!! MetaTag::openGraph() !!}
    {!! MetaTag::tag('robots') !!}
    {!! MetaTag::tag('site_name', config('settings.app_name', 'Dary Brothers')) !!}
    {!! MetaTag::tag('url', Request::url()); !!}
    {!! MetaTag::tag('locale', 'en_EN') !!}

    @if (config('services.facebook.client_id'))
        <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
        {!! MetaTag::twitterCard() !!}
    @endif
    @if (config('settings.google_site_verification'))
        <meta name="google-site-verification" content="{{ config('settings.google_site_verification') }}"/>
    @endif
    @if (config('settings.msvalidate'))
        <meta name="msvalidate.01" content="{{ config('settings.msvalidate') }}"/>
    @endif
    @if (config('settings.alexa_verify_id'))
        <meta name="alexaVerifyID" content="{{ config('settings.alexa_verify_id') }}"/>
    @endif

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    @yield('style')

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-51288724-6" integrity="sha256-SLtuI24BkEZaoseVaRpnjIQW5BA2x5ckpMoTU0nD58w=" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-51288724-6');
    </script>

</head>
<body>
<div id="app" class="animsition">

    @include('frontend.layouts.header-fixed')

    @include('frontend.layouts.top-noti')

    <main class="main">

        @include('frontend.layouts.header')

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy congrats!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy congrats!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @yield('content')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.backtotop')

        <div id="dropDownSelect1"></div>

        <div id="dropDownSelect2"></div>

    </main>
</div>
</body>

<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>

{{--<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>--}}

<script type="text/javascript" src="{{ asset('plugins/select2.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/slick-custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>

@include('sweet::alert')
@yield('scripts')
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/frontend/cookie.js') }}"></script>
<noscript>Your browser does not support JavaScript!</noscript>
</html>

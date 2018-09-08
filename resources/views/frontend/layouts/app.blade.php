<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Wish shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{!! asset(config('settings.app_favicon')) !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/themify/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/elegant-font/html-css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/css/lightbox.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/util.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/main.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    @yield('style')
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

        @yield('content')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.backtotop')

        <div id="dropDownSelect1"></div>

        <div id="dropDownSelect2"></div>

    </main>
</div>
</body>

<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script type="text/javascript">
    $('.selection-1').select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
</script>

<script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/slick-custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function () {
            swal(nameProduct, 'is added to cart !', 'success');
        });
    });

    $('.block2-btn-addwishlist').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function () {
            swal(nameProduct, 'is added to wishlist !', 'success');
        });
    });
</script>

<script type="text/javascript" src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
    (function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })();
    $(document).ready(function () {
        setTimeout(function () {
            $("#cookieConsent").fadeIn(200);
        }, 4000);
        $("#closeCookieConsent, .cookieConsentOK").click(function () {
            $("#cookieConsent").fadeOut(200);
        });
    });
</script>
@include('sweet::alert')
@yield('scripts')
<script src="{{ asset('js/frontend/main.js') }}"></script>
<noscript>Your browser does not support JavaScript!</noscript>
</html>

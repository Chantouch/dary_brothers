<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="{!! asset(config('settings.app_favicon')) !!}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('settings.app_name', 'Dary Brother Admin Site') }} :Administrator site</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('styles')

</head>
<body class="adminbody">
<div id="main">
    @include('layouts.top-bar')
    @include('layouts.left-sidebar')
    <main class="content-page">
        <div class="content">
            <div class="container-fluid">
                {{ Breadcrumbs::render() }}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Holy congrats!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    @include('layouts.footer')
</div>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
{{--<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('admin/js/detect.js') }}"></script>
<script src="{{ asset('admin/js/fastclick.js') }}"></script>
<script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
<!-- App js -->
<script src="{{ asset('admin/js/pikeadmin.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<!-- BEGIN Java Script for this page -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>--}}
<!-- Counter-Up-->
<script src="{{ asset('js/admin/chart.js') }}"></script>
<script src="{{ asset('admin/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/plugins/counterup/jquery.counterup.min.js') }}"></script>
@include('sweet::alert')
@yield('scripts')
<script>
    (function ($) {
        $('form').submit(function () {
            $(this).find("button[type='submit']").prop('disabled', true);
            $(this).find("a.btn").addClass('disabled');
            $(this).find("button[type='submit']").append(' <i class="fa fa-spinner fa-spin"></i>');
        });
    })(jQuery);
</script>
</body>
</html>

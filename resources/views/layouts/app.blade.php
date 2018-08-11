<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! asset('admin/images/favicon.ico') !!}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }} :Administrator site</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="{{ asset('admin/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

    @yield('styles')

</head>
<body class="adminbody">
<div id="main">

    @include('layouts.top-bar')
    @include('layouts.left-sidebar')

    <main class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                {{ Breadcrumbs::render() }}

                {{--<div class="alert alert-danger" role="alert">--}}
                {{--<h4 class="alert-heading">Info!</h4>--}}
                {{--<p>Alert Body</p>--}}
                {{--</div>--}}

                @yield('content')
            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->
    </main>

    @include('layouts.footer')
</div>


<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/moment.min.js') }}"></script>

<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin/js/detect.js') }}"></script>
<script src="{{ asset('admin/js/fastclick.js') }}"></script>
<script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="{{ asset('admin/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/plugins/counterup/jquery.counterup.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
@include('sweet::alert')
@yield('scripts')
</body>
</html>

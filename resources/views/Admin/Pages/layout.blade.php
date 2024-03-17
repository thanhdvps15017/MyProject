<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FREE RESPONSIVE HORIZONTAL ADMIN</title>
    <link href="{{ asset('assets-admin/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-admin/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="navbar navbar-inverse set-radius-zero">
        @include('Admin.Pages.header')
    </div>
    <section class="menu-section">
        @include('Admin.Pages.nav')
    </section>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <script src="{{ asset('assets-admin/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('assets-admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets-admin/js/custom.js') }}"></script>

</body>

</html>

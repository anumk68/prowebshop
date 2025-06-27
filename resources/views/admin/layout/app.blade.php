<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta name="description" content="car service and repair">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title> ProWebShop</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"> --}}
    @include('admin.layout.partials.styles')

    @yield('styles')



</head>

<body class="sb-nav-fixed">

    {{-- MAIN NAVIGATION BAR --}}
    @include('admin.layout.partials.header')

    {{-- MAIN CONTENT --}}
    <main class="page-content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('admin.layout.partials.footer')

    @include('admin.layout.partials.scripts')

    @yield('scripts')


</body>



</html>




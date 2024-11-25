<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'eBiz Punjab') }}</title>
    <meta name="keywords" content="RLCOs" />
    <meta name="description" content="RLCOs" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dash-logo1.svg') }}">
    <link href="{{ asset('v4/assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('v4/assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('v4/assets/css/landingPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new_assets/css/vue-select.css') }}">
</head>

<body class="page-background">
<!-- background image / main div start -->
<div id="app"></div>

<script type="module" src="{{ asset(mix('js/app.js')) }}"></script>
<script type="module" src="{{ asset('v4/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('v4/assets/OwlCarousel/docs/assets/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('v4/assets/OwlCarousel/docs/assets/owlcarousel/owl.carousel.min.js') }}"></script>
<script type="module" src="{{ asset('v4/assets/js/main.js') }}"></script>

</body>

</html>

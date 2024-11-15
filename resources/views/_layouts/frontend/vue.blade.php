<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Knowledge Hub') }}</title>
    <meta name="keywords" content="RLCOs" />
    <meta name="description" content="RLCOs" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('v3/assets/white_punjab_logo.svg') }}">
    <link href="{{ asset('v3/assets/bootstrap-icons.min,css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('v3/style/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('v3/style/landingPage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new_assets/css/vue-select.css') }}">
</head>

<body class="page-background">
<!-- background image / main div start -->
<div id="app"></div>

<script type="module" src="{{ asset(mix('js/app.js')) }}"></script>
<script type="module" src="{{ asset('v3/js/bootstrap.bundle.min.js') }}"></script>
<script type="module" src="{{ asset('v3/js/main.js') }}"></script>
</body>

</html>

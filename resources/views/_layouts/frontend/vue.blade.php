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
    <link href="{{ asset('new_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new_assets/css/vue-select.css') }}">
</head>

<body class="page-background">
<!-- background image / main div start -->
<div id="app"></div>

<script type="module" src="{{ asset(mix('js/app.js')) }}"></script>
<script type="module" src="{{ asset('new_assets/js/jquery.min.js') }}"></script>
<script type="module" src="{{ asset('new_assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="module" src="{{ asset('new_assets/js/main.js') }}"></script>
</body>

</html>

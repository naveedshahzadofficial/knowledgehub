<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('_layouts/frontend/vue4');
})->where('any', '^(?!api).*$')->where('any', '^(?!admin).*$');

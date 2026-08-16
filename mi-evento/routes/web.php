<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cotizacion', function () {
    return view('cotizacion');
});

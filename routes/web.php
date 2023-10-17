<?php

use Illuminate\Support\Facades\Route;

// $meli = app(\App\Services\Meli\Contracts\MeliServices::class);
//
// dd(
//     $meli->sites()->search([
//         'q' => 'iphone 14',
//         'limit' => 10,
//     ])
// );

Route::get('/', function () {
    return view('welcome');
});

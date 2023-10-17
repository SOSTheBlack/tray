<?php

use Illuminate\Support\Facades\Route;
//
// $meli = app(\App\Services\Meli\Contracts\MeliServices::class);
//
// dd(
//     $meli->sites()->search([
//         'q' => 'uygutrtfugihojpkiuytredyfugihojpkiuytfugihojpkp',
//         'limit' => 10,
//     ])
// );

Route::get('/', function () {
    return view('welcome');
});

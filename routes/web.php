<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Meli\OAuth\TokenController;
use App\Http\Controllers\Api\Meli\OAuth\AuthorizationController;

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

Route::get('/meli/authorization')->uses(AuthorizationController::class)->name('api.meli.authorization');

Route::get('/meli/token')->uses(TokenController::class)->name('api.meli.token');

Route::get('/meli/callback', function (Request $request) {
    return $request->all();
});

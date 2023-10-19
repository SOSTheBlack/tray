<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Meli\OAuth2\Token2Controller;
use App\Http\Controllers\Api\Meli\OAuth2\Authorization2Controller;

Route::get('/meli/authorization')->uses(Authorization2Controller::class)->name('api.meli.authorization');

Route::get('/meli/token')->uses(Token2Controller::class)->name('api.meli.token');

Route::get('/meli/callback', function (Request $request) {
    return $request->all();
});

Route::get('/', function () {
    return ['ping' => 'pong'];
});

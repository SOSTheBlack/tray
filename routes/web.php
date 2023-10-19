<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Meli\OAuth2\Token2Controller;
use App\Http\Controllers\Api\Meli\OAuth2\Authorization2Controller;

//
// $meli = app(\App\Services\Meli\Contracts\MeliService::class);
//
// dd(
//     $meli->sites()->search([
//         'q' => 'jumbão',
//         'limit' => 10,
//     ]),
//
//     $meli->visits()->items(['ids' => 'MLB3361065629'])
// );
//
// Route::get('/', function () {
//     return view('welcome');
// });

// dd(
//     $searchNewItemsJob = app(\App\Services\Meli\Jobs\SearchAndSaveItemsJob::class),
//
//     $searchNewItemsJob->dispatch()
// );

Route::get('/meli/authorization')->uses(Authorization2Controller::class)->name('api.meli.authorization');

Route::get('/meli/token')->uses(Token2Controller::class)->name('api.meli.token');

Route::get('/meli/callback', function (Request $request) {
    return $request->all();
});

Route::get('/', function () {
    return ['ping' => 'pong'];
});

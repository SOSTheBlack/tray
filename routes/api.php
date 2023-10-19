<?php

use App\Http\Controllers\Api\Meli\ItemListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['ping' => 'pong'];
});

Route::prefix('/meli')->name('meli.')->group(function () {
    Route::get('/items')->uses(ItemListController::class)->name('item_list');
});

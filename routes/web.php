<?php

use App\Services\Meli\Sites\Sites;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// $meli = new \App\Services\Meli\Meli();
//
// $fixture = new Sites($meli, null);
// $reflector = new ReflectionProperty($fixture::class, 'siteId');
// $reflector->setAccessible(true);
// $var = $reflector->getValue($fixture);
//
// dd($var);

Route::get('/', function () {
    return view('welcome');
});

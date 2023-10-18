<?php

namespace App\Http\Controllers\Api\Meli;

use App\Http\Controllers\Api\ApiController;
use App\Services\Meli\Contracts\MeliService;

abstract class MeliController extends ApiController
{
    public function __construct(protected readonly MeliService $meliService)
    {
    }
}

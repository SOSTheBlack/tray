<?php

namespace App\Http\Controllers\Api\Meli;

use App\Http\Controllers\Api\ApiController;
use App\Services\Meli\Contracts\MeliService;
use App\Repositories\Contracts\MeliItemRepository;

abstract class MeliController extends ApiController
{
    public function __construct(
        protected readonly MeliService        $meliService,
        protected readonly MeliItemRepository $meliRepository
    ) {
    }
}

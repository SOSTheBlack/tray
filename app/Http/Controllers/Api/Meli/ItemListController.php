<?php

namespace App\Http\Controllers\Api\Meli;

use Illuminate\Http\JsonResponse;

final class ItemListController extends MeliController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse
    {
        return response()->json($this->meliRepository->all());
    }
}

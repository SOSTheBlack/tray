<?php

namespace App\Http\Controllers\Api\Meli\OAuth2;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

final class Token2Controller extends OAuth2Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // try {
            return response()->json($this->meliService->oauth()->token(), Response::HTTP_CREATED);
        // } catch () {

        // }
    }
}

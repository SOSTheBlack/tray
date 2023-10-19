<?php

namespace App\Http\Controllers\Api\Meli;

use Illuminate\Http\Request;

final class CallbackController extends MeliController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $this->meliService->callbackProcess()
    }
}

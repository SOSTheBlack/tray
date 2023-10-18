<?php

namespace App\Http\Controllers\Api\Meli\OAuth2;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

final class Authorization2Controller extends OAuth2Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        return $this->meliService->oauth()->authorization();
    }
}

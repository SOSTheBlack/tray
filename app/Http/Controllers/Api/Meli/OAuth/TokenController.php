<?php

namespace App\Http\Controllers\Api\Meli\OAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

final class TokenController extends OAuthController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd($this->meliSocialite->stateless()->user());
    }
}

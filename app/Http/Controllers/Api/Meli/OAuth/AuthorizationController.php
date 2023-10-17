<?php

namespace App\Http\Controllers\Api\Meli\OAuth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

final class AuthorizationController extends OAuthController
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
        return $this->meliSocialite->redirect();
    }
}

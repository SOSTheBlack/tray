<?php

namespace App\Http\Controllers\Api\Meli\OAuth;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Provider;
use App\Http\Controllers\Api\Meli\MeliController;

abstract class OAuthController extends MeliController
{
    private const MELI_SOCIALITE_DRIVER = 'mercadolibre';

    protected Provider $meliSocialite;

    public function __construct()
    {
        $this->meliSocialite = Socialite::driver(self::MELI_SOCIALITE_DRIVER);
    }
}

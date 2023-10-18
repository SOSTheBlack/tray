<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Provider;
use GuzzleHttp\Exception\ClientException;
use App\Services\Meli\Data\ExceptionData;
use App\Services\Meli\Data\OAuth2\TokenData;
use App\Services\Meli\Exceptions\OAuth2Exception;
use App\Services\Meli\Contracts\Resources\OAuth2Resource;

class OAuth2 implements OAuth2Resource
{
    private Provider $meliSocialite;

    public function __construct(private readonly Meli $meli)
    {
        $this->meliSocialite = Socialite::driver(self::MELI_SOCIALITE_DRIVER);
    }

    public function authorization(): RedirectResponse
    {
        return $this->meliSocialite->redirect();
    }

    /**
     * @throws OAuth2Exception
     */
    public function token()
    {
        try {
            $tokenData = TokenData::from((array) $this->meliSocialite->stateless()->user());

            dd($tokenData);
        } catch (ClientException $clientException) {
            $exceptionData = ExceptionData::from(
                $clientException->getResponse()->getBody()->getContents()
            );

            throw new OAuth2Exception($exceptionData);
        }
    }
}

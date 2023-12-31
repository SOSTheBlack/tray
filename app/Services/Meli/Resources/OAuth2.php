<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Provider;
use GuzzleHttp\Exception\ClientException;
use App\Services\Meli\Data\ExceptionData;
use App\Services\Meli\Data\OAuth2\TokenData;
use App\Repositories\Contracts\MeliUserRepository;
use App\Services\Meli\Contracts\Resources\OAuth2Resource;
use SOSTheBlack\Repository\Exceptions\ValidatorException;
use App\Services\Meli\Exceptions\Resources\OAuth2Exception;

class OAuth2 implements OAuth2Resource
{
    /**
     * @var Provider
     */
    private Provider $meliSocialite;

    /**
     * @var MeliUserRepository
     */
    private MeliUserRepository $meliUserRepository;

    /**
     * @param  Meli  $meli
     */
    public function __construct(private readonly Meli $meli)
    {
        $this->meliSocialite = Socialite::driver(self::MELI_SOCIALITE_DRIVER);
        $this->meliUserRepository = app(MeliUserRepository::class);
    }

    /**
     * Redirects to Mercado Libre for the user to authorize the application.
     *
     */
    public function authorization(): RedirectResponse
    {
        return $this->meliSocialite->redirect();
    }

    /**
     * @throws OAuth2Exception
     */
    public function token(): array
    {
        try {
            $userMeli = $this->meliSocialite->stateless()->user();
            $tokenData = TokenData::from(['nickname' => $userMeli->nickname, ... $userMeli->accessTokenResponseBody]);
            return $this->saveNewUserInDatabase($tokenData);
        } catch (ClientException $clientException) {
            $exceptionData = ExceptionData::from(
                $clientException->getResponse()->getBody()->getContents()
            );

            throw new OAuth2Exception($exceptionData, $clientException);
        }
    }

    /**
     * @param  TokenData  $tokenData
     *
     * @return array
     */
    private function saveNewUserInDatabase(TokenData $tokenData): array
    {
        try {
            return $this->meliUserRepository->updateOrCreate(
                [
                    'ref_id' => $tokenData->user_id
                ], [
                    'nickname'      => $tokenData->nickname,
                    'access_token'  => $tokenData->access_token,
                    'refresh_token' => $tokenData->refresh_token,
                ]
            );
        } catch (ValidatorException) {
        }
    }
}

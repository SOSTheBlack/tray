<?php

namespace App\Services\Meli\Data\OAuth2;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public string $id;

    public string $nickname;

    public string $token;

    public string $refreshToken;
}

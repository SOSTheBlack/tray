<?php

namespace App\Services\Meli\Data\OAuth2;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public int $user_id;

    public string $nickname;

    public string $access_token;

    public string $refresh_token;
}

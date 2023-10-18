<?php

namespace App\Services\Meli\Contracts;

use App\Services\Meli\Resources\Sites;
use App\Services\Meli\Resources\OAuth2;
use App\Services\Meli\Resources\Visits;
use App\Services\Meli\Contracts\Resources\SitesResource;

interface MeliService
{
    public const BASE_URL = 'https://api.mercadolibre.com';

    /**
     * @param  string|null  $site_id
     *
     * @return Sites
     */
    public function sites(?string $site_id = null): SitesResource;

    /**
     * @return OAuth2
     */
    public function oauth(): OAuth2;

    public function visits(): Visits;
}

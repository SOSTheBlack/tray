<?php

namespace App\Services\Meli\Contracts;

use App\Services\Meli\Resources\Sites;
use App\Services\Meli\Resources\OAuth2;
use App\Services\Meli\Resources\Visits;
use App\Services\Meli\Contracts\Resources\SitesResource;

interface MeliService
{
    /**
     * URL Base of API
     *
     * @const string
     */
    public const BASE_URL = 'https://api.mercadolibre.com';

    /**
     * @param  string|null  $site_id
     *
     * @return Sites
     */
    public function sites(?string $site_id = null): SitesResource;

    /**
     * Api of authentication.
     *
     * @return OAuth2
     */
    public function oauth(): OAuth2;

    /**
     * Api of visits.
     *
     * @return Visits
     */
    public function visits(): Visits;
}

<?php

namespace App\Services\Meli\Contracts;

use App\Services\Meli\Resources\Sites\Sites;
use App\Services\Meli\Contracts\Resources\SitesResource;

interface MeliServices
{
    public const BASE_URL = 'https://api.mercadolibre.com';

    /**
     * @param  string|null  $site_id
     *
     * @return Sites
     */
    public function sites(?string $site_id = null): SitesResource;
}

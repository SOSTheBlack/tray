<?php

namespace App\Services\Meli;

use App\Services\Meli\Resources\Sites;
use App\Services\Meli\Resources\OAuth2;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Meli\Contracts\MeliService;
use App\Services\Meli\Contracts\Resources\SitesResource;

class Meli implements MeliService
{
    public function __construct(public PendingRequest $api) {}

    /**
     * @param  string|null  $site_id
     *
     * @return Sites
     */
    public function sites(?string $site_id = null): SitesResource
    {
        return new Sites($this, $site_id);
    }

    /**
     * @return OAuth2
     */
    public function oauth(): OAuth2
    {
        return new OAuth2($this);
    }
}

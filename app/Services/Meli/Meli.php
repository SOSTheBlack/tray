<?php

namespace App\Services\Meli;

use Illuminate\Http\Client\PendingRequest;
use App\Services\Meli\Resources\Sites\Sites;
use App\Services\Meli\Contracts\MeliServices;
use App\Services\Meli\Contracts\Resources\SitesResource;

class Meli implements MeliServices
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
}

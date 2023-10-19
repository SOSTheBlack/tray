<?php

namespace App\Services\Meli;

use App\Services\Meli\Resources\Sites;
use App\Services\Meli\Resources\OAuth2;
use App\Services\Meli\Resources\Visits;
use Illuminate\Http\Client\PendingRequest;
use App\Services\Meli\Contracts\MeliService;
use App\Services\Meli\Contracts\Resources\SitesResource;

class Meli implements MeliService
{
    private object $config;

    public function __construct(public PendingRequest $api)
    {
        $this->config = (object)config('services.mercadolibre');
    }

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

    public function visits(): Visits
    {
        return new Visits($this);
    }

    public function getConfig(): object
    {
        return $this->config;
    }
}

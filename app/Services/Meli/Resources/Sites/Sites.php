<?php

namespace App\Services\Meli\Resources\Sites;

use App\Services\Meli\Meli;
use App\Services\Meli\Contracts\Resources\SitesResource;

class Sites implements SitesResource
{
    public function __construct(private readonly Meli $meli, private ?string $siteId = null)
    {
        $this->siteId = $this->defineSiteId($siteId);
    }

    public function search(array $query): ?object
    {
        $url = vsprintf(self::ENDPOINT_SEARCH, [$this->siteId]);

        return $this->meli->api->get($url, $query)->object();
    }

    private function defineSiteId(?string $site)
    {
        return $site ?: config('services.meli.site_id');
    }
}

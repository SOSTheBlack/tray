<?php

namespace App\Services\Meli\Sites;

use App\Services\Meli\Meli;

class Sites
{
    public function __construct(private readonly Meli $meli, private ?string $siteId = null)
    {
        $this->siteId = $this->defineSiteId($siteId);
    }

    private function defineSiteId(?string $site)
    {
        return $site ?: config('services.meli.site_id');
    }
}

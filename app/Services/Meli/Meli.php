<?php

namespace App\Services\Meli;

use Illuminate\Http\Client\PendingRequest;
use App\Services\Meli\Resources\Sites\Sites;
use App\Services\Meli\Contracts\MeliServices;

class Meli implements MeliServices
{
    public function __construct(public PendingRequest $api) {}

    /**
     * @param  string|null  $site_id
     *
     * @return Sites
     */
    public function sites(?string $site_id = null): Sites
    {
        return new Sites($this, $site_id);
    }
}

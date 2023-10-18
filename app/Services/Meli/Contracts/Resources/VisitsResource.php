<?php

namespace App\Services\Meli\Contracts\Resources;

use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Exceptions\SitesException;

interface VisitsResource
{
    public const ENDPOINT_ITEMS = '/visits/items';

    public function items(array $ids): object;
}

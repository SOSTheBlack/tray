<?php

namespace App\Services\Meli\Contracts\Resources;

interface VisitsResource
{
    public const ENDPOINT_ITEMS = '/visits/items';

    public function items(array $ids): object;
}

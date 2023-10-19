<?php

namespace App\Services\Meli\Contracts\Resources;

interface VisitsResource
{
    /**
     * Endpoint to view the number of visits to the item.
     *
     * @const string
     */
    public const ENDPOINT_ITEMS = '/visits/items';

    /**
     * Search on Mercado Livre for the number of visits the item had.
     *
     * @param  array  $ids
     *
     * @return object
     */
    public function items(array $ids): object;
}

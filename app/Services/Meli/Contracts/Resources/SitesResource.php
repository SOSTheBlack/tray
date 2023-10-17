<?php

namespace App\Services\Meli\Contracts\Resources;

use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Exceptions\SitesException;

interface SitesResource
{
    public const ENDPOINT_SEARCH = '/sites/%s/search';

    /**
     * @param  array  $query
     *
     * @return DataCollection
     *
     * @throws SitesException
     */
    public function search(array $query): DataCollection;
}

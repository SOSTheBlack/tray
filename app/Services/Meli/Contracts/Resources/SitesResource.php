<?php

namespace App\Services\Meli\Contracts\Resources;

use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Exceptions\Resources\SitesException;

interface SitesResource
{
    /**
     * Endpoint to search for items.
     *
     * @const string
     */
    public const ENDPOINT_SEARCH = '/sites/%s/search';

    /**
     * Default limit on the number of results per page.
     *
     * @const int
     */
    public const LIMIT_DEFAULT = 50;

    /**
     * @param  string  $word
     *
     * @return DataCollection
     *
     * @throws SitesException
     */
    public function search(string $word): DataCollection;

    /**
     * Define limit on the number of results per page.
     *
     * @param  int  $limit
     *
     * @return SitesResource
     */
    public function setLimit(int $limit): SitesResource;
}

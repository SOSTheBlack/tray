<?php

namespace App\Services\Meli\Contracts\Resources;

use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Exceptions\Resources\SitesException;

interface SitesResource
{
    public const ENDPOINT_SEARCH = '/sites/%s/search';

    public const LIMIT_DEFAULT = 50;

    /**
     * @param  string  $word
     *
     * @return DataCollection
     *
     * @throws SitesException
     */
    public function search(string $word): DataCollection;

    public function setLimit(int $limit): SitesResource;
}

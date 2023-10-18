<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Data\Sites\SearchResultData;
use App\Services\Meli\Exceptions\SitesException;
use App\Services\Meli\Contracts\Resources\SitesResource;

class Sites implements SitesResource
{
    public function __construct(private readonly Meli $meli, private ?string $siteId = null)
    {
        $this->siteId = $this->defineSiteId($siteId);
    }

    private function defineSiteId(?string $site)
    {
        return $site ?: config('services.mercadolibre.site_id');
    }

    /**
     * @param  array  $query
     *
     * @return DataCollection
     *
     * @throws SitesException
     */
    public function search(array $query): DataCollection
    {
        $url = vsprintf(self::ENDPOINT_SEARCH, [$this->siteId]);

        $response = $this->meli->api->get($url, $query);

        if ($response->failed()) {
            throw new SitesException('error searching items');
        }

        return SearchResultData::collection($response->object()->results);
    }
}

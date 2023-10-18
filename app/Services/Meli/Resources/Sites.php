<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Data\Sites\SearchResultData;
use App\Services\Meli\Contracts\Resources\SitesResource;
use App\Services\Meli\Exceptions\Resources\SitesException;

class Sites implements SitesResource
{
    private int $limit = self::LIMIT_DEFAULT;

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
    public function search(string $word): DataCollection
    {
        $endpoint = vsprintf(self::ENDPOINT_SEARCH, [$this->siteId]);

        $response = $this->meli->api
            ->get($endpoint, [
                'q' => $word,
                'limit' => $this->limit
            ]);

        if ($response->failed()) {
            throw new SitesException('error searching items');
        }

        return SearchResultData::collection($response->object()->results);
    }

    public function setLimit(int $limit): SitesResource
    {
        $this->limit = $limit;

        return $this;
    }
}

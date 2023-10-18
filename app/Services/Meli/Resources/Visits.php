<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Data\ExceptionData;
use App\Services\Meli\Exceptions\SitesException;
use App\Services\Meli\Data\Sites\SearchResultData;
use App\Services\Meli\Contracts\Resources\SitesResource;
use App\Services\Meli\Contracts\Resources\VisitsResource;

class Visits implements VisitsResource
{
    public function __construct(private readonly Meli $meli)
    {
    }

    /**
     * @param  array  $ids
     *
     * @return DataCollection
     *
     * @throws SitesException
     */
    public function items(array $ids): object
    {
        $response = $this->meli->api
            ->withToken($this->meli->getConfig()->access_token)
            ->get(self::ENDPOINT_ITEMS, $ids);

        if ($response->failed()) {
            throw new SitesException(ExceptionData::from($response->object()));
        }

        return $response->object();
    }
}

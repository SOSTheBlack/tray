<?php

namespace App\Services\Meli\Resources;

use App\Services\Meli\Meli;
use Spatie\LaravelData\DataCollection;
use App\Services\Meli\Data\ExceptionData;
use App\Services\Meli\Contracts\Resources\VisitsResource;
use App\Services\Meli\Exceptions\Resources\SitesException;

class Visits implements VisitsResource
{
    /**
     * @param  Meli  $meli
     */
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

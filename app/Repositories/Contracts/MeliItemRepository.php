<?php

namespace App\Repositories\Contracts;

use SOSTheBlack\Repository\Contracts\RepositoryInterface;

/**
 * Interface MeliItemRepository.
 */
interface MeliItemRepository extends RepositoryInterface
{
    /**
     * Limit of rows in the table specified in discovery
     *
     * @const int
     */
    public const TABLE_LIMIT = 10;
}

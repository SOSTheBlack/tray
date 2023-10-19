<?php

namespace App\Repositories\Contracts;

use SOSTheBlack\Repository\Contracts\RepositoryInterface;

/**
 * Interface MeliItemRepository.
 */
interface MeliItemRepository extends RepositoryInterface
{
    public const TABLE_LIMIT = 10;
}

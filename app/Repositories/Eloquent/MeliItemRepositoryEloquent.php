<?php

namespace App\Repositories\Eloquent;

use App\Models\MeliItem;
use App\Repositories\Contracts\MeliItemRepository;
use App\Repositories\Presenters\MeliItemPresenter;
use SOSTheBlack\Repository\Eloquent\BaseRepository;
use SOSTheBlack\Repository\Criteria\RequestCriteria;
use SOSTheBlack\Repository\Exceptions\RepositoryException;

/**
 * Class MeliItemRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class MeliItemRepositoryEloquent extends BaseRepository implements MeliItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return MeliItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @return void
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(): ?string
    {
        return MeliItemPresenter::class;
    }
}

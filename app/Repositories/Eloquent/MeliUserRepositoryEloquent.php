<?php

namespace App\Repositories\Eloquent;

use App\Models\MeliUser;
use App\Repositories\Contracts\MeliUserRepository;
use App\Repositories\Presenters\MeliUserPresenter;
use SOSTheBlack\Repository\Eloquent\BaseRepository;
use SOSTheBlack\Repository\Criteria\RequestCriteria;
use SOSTheBlack\Repository\Exceptions\RepositoryException;

/**
 * Class MeliUserRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class MeliUserRepositoryEloquent extends BaseRepository implements MeliUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return MeliUser::class;
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
        return MeliUserPresenter::class;
    }
}

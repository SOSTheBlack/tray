<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\MeliItemTransformer;
use SOSTheBlack\Repository\Presenter\FractalPresenter;

/**
 * Class MeliUserPresenter.
 *
 * @package namespace App\Presenters;
 */
class MeliItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return MeliItemTransformer
     */
    public function getTransformer(): MeliItemTransformer
    {
        return new MeliItemTransformer();
    }
}

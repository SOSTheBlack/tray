<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\MeliUserTransformer;
use SOSTheBlack\Repository\Presenter\FractalPresenter;

/**
 * Class MeliUserPresenter.
 *

 * @package namespace App\Presenters;
 */
class MeliUserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer(): MeliUserTransformer
    {
        return new MeliUserTransformer();
    }
}

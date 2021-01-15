<?php

namespace App\Presenters;

use App\Transformers\ContaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContaPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContaTransformer();
    }
}

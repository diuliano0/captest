<?php

namespace Modules\Banco\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Banco\Models\Conta;

/**
 * Class ContaTransformer.
 *
 * @package namespace App\Transformers;
 */
class ContaTransformer extends TransformerAbstract
{
    /**
     * Transform the Conta entity.
     *
     * @param Modules\Banco\Models\Conta $model
     *
     * @return array
     */
    public function transform(Conta $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

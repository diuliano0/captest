<?php

namespace  Modules\Banco\Repositories;

use Modules\Banco\Models\Conta;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ContaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ContaRepositoryEloquent extends BaseRepository implements ContaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Conta::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 30/12/2016
 * Time: 10:44
 */

namespace Modules\Banco\Providers;




use Illuminate\Support\ServiceProvider;
use Modules\Banco\Repositories\ContaRepository;
use Modules\Banco\Repositories\ContaRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ContaRepository::class,
            ContaRepositoryEloquent::class
        );

    }
}

<?php

namespace App\Services;


class BaseService
{
	protected static function transformerData($data, $classPresenter){
        return app($classPresenter)->present($data);
	}

}

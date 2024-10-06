<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    protected Model $model;

    public function set(Model $model): Service
    {
        $this->model = $model;

        return $this;
    }
}

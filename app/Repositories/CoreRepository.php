<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Repositories
 * Class CoreRepository.
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}

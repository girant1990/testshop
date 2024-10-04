<?php

namespace App\Repositories;

use App\Repositories\Eloquent\EloquentRepositoryInterface;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Container $container;
    protected $model;
    protected $query;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->model = $this->extractModel();
    }
    public function find($id): Model
    {
        return $this->model->find($id);
    }

    private function extractModel() {
        $model = $this->container->make($this->getModelName());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->getModelName()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $model;
    }


    abstract protected function getModelName();

    public function query()
    {
        if ($this->query instanceof Builder) {
            return $this->query;
        }

        return $this->model->newQuery();
    }
}

<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function get(array $conditions = []);

    public function find($id): Model;

    public function create(array $attributes): bool;

    public function update(array $attributes, $id): Model;

    public function delete($id): bool;
}

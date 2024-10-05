<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemsRepository extends BaseRepository
{

    protected function getModelName()
    {
        return Item::class;
    }


    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function get(array $conditions = [])
    {
        if (!empty($conditions)) {
            foreach ($conditions as $key => $condition) {
                $this->query()->where($key, $condition);
            }
        }
        return $this->query()->paginate(10);
    }

    public function getPaginated($perPage = null): LengthAwarePaginator {
        $query = $this->query();
        if (!$perPage) {
            $perPage = config('app.pagination_items_count');
        }

        return $query->paginate($perPage);
    }

    public function create(array $attributes): bool
    {
        return true;
    }

    public function update(array $attributes, $id): Model
    {
        // TODO: Implement update() method.
    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }
}

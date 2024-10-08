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

    public function getPaginated($from, $to, $perPage = null): LengthAwarePaginator {
        $query = $this->query();
        if ($from) {
            $query->where('price', '>=', $from);
        }
        if ($to) {
            $query->where('price', '<=', $to);
        }

        $query->orderBy('id', 'desc');
        if (!$perPage) {
            $perPage = config('app.pagination_items_count');
        }

        return $query->paginate($perPage);
    }

    public function getFiltered($from, $to){
        $query = $this->query();
        if ($from) {
            $query->where('price', '>=', $from);
        }
        if ($to) {
            $query->where('price', '<=', $to);
        }

        $query->orderBy('id', 'desc');

        return $query->get();
    }

    public function create(array $attributes): bool
    {
       $item = Item::create([
            'name' => $attributes['name'],
            'price' => $attributes['price'],
            'count' => $attributes['count'],
        ]);

       return ($item instanceof Item);
    }

    public function update(array $attributes, $id): Model
    {
        // TODO: Implement update() method.
    }

    public function updateModel(array $attributes, Item $item): bool
    {
        $item->name = $attributes['name'];
        $item->price = $attributes['price'];
        $item->count = $attributes['count'];
        return $item->save();
    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }

    public function deleteItem(Item $item) {
        return $item->delete();
    }
}

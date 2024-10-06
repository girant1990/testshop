<?php

namespace App\Services;

use App\Repositories\ItemsRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemsService
{
    public function __construct(public ItemsRepository $itemsRepository)
    {
    }

    public function getAllItems(): LengthAwarePaginator {
        return $this->itemsRepository->getPaginated();
    }

    public function create($attrinutes) {
        return ($this->itemsRepository->create($attrinutes));
    }
}

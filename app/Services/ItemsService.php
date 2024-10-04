<?php

namespace App\Services;

use App\Repositories\ItemsRepository;

class ItemsService
{
    public function __construct(public ItemsRepository $itemsRepository)
    {
    }

    public function getAllItems() {
        return $this->itemsRepository->get();
    }
}

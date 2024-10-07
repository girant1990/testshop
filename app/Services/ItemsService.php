<?php

namespace App\Services;

use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemsService
{
    public function __construct(public ItemsRepository $itemsRepository)
    {
    }

    public function getAllItems(Request $request): LengthAwarePaginator {

        $from = $request->exists('priceFrom') ? (double)$request->priceFrom : null;
        $to = $request->exists('priceTo') ? (double)$request->priceTo : null;
        return $this->itemsRepository->getPaginated($from, $to);
    }

    public function create($attrinutes) {
        return ($this->itemsRepository->create($attrinutes));
    }
}

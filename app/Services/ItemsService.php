<?php

namespace App\Services;

use App\Jobs\ExportToCsv;
use App\Repositories\ItemsRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemsService
{
    public function __construct(public ItemsRepository $itemsRepository)
    {
    }

    public function getAllItems(Request $request): LengthAwarePaginator {

        $attributes = $this->getFromToAttributes($request);
        return $this->itemsRepository->getPaginated($attributes['from'], $attributes['to']);
    }

    public function create($attrinutes) {
        return ($this->itemsRepository->create($attrinutes));
    }

    public function exportCSV(Request $request) {
        $attributes = $this->getFromToAttributes($request);
        $data = $this->itemsRepository->getFiltered($attributes['from'], $attributes['to']);
        ExportToCsv::dispatch(collect($data), $request->secretKey);
    }

    private function getFromToAttributes(Request $request) {
        $from = $request->exists('priceFrom') ? (double)$request->priceFrom : null;
        $to = $request->exists('priceTo') ? (double)$request->priceTo : null;
        return ['from' => $from, 'to' => $to];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Repositories\ItemsRepository;
use App\Services\ItemsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemsService $service)
    {
        return view('layouts.user.items.index',
            [
                'items' => $service->getAllItems($request),
                'priceFrom' => $request->exists('priceFrom') ? $request->priceFrom : null,
                'priceTo' => $request->exists('priceTo') ? $request->priceTo : null,
            ]);
    }

    public function getItemsData(Request $request, ItemsService $service)
    {
        return response()->json($service->getAllItems($request));
    }

    public function exportCSV(Request $request, ItemsService $service)
    {
        $service->exportCSV($request);
        return true;
    }

    public function downloadCSV($fileName)
    {
        $filePath = "exports/{$fileName}.csv";

        if (Storage::exists('public/' . $filePath)) {
            return response()->download(public_path() . '/storage/' . $filePath);
        }

        return response()->with(['error' => 'File not found'], 404);

    }
}

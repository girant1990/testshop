<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemsCreateUpdateRequest;
use App\Models\Item;
use App\Repositories\ItemsRepository;
use App\Services\ItemsService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ItemsService $service)
    {
        return view('layouts.admin.items.index', ['items' => $service->getAllItems()]);
    }

    public function getItemsData(Request $request, ItemsService $service)
    {
        return response()->json($service->getAllItems());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsCreateUpdateRequest $request, ItemsService $service)
    {
       if ($service->create($request->validated())) {
           return redirect()->route('item.index')->with('success', __('lang.Item created successfully'));
       } else {
           return redirect()->back()->with('error', __('lang.Something went wrong'));
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('layouts.admin.items.create', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsCreateUpdateRequest $request, Item $item, ItemsRepository $repository)
    {
        if($repository->updateModel($request->validated(), $item)) {
            return redirect()->route('item.index')->with('success', __('lang.Item updated successfully'));
        }
        return redirect()->back()->with('error', __('lang.Something went wrong'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item, ItemsRepository $repository)
    {
        if($repository->deleteItem($item)) {
            return redirect()->back()->with('success', __('lang.Item deleted successfully'));
        } else {
            return redirect()->back()->with('error', __('lang.Something went wrong'));
        }
    }
}

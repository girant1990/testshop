@extends('layouts.main')
@php

$editMode = isset($item);

@endphp
@section('content')
    <div class="row d-flex justify-content-center align-items-center">
        <form class="form" action=@if($editMode) {{route('item.update', ['item' => $item->id]) }} @else {{route('item.store')}} @endif " method="post">
            @csrf
            @if($editMode) @method('PATCH') @endif
            <div class="mb-3">
                <label for="inputItemName" class="form-label">{{__('lang.name')}}</label>
                <input name="name" required type="text" class="form-control" id="inputItemName" aria-describedby="inputItemNameHelp" @if($editMode) value="{{$item->name}}" @endif>
                <div id="inputItemNameHelp" class="form-text">{{__('lang.Enter item name')}}</div>
            </div>
            <div class="mb-3">
                <label for="inputItemPrice" class="form-label">{{__('lang.price')}}</label>
                <input name="price" required type="number" step="0.01" class="form-control" id="inputItemPrice" aria-describedby="itemPriceHelp" @if($editMode) value="{{$item->price}}" @endif>
                <div id="itemPriceHelp" class="form-text">{{__('lang.Enter item price')}}</div>
            </div>
            <div class="mb-3">
                <label for="inputItemCount" class="form-label">{{__('lang.count')}}</label>
                <input name="count" required type="number" step="0.01" class="form-control" id="inputItemCount" aria-describedby="itemCountHelp" @if($editMode) value="{{$item->count}}" @endif>
                <div id="itemCountHelp" class="form-text">{{__('lang.Enter item count')}}</div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
        </form>
    </div>
@endsection

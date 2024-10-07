@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="row">
            <form id="searchForm" class="row g-3" action="{{ route('home') }}" method="get">
                <div class="col-auto">
                    <input @if($priceFrom) value="{{$priceFrom}}" @endif type="number" name="priceFrom" step="0.01" id="priceFrom" class="searchbox form-control " placeholder="{{__('lang.price from')}}">
                </div>
                <div class="col-auto">
                    <input @if($priceTo) value="{{$priceTo}}" @endif type="number" name="priceTo" step="0.01" id="priceTo" class="searchbox form-control" placeholder="{{__('lang.price to')}}">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary mb-3">
                        {{__('lang.search')}}
                    </button>
                    <a href="{{route('home')}}" type="reset" class="btn btn-danger mb-3">{{__('lang.reset')}}</a>
                </div>
            </form>
        </div>
        @if(isset($items))
            <div class="row m-0 gap-4 justify-content-between align-items-center">
                @foreach($items as $item)
                    @include('components.card', [
                        'name'  => $item->name,
                        'count' => $item->count,
                        'cost'  => $item->price,
                    ]
                )
                @endforeach
                {{ $items->appends(['priceFrom' => $priceFrom, 'priceTo' => $priceTo])->links() }}
                @else
                    <div>{{__('lang.no data')}}</div>
                @endif
            </div>
    </div>
@endsection


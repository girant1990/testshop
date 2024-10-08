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
                    <button id="btnCsvExport" type="button" class="btn btn-primary mb-3">{{__('lang.export')}}</button>
                </div>
            </form>
        </div>
        @if(isset($items))
            <div class="row m-0 gap-4 justify-content-between align-items-center">
                @foreach($items as $item)
                    @include('components.card', [
                        'name'  => $item->name,
                        'count' => $item->count,
                        'price'  => $item->price,
                        'id'    => $item->id,
                    ]
                )
                @endforeach
                {{ $items->appends(['priceFrom' => $priceFrom, 'priceTo' => $priceTo])->links() }}
                @else
                    <div>{{__('lang.no data')}}</div>
                @endif
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="downloadCSVModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="downloadCSVModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadCSVModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a id="downloadLink" href="">Download exported CSV</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="downloadBtnModal" type="button" class="btn btn-primary">Download</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script src="{{ mix('js/items/export.js') }}"></script>
@endsection


@extends('layouts.main')
@section('content')
    <div class="content">
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
                {{ $items->links() }}
                @else
                    <div>{{__('lang.no data')}}</div>
                @endif
            </div>
    </div>
@endsection


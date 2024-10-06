@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <a class="btn-primary btn btn-sm" id="create-item" href="{{route('item.create')}}">{{__('lang.add')}}</a>
            </div>
        </div>
        <div class="datatable-div w-100 table-responsive" data-url="items/data" id="items-table"></div>
        {{$items->links()}}
    </div>
@endsection

<!--Delete confirmation modal START-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">{{__('lang.warning')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{__('lang.are you sure you want to delete this item?')}}</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action = "" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('lang.cancel')}}</button>
                        <button id type="submit" class="btn btn-danger">{{__('lang.confirm')}}</button>
                    </form>
                </div>
        </div>
    </div>
</div>
<!--Delete confirmation modal END-->


@section('custom_scripts')
    <script>
        let collection = {!! \Illuminate\Support\Collection::make($items->items()) !!}
    </script>
    <script defer src="{{ mix('js/items/items.js') }}"></script>
@endsection

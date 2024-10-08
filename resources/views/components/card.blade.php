<div id="{{$id}}" class="card-div d-flex flex-column col-3 p-2 justify-content-center align-items-center">
    <div class="row">
        <div class="col">{{__('lang.name')}} : <span id="{{$id}}_name">{{$name}} </span></div>
    </div>
    <div class="row">
        <div class="col">{{__('lang.price')}}: <span id="{{$id}}_cost">{{$price}} </span> </div>
    </div>
    <div class="row">
        <div class="col">{{__('lang.count')}}: <span id="{{$id}}_count">{{$count > 0 ? $count : __('lang.expired')}}</span> </div>
    </div>

    <input type="hidden" id="translations"
           data-expired="{{__('lang.expired')}}"
    >

</div>

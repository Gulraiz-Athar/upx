@php

    $zonearray = array();

    if(isset($zone) && !empty($zone)){
      $zonearray = $zone->countries->pluck('id')->toArray();

    }

@endphp
<style type="text/css">
    .formsubmit label.error{
        font-weight: 100!important;
    }
</style>
<form class="form-some-up form-block formsubmit" role="form" action="{{ route('zone.store') }}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="zoneid" value="@if(!empty($zone)){{ $zone->id }}@endif">
    <div class="form-group">
        <label>Service <span style="color: red;">*</span></label>
        <select class="form-control select2 service_id" id="service_id" name="service_id" required>
            @if(!empty($services))
                @foreach($services as $service)
                    <option value="{{ $service->id }}" @if(!empty($zone) && $zone->service_id == $service->id) selected @endif >
                        {{ $service->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label>Name <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="@if(!empty($zone)){{ $zone->name }}@endif" required>
    </div>
    <div class="form-group">
        <label>Transit time <span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="transit_time" placeholder="Transit time" value="@if(!empty($zone)){{ $zone->transit_time }}@endif" required>
    </div>
    <div class="form-group">
        <label>Country <span style="color: red;">*</span></label>
        <select class="form-control select2" id="country_id" name="country_id[]" multiple="multiple" required>
            @if(!empty($countries))
                @foreach($countries as $country)
                    <option value="{{ $country->id }}"
                            @if(!empty($zonearray) && in_array($country->id,$zonearray)) selected @endif>{{ $country->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">@if(!empty($zone)) Update @else Add @endif <span class="spinner"></span></button>
    </div>
</form>


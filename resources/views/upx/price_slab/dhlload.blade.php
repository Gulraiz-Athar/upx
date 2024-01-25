@php $typearrays = array('price','handling'); $loopruncount = 0;  @endphp
<input type="hidden" class="service_type_main" value="dhl">
<table style="width:100%">
   <tr>
      @if(!empty($zones) && count($zones) > 0)
        <th colspan="3">Weight(KG)</th>
        @foreach($zones as $zone)
        <th><a href="#" data-toggle="tooltip" class="tooltipshow" data-html="true" title="{{ implode('<br>',$zone->countries->pluck('name')->toArray()) }}">{{ $zone->name }}</a></th>
        @endforeach
      @endif
   </tr>
   @if(!empty($weights) && count($weights) > 0)
    @foreach($weights as $weight)
      @if(!empty($typearrays))
        @foreach($typearrays as $typearray)
          <tr>
            @if($loopruncount == 0)
            <th class="weightwidth" rowspan="{{ $rowspan }}">{{ $weight->weight }}</th>
            @endif
            @php $loopruncount = 1; @endphp
            @if($pricetype == '' || $pricetype == 'upx')
              @if($typearray != 'handling')
                <td class="upx" rowspan="2">UPX Price</td>
              @endif
              <td>@if($typearray == 'handling') {{ 'Handling Charge' }} @else {{ ucwords($typearray) }} @endif</td>
                <!-- UPX price -->
              @if(!empty($zones))
                @foreach($zones as $zone)
                  @php
                  $price = getmypricedhl($zone->id,'upx_price',0,$typearray);
                  @endphp
                  <td  class="priceclick" data-zoneid="{{ $zone->id }}" data-type="upx_price" data-service_type="dhlservice" data-pricetype="{{ $typearray }}" data-agentid="0" data-weightid="{{ $weight->id }}" >
                      <span class="finalvalue{{ $zone->id }}{{ $weight->id }}upx_price0dhlservice{{ $typearray }}"><b>&#163; </b>{{ $price  }}</span>
                  <input type="text" onpaste="return false;"  style="display: none;" value="{{ $price }}"  data-agentid="0" data-service_type="dhlservice" data-pricetype="{{ $typearray }}" data-zoneid="{{ $zone->id }}" data-type="upx_price" data-weightid="{{ $weight->id }}" class="textprice pricetab{{$zone->id}}{{$weight->id}}upx_price0dhlservice{{ $typearray }}">
                  </td>
                @endforeach
              @endif
              <!-- UPX price -->
            @endif
          </tr>
        @endforeach
      @endif


           @if($pricetype == '' || $pricetype == 'agent')
             @if(!empty($agents))
               @foreach($agents as $agent)
                     @if(!empty($typearrays))
                        @foreach($typearrays as $newaray)
                               <tr>

                                    @if($newaray != 'handling')
                                      <td class="agent" rowspan="2">{{ $agent->name }} {{ $agent->lastname }}</td>
                                    @endif
                                    <td>@if($newaray == 'handling') {{ 'Handling Charge' }} @else {{ ucwords($newaray) }} @endif</td>
                                    <!-- Agent price -->
                                    @if(!empty($zones))
                                      @foreach($zones as $zone)
                                        @php
                                        $price = getmypricedhl($zone->id,'agent_price',$agent->id,$newaray);
                                        @endphp
                                      <td  class="priceclick" data-zoneid="{{ $zone->id }}" data-service_type="dhlservice" data-pricetype="{{ $newaray }}" data-type="agent_price" data-agentid="{{ $agent->id }}" data-weightid="{{ $weight->id }}" ><span class="finalvalue{{ $zone->id }}{{ $weight->id }}agent_price{{ $agent->id }}dhlservice{{ $newaray }}"><b>&#163; </b>{{ $price  }}</span>
                                         <input type="text" onpaste="return false;"  style="display: none;" value="{{ $price }}" data-service_type="dhlservice" data-agentid="{{ $agent->id }}" data-type="agent_price" data-zoneid="{{ $zone->id }}" data-pricetype="{{ $newaray }}" data-weightid="{{ $weight->id }}" class="textprice pricetab{{$zone->id}}{{$weight->id}}agent_price{{ $agent->id }}dhlservice{{ $newaray }}">
                                      </td>
                                      @endforeach
                                    @endif
                                    <!-- Agent price -->
                               </tr>
                        @endforeach
                      @endif
               @endforeach
             @endif

      @endif



    @endforeach
   @endif
</table>

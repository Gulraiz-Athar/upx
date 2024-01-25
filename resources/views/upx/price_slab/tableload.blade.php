@php $typearrays = array('economy','express'); $loopruncount = 0;  @endphp
@php $pricestypes = array('price','handling'); $loopruncountprice = 0;  @endphp
<input type="hidden" class="service_type_main" value="door_to_door">
<table style="width:100%">
   <tr>
      @if(!empty($zones) && count($zones) > 0)
        <th colspan="4">Weight(KG)</th>
        @foreach($zones as $zone)
        <th><a href="#" data-toggle="tooltip" class="tooltipshow" data-html="true" title="{{ implode('<br>',$zone->countries->pluck('name')->toArray()) }}">{{ $zone->name }}</a></th>
        @endforeach
      @endif
   </tr>
  @if(!empty($weights) && count($weights) > 0)
    @foreach($weights as $weight)
      
        <!-- UPX price whole part -->
        @foreach($typearrays as $typearray)
          @foreach($pricestypes as $pricestype)
            <tr>

                  @if($loopruncountprice == 0)
                  <th class="weightwidth" rowspan="{{ $rowspan }}">{{ $weight->weight }}</th>
                  <td class="upx" rowspan="4">UPX Price</td>
                  @endif
                  
              
                  
                    
                  @if($pricestype != 'handling')
                  <td rowspan="2">{{ ucwords($typearray) }}</td>
                  @endif

                  <td>{{ ucwords($pricestype) }}</td>
                  <!-- UPX price -->
                    @if(!empty($zones))
                      @foreach($zones as $zone)
                        @php
                        $price = getmypricedoortodoor($weight->id,$zone->id,'upx_price',0,$typearray,$pricestype);
                        @endphp
                        <td  class="priceclick" data-zoneid="{{ $zone->id }}" data-type="upx_price" data-service_type="{{ $typearray }}" data-agentid="0" data-weightid="{{ $weight->id }}" data-pricetype="{{ $pricestype }}">
                            <span class="finalvalue{{ $zone->id }}{{ $weight->id }}upx_price0{{ $typearray }}{{ $pricestype }}"><b>&#163; </b>{{ $price  }}</span>
                        <input type="text"  onpaste="return false;" style="display: none;" value="{{ $price }}" data-pricetype="{{ $pricestype }}" data-agentid="0" data-service_type="{{ $typearray }}" data-zoneid="{{ $zone->id }}" data-type="upx_price" data-weightid="{{ $weight->id }}" class="textprice pricetab{{$zone->id}}{{$weight->id}}upx_price0{{ $typearray }}{{ $pricestype }}">
                        </td>
                      @endforeach
                    @endif
                  <!-- UPX price -->
            </tr>
            @php $loopruncountprice = 1; @endphp 
          @endforeach
          @php $loopruncount = 1; @endphp 
        @endforeach
        <!-- UPX price whole part -->

@php $newpricestypes = array('price','handling'); $newloopruncountprice = 0;  @endphp

        <!-- agent price whole part -->
        @if(!empty($agents))
          @foreach($agents as $agent)

            @foreach($typearrays as $newaray)
              @foreach($newpricestypes as $newpricestype)
                <tr>

                  @if($newaray != 'express' && $newpricestype != 'handling')
                  <td class="agent" rowspan="4">{{ $agent->name }} {{ $agent->lastname }}</td>
                  @endif

                  @if($newpricestype != 'handling')
                  <td rowspan="2">{{ ucwords($newaray) }}</td>
                  @endif
                  
                  <td>{{ ucwords($newpricestype) }}</td>
                  <!-- Agent price -->

                  @if(!empty($zones))
                    @foreach($zones as $zone)
                      @php
                      $price = getmypricedoortodoor($weight->id,$zone->id,'agent_price',$agent->id,$newaray,$newpricestype);
                      @endphp

                      <td  class="priceclick" data-zoneid="{{ $zone->id }}" data-service_type="{{ $newaray }}" data-type="agent_price" data-agentid="{{ $agent->id }}" data-weightid="{{ $weight->id }}" data-pricetype="{{ $newpricestype }}"><span class="finalvalue{{ $zone->id }}{{ $weight->id }}agent_price{{ $agent->id }}{{ $newaray }}{{ $newpricestype }}"><b>&#163; </b>{{ $price  }}</span>
                       
                      <input type="text" onpaste="return false;" style="display: none;" value="{{ $price  }}" data-agentid="{{ $agent->id }}" data-type="agent_price" data-zoneid="{{ $zone->id }}" data-service_type="{{ $newaray }}" data-weightid="{{ $weight->id }}"  data-pricetype="{{ $newpricestype }}" class="textprice pricetab{{$zone->id}}{{$weight->id}}agent_price{{ $agent->id }}{{ $newaray }}{{ $newpricestype }}">
                      </td>
                    @endforeach
                  @endif
                  <!-- Agent price -->
                </tr>
              @endforeach
            @endforeach

          @endforeach
        @endif
        <!-- agent price whole part -->
    @endforeach
  @endif
</table>

@php $typearrays = array('0.5','1'); $loopruncount = 0;  @endphp
@php $pricestypes = array('price','handling'); $loopruncountprice = 0;  @endphp
<table style="width:100%">
   <tr>
      <th>Agent/Admin Name</th>
      <th colspan="2">Weight(KG)</th>
      @if(!empty($zones) && count($zones) > 0)
        @foreach($zones as $zone)
        <th><a href="#" data-toggle="tooltip" class="tooltipshow" data-html="true" title="{{ implode('<br>',$zone->countries->pluck('name')->toArray()) }}">{{ $zone->name }}</a></th>
        @endforeach
      @endif
   </tr>

  @foreach($typearrays as $typearray)
    @foreach($pricestypes as $pricestype)
      <tr>
        @php $weightvalue = 'onekg'; @endphp
        @if($loopruncountprice != '1')
        <td  class="upx" rowspan="4">UPX Price</td>
        @endif


        @if($typearray != '1')
        @php $weightvalue = 'halfgram'; @endphp
        @endif

        @if($pricestype != 'handling')
        <td rowspan="2">{{ $typearray }} KG</td>
        @endif
         <td>{{ ucwords($pricestype) }}</td>
        @if(!empty($zones) && count($zones) > 0)
          @foreach($zones as $zone)
            @php
            $price = getmydocumentpricedocument($zone->id,$typearray,'upx_price',0,$pricestype);

            @endphp
            <td class="documentpriceclick" data-zoneid="{{ $zone->id }}" data-type="upx_price" data-service_type="{{ $weightvalue }}" data-agentid="0" data-weightid="{{ $typearray }}" data-fullweight="{{ $typearray }}" data-pricetype="{{ $pricestype }}"><span class="documentfinalvalue{{ $zone->id }}upx_price0{{ $weightvalue }}{{ $pricestype }}"><b>&#163; </b>{{ $price }}</span>
            <input type="text"  onpaste="return false;"  style="display: none;" value="{{ $price  }}"  data-agentid="0" data-service_type="{{ $weightvalue }}" data-zoneid="{{ $zone->id }}"  data-fullweight="{{ $typearray }}" data-type="upx_price" data-weightid="{{ $typearray }}"  data-pricetype="{{ $pricestype }}" class="documenttextprice documentpricetab{{$zone->id}}upx_price0{{ $weightvalue }}{{ $pricestype }}">
            </td>
          @endforeach
        @endif
      </tr>
       @php $loopruncountprice = 1; @endphp 
    @endforeach
    @php $loopruncount = 1; @endphp 
  @endforeach

@php $newpricestypes = array('price','handling'); $newloopruncountprice = 0;  @endphp

@if(!empty($agents))
  @foreach($agents as $agent)
      @foreach($typearrays as $typearray)
        @foreach($newpricestypes as $newpricestype)
          <tr>
            @php $weightvalue = 'onekg'; @endphp
            @if($newpricestype != 'handling' && $typearray != '1')
            <td rowspan="4"  class="agent">{{ $agent->name }} {{ $agent->lastname }}</td>
                   
            @endif

            @if($typearray != '1')
            @php $weightvalue = 'halfgram'; @endphp
            @endif
           
             @if($newpricestype != 'handling')
              <td rowspan="2">{{ $typearray }} KG</td>
              @endif
              <td>{{ ucwords($newpricestype) }}</td>
            @if(!empty($zones) && count($zones) > 0)
              @foreach($zones as $zone)

                  @php
                      $price = getmydocumentpricedocument($zone->id,$typearray,'agent_price',$agent->id,$newpricestype);
                  @endphp
                <td class="documentpriceclick" data-zoneid="{{ $zone->id }}" data-type="agent_price" data-service_type="{{ $weightvalue }}" data-agentid="{{ $agent->id }}" data-weightid="{{ $typearray }}" data-fullweight="{{ $typearray }}" data-pricetype="{{ $newpricestype }}">
                    <span class="documentfinalvalue{{ $zone->id }}agent_price{{ $agent->id }}{{ $weightvalue }}{{ $newpricestype }}"><b>&#163; </b>{{$price}}</span>
                    <input type="text" onpaste="return false;"  style="display: none;" value="{{ $price }}"  data-agentid="{{ $agent->id }}" data-service_type="{{ $weightvalue }}" data-zoneid="{{ $zone->id }}"  data-fullweight="{{ $typearray }}" data-type="agent_price" data-pricetype="{{ $newpricestype }}" data-weightid="{{ $typearray }}" class="documenttextprice documentpricetab{{$zone->id}}agent_price{{ $agent->id }}{{ $weightvalue }}{{ $newpricestype }}">
                </td>
              @endforeach
            @endif
          </tr>
        @endforeach
      @endforeach
  @endforeach
@endif
</table>

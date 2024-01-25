<!DOCTYPE html>
<html lang="en">
<style>

    table {
        border-collapse: collapse;
    }

    html {
        width: 100%;
        height: 100%;
        /*padding: 10px;*/
        margin: 0;
    }

    .textcenter {
        text-align: center;
    }

    .textleft {
        text-align: left;
        padding-left: 10px;
    }

    .textright {
        text-align: right;
        padding-right: 10px;
    }

    .borderall {
        border: .5pt solid windowtext;
    }

    .borderleft {
        border-left: .5pt solid windowtext;
    }

    .borderright {
        border-right: .5pt solid windowtext;
    }

    .bordertop {
        border-top: .5pt solid windowtext;
    }

    .borderbottom {
        border-bottom: .5pt solid windowtext;
    }

    .backgrounddoc {
        background: #D0CECE;
    }

    .textcenterweb, .textcenterweb div {
        text-align: -webkit-center;
    }

    .borleftrighttop {
        border-top: .5pt solid windowtext;
        border-right: .5pt solid windowtext;
        border-left: .5pt solid windowtext;

    }
    hr.line {
        border:none;
        border-top: 1px dashed black;
    }
    body{
        font-size: 14px;
    }

</style>
<body>
<table width="100%" style="padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px;">
    <tbody>

    <tr height="10" style="height:10.0pt">
        <td colspan="6" rowspan="3" height="60" width="384" class="textcenter" style="height:45.0pt;width:288pt"><img
                src="{{ url('public/images/logo/logo.png') }}" style="max-width: 150px;" width="100px" height="auto">
        </td>
        <td colspan="6" rowspan="2" class="textcenter " width="384" style="
    width:288pt"><img src="data:image/png;base64,{!! $qrcode !!}" alt="barcode"/></td>
    </tr>
    <tr height="1" style="height:1.0pt">
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textcenter" style="border-left:none"><b>{{ $booking->tracking_number }}</b>
        </td>
    </tr>
    <tr height="5" style="height:5.0pt">
        <td colspan="6" height="5" class="textcenter" style="
  height:5.0pt"><b>TEL:</b> 0116 326 7812 / 0116 319 4920
        </td>
        <td colspan="2" class="textleft" style="border-left:none">AIRWAY BILL</td>
        <td colspan="4" class="textright">Email:
            Info@upx-uk.com
        </td>
    </tr>
    <tr height="1" style="height:1.0pt">
        <td colspan="6" height="10" class="xl65">&nbsp;</td>
        <td colspan="6" height="10" class="xl65">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" rowspan="2" height="40" class="textcenter borderall backgrounddoc" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black;height:30.0pt">SHIPPER
        </td>
        <td colspan="6" rowspan="2" class="textcenter borderall backgrounddoc" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">CONSIGNEE
        </td>
    </tr>
    <tr height="1" style="height:1.0pt">
    </tr>
   
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft  textleft" style="border-right:.5pt solid black;
  height:10.0pt">{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">@if(!empty($booking->addressessender->address1))
                {{ $booking->addressessender->address1 }}
            @endif
            @if(!empty($booking->addressessender->address2))
                , {{ $booking->addressessender->address2 }}
            @endif
            @if(!empty($booking->addressessender->address3))
                , {{ $booking->addressessender->address3 }}
            @endif</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">@if(!empty($booking->addressesreceiver->address1))
                {{ $booking->addressesreceiver->address1 }}
            @endif
            @if(!empty($booking->addressesreceiver->address2))
                , {{ $booking->addressesreceiver->address2 }}
            @endif
            @if(!empty($booking->addressesreceiver->address3))
                , {{ $booking->addressesreceiver->address3 }}
            @endif</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">
            @if(!empty($booking->addressessender->city))
                {{ $booking->addressessender->city }}
            @endif
            @if(!empty($booking->addressessender->state))
                , {{ $booking->addressessender->state }}
            @endif

            @if(!empty($booking->addressessender->country->name))
                , {{ $booking->addressessender->country->name }}
            @endif

            @if(!empty($booking->addressessender->country->name))
                - {{ $booking->addressessender->postalcode }}
            @endif
        </td>
        <td colspan="6" class="textleft borderright" style="border-right:.5pt solid black;border-left:
  none">
            @if(!empty($booking->addressesreceiver->city))
                {{ $booking->addressesreceiver->city }}
            @endif
            @if(!empty($booking->addressesreceiver->state))
                , {{ $booking->addressesreceiver->state }}
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                , {{ $booking->addressesreceiver->country->name }}
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                - {{ $booking->addressesreceiver->postalcode }}
            @endif
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">
            Company:
            @if(!empty($booking->addressessender->company))
                {{ $booking->addressessender->company }}
            @else {{ '--' }} @endif
        </td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Company: @if(!empty($booking->addressesreceiver->company))
                {{ $booking->addressesreceiver->company }}
            @else {{ '--' }} @endif</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textleft borderleft" style="border-right:.5pt solid black;
  height:10.0pt">Email: {{ $booking->addressessender->email }}</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Email: {{ $booking->addressesreceiver->email }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textleft borderleft" style="border-right:.5pt solid black;
  height:10.0pt">Phone: @if(!empty($booking->addressessender->phonenumber))
                {{ $booking->addressessender->phonenumber }}
            @endif</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Phone: @if(!empty($booking->addressesreceiver->phonenumber))
                {{ $booking->addressesreceiver->phonenumber }}<br>
            @endif</td>
    </tr>

    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall"  style="border-right:.5pt solid black;
  height:10.0pt;">DOCKET/JOB REF NO:
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;
  border-left:none;">{{ $booking->tracking_number }}</td>
        <td colspan="6" class="textcenter backgrounddoc borderall" style="border-right:.5pt solid black;border-left:
  none">Package Info
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">PIECES:
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->dimentions_count}}</td>
        <td colspan="6" rowspan="3" class="textcenter borderall" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">{{ $booking->dimentions[0]->description ?? 'N/A' }} </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">WEIGHT
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ max($booking->actual_weight,$booking->volumetric_weight) }} Kg
        </td>
    </tr>
    {{--<tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">
            VEHICLE
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:none">
            VAN
        </td>
    </tr>--}}
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">
            CONSIGNMENT(GBP)
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:none">
            @if(!empty($booking->final_consignment_amt))
                &#163;{{ $booking->final_consignment_amt }}
            @else
                -
            @endif
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">PURCHASE ORDER
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->createdby->name }} {{ $booking->createdby->lastname }}</td>
        <td colspan="6" class="textcenter backgrounddoc borderall" style="border-right:.5pt solid black;border-left:
  none">Package type:
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">REF
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</td>
        <td colspan="6" rowspan="3" class="textcenter borderall" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">{{ $booking->package_type ?? 'N/A' }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">DATE
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ date('d M Y',strtotime($booking->created_at)) }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">Box
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{-- {{ $booking->dimentions[0]->box_number }}  --}} @if($booking->dimentions[0]->box_page)
                ({{ $booking->dimentions[0]->box_page  }}) @endif</td>
    </tr>
    <tr height="5" style="height:5.0pt">
        <td colspan="12" height="10" class="xl74" style="height:10.0pt">&nbsp;</td>
    </tr>
    {{-- <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">SIGNATURE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">PRICE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">DATE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr> --}}
    <tr height="10" style="height:10.0pt">
        <td colspan="4" height="10" class="textleft" style="height:10.0pt">SIGNATURE:_________________</td>
        <td colspan="4" class="textleft" style="border-left:none"></td>
        {{-- <td colspan="4" class="textleft" style="border-left:none">PRICE:_________________</td> --}}
        <td colspan="4" class="textleft">DATE:_________________</td>
    </tr>
    <tr height="2" style="height:2.0pt">
        <td colspan="12" height="10" class="xl76" style="height:10.0pt"></td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="12" height="10" class="textright" style="border: none; height:10.0pt">Received in Good Order &amp; Condition
        </td>
    </tr>

    </tbody>
</table>
<hr class="line" style="margin-top: 5px; margin-bottom: 5px;">
<table width="100%" style="padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px;">
    <tbody>

    <tr height="10" style="height:10.0pt">
        <td colspan="6" rowspan="3" height="60" width="384" class="textcenter" style="height:45.0pt;width:288pt"><img
                src="{{ url('public/images/logo/logo.png') }}" style="max-width: 150px;" width="100px" height="auto">
        </td>
        <td colspan="6" rowspan="2" class="textcenter " width="384" style="
    width:288pt"><img src="data:image/png;base64,{!! $qrcode !!}" alt="barcode"/></td>
    </tr>
    <tr height="1" style="height:1.0pt">
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textcenter" style="border-left:none"><b>{{ $booking->tracking_number }}</b>
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textcenter" style="
  height:10.0pt"><b>TEL:</b> 0116 326 7812 / 0116 319 4920
        </td>
        <td colspan="2" class="textleft" style="border-left:none">AIRWAY BILL</td>
        <td colspan="4" class="textright">Email:
            Info@upx-uk.com
        </td>
    </tr>
    <tr height="1" style="height:1.0pt">
        <td colspan="6" height="10" class="xl65">&nbsp;</td>
        <td colspan="6" height="10" class="xl65">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" rowspan="2" height="40" class="textcenter borderall backgrounddoc" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black;height:30.0pt">SHIPPER
        </td>
        <td colspan="6" rowspan="2" class="textcenter borderall backgrounddoc" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">CONSIGNEE
        </td>
    </tr>
    <tr height="1" style="height:1.0pt">
    </tr>
   
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft  textleft" style="border-right:.5pt solid black;
  height:10.0pt">{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">@if(!empty($booking->addressessender->address1))
                {{ $booking->addressessender->address1 }}
            @endif
            @if(!empty($booking->addressessender->address2))
                , {{ $booking->addressessender->address2 }}
            @endif
            @if(!empty($booking->addressessender->address3))
                , {{ $booking->addressessender->address3 }}
            @endif</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">@if(!empty($booking->addressesreceiver->address1))
                {{ $booking->addressesreceiver->address1 }}
            @endif
            @if(!empty($booking->addressesreceiver->address2))
                , {{ $booking->addressesreceiver->address2 }}
            @endif
            @if(!empty($booking->addressesreceiver->address3))
                , {{ $booking->addressesreceiver->address3 }}
            @endif</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">
            @if(!empty($booking->addressessender->city))
                {{ $booking->addressessender->city }}
            @endif
            @if(!empty($booking->addressessender->state))
                , {{ $booking->addressessender->state }}
            @endif

            @if(!empty($booking->addressessender->country->name))
                , {{ $booking->addressessender->country->name }}
            @endif

            @if(!empty($booking->addressessender->country->name))
                - {{ $booking->addressessender->postalcode }}
            @endif
        </td>
        <td colspan="6" class="textleft borderright" style="border-right:.5pt solid black;border-left:
  none">
            @if(!empty($booking->addressesreceiver->city))
                {{ $booking->addressesreceiver->city }}
            @endif
            @if(!empty($booking->addressesreceiver->state))
                , {{ $booking->addressesreceiver->state }}
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                , {{ $booking->addressesreceiver->country->name }}
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                - {{ $booking->addressesreceiver->postalcode }}
            @endif
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="borderleft textleft" style="border-right:.5pt solid black;
  height:10.0pt">
            Company:
            @if(!empty($booking->addressessender->company))
                {{ $booking->addressessender->company }}
            @else {{ '--' }} @endif
        </td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Company: @if(!empty($booking->addressesreceiver->company))
                {{ $booking->addressesreceiver->company }}
            @else {{ '--' }} @endif</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textleft borderleft" style="border-right:.5pt solid black;
  height:10.0pt">Email: {{ $booking->addressessender->email }}</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Email: {{ $booking->addressesreceiver->email }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="textleft borderleft" style="border-right:.5pt solid black;
  height:10.0pt">Phone: @if(!empty($booking->addressessender->phonenumber))
                {{ $booking->addressessender->phonenumber }}
            @endif</td>
        <td colspan="6" class="textleft" style="border-right:.5pt solid black;border-left:
  none">Phone: @if(!empty($booking->addressesreceiver->phonenumber))
                {{ $booking->addressesreceiver->phonenumber }}<br>
            @endif</td>
    </tr>

    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall"  style="border-right:.5pt solid black;
  height:10.0pt;">DOCKET/JOB REF NO:
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;
  border-left:none;">{{ $booking->tracking_number }}</td>
        <td colspan="6" class="textcenter backgrounddoc borderall" style="border-right:.5pt solid black;border-left:
  none">Package Info
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">PIECES:
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->dimentions_count}}</td>
        <td colspan="6" rowspan="3" class="textcenter borderall" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">{{ $booking->dimentions[0]->description ?? 'N/A' }} </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">WEIGHT
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ max($booking->actual_weight,$booking->volumetric_weight) }} Kg
        </td>
    </tr>
    {{--<tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">
            VEHICLE
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:none">
            VAN
        </td>
    </tr>--}}
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">
            CONSIGNMENT(GBP)
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:none">
            @if(!empty($booking->final_consignment_amt))
                &#163;{{ $booking->final_consignment_amt }}
            @else
                -
            @endif
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">PURCHASE ORDER
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->createdby->name }} {{ $booking->createdby->lastname }}</td>
        <td colspan="6" class="textcenter backgrounddoc borderall" style="border-right:.5pt solid black;border-left:
  none">Package type:
        </td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">REF
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</td>
        <td colspan="6" rowspan="3" class="textcenter borderall" style="border-right:.5pt solid black;
  border-bottom:.5pt solid black">{{ $booking->package_type ?? 'N/A' }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">DATE
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none">{{ date('d M Y',strtotime($booking->created_at)) }}</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="3" height="10" class="textleft borderall" style="border-right:.5pt solid black;
  height:10.0pt">Box
        </td>
        <td colspan="3" class="textleft borderall" style="border-right:.5pt solid black;border-left:
  none"> @if($booking->dimentions[0]->box_page)
                ({{ $booking->dimentions[0]->box_page  }}) @endif</td>
    </tr>
    <tr height="5" style="height:5.0pt">
        <td colspan="12" height="10" class="xl74" style="height:10.0pt">&nbsp;</td>
    </tr>
    {{-- <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">SIGNATURE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">PRICE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="6" height="10" class="xl76" style="height:10.0pt"></td>
        <td></td>
        <td colspan="2" class="xl111">DATE:</td>
        <td colspan="3" class="borderbottom">&nbsp;</td>
    </tr> --}}
    <tr height="10" style="height:10.0pt">
        <td colspan="4" height="10" class="textleft" style="height:10.0pt">SIGNATURE:_________________</td>
        {{-- <td colspan="4" class="textleft" style="border-left:none">PRICE:_________________</td> --}}
        <td colspan="4" class="textleft" style="border-left:none"></td>
        <td colspan="4" class="textleft">DATE:_________________</td>
    </tr>
    <tr height="2" style="height:2.0pt">
        <td colspan="12" height="10" class="xl76" style="height:10.0pt"></td>
    </tr>
    <tr height="10" style="height:10.0pt">
        <td colspan="12" height="10" class="textright" style="border: none; height:10.0pt">Received in Good Order &amp; Condition
        </td>
    </tr>

    </tbody>
</table>



</body>
</html>

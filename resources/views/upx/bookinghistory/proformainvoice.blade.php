<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 12px;
        /*  padding: 10px 5px;*/
        padding: 5px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-weight: normal;
        /*padding: 10px 5px;*/
        padding: 5px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: inherit;
        text-align: left;
        vertical-align: top
    }

    .border-none {
        border: none !important;
    }

    .center {
        text-align: center !important;
    }

    .no-border-left {
        border-left: none !important;
    }

    .no-border-right {
        border-right: none !important;
    }

    .no-border-top {
        border-top: none !important;
    }

    .no-border-bottom {
        border-bottom: none !important;
    }
    .backgrounddoc {
        background: #D0CECE;
    }
    .border-bold-top {
    	    border-top: 3px solid !important;
    }
     .border-bold-bottom {
    	    border-bottom: 3px solid !important;
    }
    .border-bold-left {
    	    border-left: 3px solid !important;
    }
    .border-bold-right {
    	    border-right: 3px solid !important;
    }
    .border-bold {
    	    border: 3px solid !important;
    }

</style>
<table class="tg" width="100%">
    <tr>
        <th class="tg-0pky no-border-top no-border-bottom no-border-right no-border-left" colspan="7">
            @if(!empty($booking->createdby->logo_image))
                <img src="{{ URL::asset('public/images/users_logos/'.$booking->createdby->logo_image) }}" width="100px" height="auto">
            @else
                <img src="{{ URL::asset('public/images/logo/logo.png') }}" width="100px" height="auto">
            @endif
        </th>
    </tr>
    <tr>
        <td class="tg-0pky center no-border-top no-border-right no-border-left" colspan="7"  style="font-size: 16px;"><b> INVOICE </b></td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left border-bold-top" colspan="3"><b>EXPORTER:</b></td>
      <!--   <td class="tg-0pky no-border-bottom " colspan="2">
            vishal mandora
        </td> -->
        <td class="tg-0pky border-bold-top" colspan="3"><b>INVOICE No. &amp; DATE </b></td>
        <td class="tg-0pky border-bold-right border-bold-top" ><b> EXPORTER REF. </b></td>
       <!--  {{--<td class="tg-0pky" width="25%"><b>BOOKING NO </b></td>--}} -->
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- SHIPPER name -->
        	{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}
    	</td>

       <!--  <td class="tg-0pky" colspan="2">
           deesa</td> -->
        <td class="tg-0pky" colspan="3">
          <!-- INVOICE No. & DATE add -->
          {{ date('d M Y',strtotime($booking->created_at)) }}
        </td>
   
        <td class="tg-0pky border-bold-right">
           <!-- EXPORTER REF add -->
           {{ $booking->tracking_number }}
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- address 1 -->
        	 @if(!empty($booking->addressessender->address1))
                {{ $booking->addressessender->address1 }}
            @endif
        </td>
        
        <td class="tg-0pky no-border-bottom border-bold-right" colspan="4"><b>BUYER'S ORDER No. &amp; DATE </b></td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- address line 2 or address line 3 -->
        	@if(!empty($booking->addressessender->address2))
                {{ $booking->addressessender->address2 }}
            @endif ,  @if(!empty($booking->addressessender->address3))
                {{ $booking->addressessender->address3 }}
            @endif
        </td>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-right" colspan="4">
        	<!-- BUYER'S ORDER No. & DATE -->
        	04 Dec 2020
        </td>
    </tr>

    <tr> 
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- city state country pincode -->
        	 @if(!empty($booking->addressessender->city))
                {{ $booking->addressessender->city }}
            @endif , @if(!empty($booking->addressessender->country->name))
                {{ $booking->addressessender->country->name }}
            @endif ,  @if(!empty($booking->addressessender->postalcode))
                {{ '( '.$booking->addressessender->postalcode.' )' }}
            @endif
        </td>
       
        <td class="tg-0pky  no-border-bottom border-bold-right" colspan="4">
        	<!-- Other reference(s) -->
        	<b>OTHER REFERENCE(S)</b>
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- mobile no -->
        	@if(!empty($booking->addressessender->phonenumber))
                {{ $booking->addressessender->phonenumber }}
            @else
            mo: --
            @endif
        </td>
        
        <td class="tg-0pky no-border-top no-border-bottom border-bold-right" colspan="4">
        	<!-- Other reference(s) -->
        	
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left"colspan="3"><b>CONSIGNEE:</b></td>
        
        <td class="tg-0pky border-bold-right no-border-bottom" colspan="4"><b>BUYER&nbsp;&nbsp;(IF OTHER THAN CONSIGNEE)</b></td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- CONSIGNEE name -->
        	{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }}
        </td>

        <td class="tg-0pky no-border-top no-border-bottom border-bold-right" colspan="4" rowspan="4">
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- CONSIGNEE address line 1 -->
        	 @if(!empty($booking->addressesreceiver->address1))
                {{ $booking->addressesreceiver->address1 }}
            @endif
        </td>
        
        <!-- <td class="tg-0pky no-border-top no-border-bottom" colspan="4"></td> -->
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!-- CONSIGNEE address line 2 or address line 3 -->
        	 @if(!empty($booking->addressesreceiver->address2))
                {{ $booking->addressesreceiver->address2 }}
            @endif ,  @if(!empty($booking->addressesreceiver->address3))
                {{ $booking->addressesreceiver->address3 }}
            @endif
        </td>
     
        <!-- <td class="tg-0pky no-border-top no-border-bottom" colspan="4"></td> -->
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!--CONSIGNEE city state country pincode -->
        	@if(!empty($booking->addressesreceiver->city))
                {{ $booking->addressesreceiver->city }}
            @endif ,   @if(!empty($booking->addressesreceiver->country->name))
                {{ $booking->addressesreceiver->country->name }}
            @endif ,  @if(!empty($booking->addressesreceiver->postalcode))
                {{ '( '.$booking->addressesreceiver->postalcode.' )' }}
            @endif
        </td>
        
        <!-- <td class="tg-0pky no-border-top no-border-bottom" colspan="4"></td> -->
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3">
        	<!--CONSIGNEE mobile no -->
        	 @if(!empty($booking->addressesreceiver->phonenumber))
                {{ $booking->addressesreceiver->phonenumber }}
            @endif
        </td>
        
        <td class="tg-0pky no-border-bottom" colspan="3"><b>COUNTRY OF ORIGIN OF GOODS</b></td>

        <td class="tg-0pky no-border-bottom border-bold-right"><b>DESTINATION COUNTRY</b></td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-left" colspan="3"></td>
        
        <td class="tg-0pky no-border-top" colspan="3">
        	<!-- COUNTRY OF ORIGIN OF GOODS -->
        	UNITED KINGDOM
    	</td>
        <td class="tg-0pky no-border-top border-bold-right">
        	<!-- DESTINATION COUNTRY -->
        	DESTINATION COUNTRY
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left" colspan="2"><b>PRE-CARRIAGE BY</b></td>
        <td class="tg-0pky no-border-bottom" colspan="2"><b>PLACE OF RCPT.</b></td>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-right" colspan="3">
        	<b>TERMS OF DELIVERY & PAYMENT</b>
        </td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-top border-bold-left" colspan="2">
        	<!-- COURIER -->COURIER
        </td>
        <td class="tg-0pky no-border-top" colspan="2">
        	<!-- BY PRE-CARIEER -->BY PRE-CARIEER
        </td>
        <td class="tg-0pky no-border-top border-bold-right" colspan="3" rowspan="2">
        	C I F /&nbsp;&nbsp; C & F /&nbsp;&nbsp; F O B
        </td>
    </tr>
    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left" colspan="2">
        	<b> VESSEL / FLIGHT NO.</b>
        </td>
        <td class="tg-0pky no-border-bottom " colspan="2">
        	<b>PORT OF LOADING</b>
        </td>
    </tr>
    <tr>
        <td class="tg-0pky no-border-top border-bold-left" colspan="2">
        	<!--  VESSEL / FLIGHT NO. -->-
        </td>
        <td class="tg-0pky no-border-top" colspan="2">
        	<!--PORT OF LOADING -->Mumbai ( BOM )
        </td>
        <td class="tg-0pky no-border-bottom border-bold-right" colspan="3">
        	<b>PAYMENT TERMS:</b>
        </td>
    </tr>
     <tr>
        <td class="tg-0pky no-border-bottom border-bold-left" colspan="2">
        	<b>PORT OF DISCHARGE</b>
        </td>
        <td class="tg-0pky no-border-bottom	" colspan="2">
        	<b>FINAL DESTINATION</b>
        </td>
        <td class="tg-0pky no-border-top border-bold-right" colspan="3" rowspan="2">
        	D P / &nbsp;&nbsp; D A /&nbsp;&nbsp; A P /
        </td>
    </tr>
     <tr>
        <td class="tg-0pky no-border-top border-bold-left" colspan="2">
        	<!--  PORT OF DISCHARGE -->-
        </td>
        <td class="tg-0pky no-border-top" style="border-top: none !important;" colspan="2">
        	<!--  FINAL DESTINATION -->-
        </td>
       
    </tr>

    <tr>

        <td class="tg-0pky no-border-top border-bold-left border-bold-right"  colspan="7">&nbsp;</td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left" rowspan="2"><b>Marks & Numbers. <br>Container No.</b></td>
        <td class="tg-0pky no-border-bottom" rowspan="2"><b>No. & kind of <br>Packages</b></td>
        <td class="tg-0pky no-border-bottom" rowspan="2" colspan="2" ><b>DESCRIPTION OF GOODS</b></td>
        <td class="tg-0pky no-border-bottom" rowspan="2"><b>QTY</b></td>
        <td class="tg-0pky no-border-bottom" rowspan="2"><b>RATE</b></td>
        <td class="tg-0pky no-border-bottom border-bold-right" rowspan="2"><b>AMOUNT</b></td>
    </tr>
 
    <tr> 
    </tr>
     @if(count($booking->dimentions) > 0)
        @php
            $subtotal= 0;
        @endphp
        @foreach($booking->dimentions as $key => $dimention)

        <tr>
            <td class="tg-0pky no-border-top no-border-bottom border-bold-left"></td>
            <td class="tg-0pky no-border-top no-border-bottom">{{ $key + 1 }}</td>
            <td class="tg-0pky no-border-top no-border-bottom" colspan="2">{{ $dimention->description }}</td>
            <td class="tg-0pky no-border-top no-border-bottom">1</td>
            <td class="tg-0pky no-border-top no-border-bottom">{{ $dimention->weight }}</td>
            <td class="tg-0pky no-border-top no-border-bottom border-bold-right">@if($booking->service_id != 3) £{{ $dimention->consignment_amt }} @else N/A @endif</td>
        </tr>
        @php
            $subtotal+= $dimention->consignment_amt;
        @endphp
        @endforeach
    @else
        <tr>
            <td colspan="7" class="tg-0pky center"> Data not found.</td>
        </tr>
    @endif
   
    <tr>
        <td class="tg-0pky no-border-bottom no-border-right border-bold-left" colspan="5"><b>AMOUNT CHARGEABLE:</b></td>

        <td class="tg-0pky no-border-left no-border-bottom center"><b>TOTAL</b></td>
        <td class="tg-0pky border-bold" id="number">@if($booking->service_id != 3) £{{$subtotal}} @else N/A @endif</td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-top border-bold-left border-bold-right" rowspan="3" colspan="7"><b>( IN WORDS / CURRENCY )</b></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td class="tg-0pky no-border-bottom border-bold-left" colspan="6"><b>DECLARATION:- </b></td>
        <td class="tg-0pky border-bold-right" style="border-bottom: none;" colspan=""><b>SIGNATURE / DATE / CO STAMP.</b></td>
    </tr>

    <tr>
        <td class="tg-0pky no-border-top no-border-bottom border-bold-left" colspan="6">We declaration that invoice shows the actual price of goods</td>
        <td class="tg-0pky no-border-bottom no-border-top border-bold-right"></td>
    </tr>
    <tr>
        <td class="tg-0pky no-border-top border-bold-left border-bold-bottom" colspan="6">described and that all particularss are true & correct.</td>
        <td class="tg-0pky no-border-top border-bold-right border-bold-bottom" colspan="" style="border-top: none;"></td>
    </tr>

</table>
<script>
    $(document).ready(function()
	{
        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
        var num1 = document.getElementById('number');
        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }
        document.getElementById('words').innerHTML = inWords(num1);
        

    });

</script>

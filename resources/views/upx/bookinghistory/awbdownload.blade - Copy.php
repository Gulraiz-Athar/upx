<!DOCTYPE html>
<html lang="en">
<style>
table {
  border-collapse: collapse;
}
html{
width: 100%;
height: 100%;
padding: 10px;
margin: 0;
}
.textcenter{
  text-align: center;
}
.textleft{
  text-align: left;
  padding-left: 10px;
}
.borderall{
  border: .5pt solid windowtext;
}
.borderleft{
  border-left: .5pt solid windowtext;
}
.borderright{
  border-right: .5pt solid windowtext;
}
.bordertop{
  border-top: .5pt solid windowtext;
}
.borderbottom{
  border-bottom: .5pt solid windowtext;
}
.backgrounddoc{
  background: #D0CECE;
}
.textcenterweb,.textcenterweb div{
  text-align: -webkit-center;
}
table{
  border: .5pt solid windowtext;
}
</style>
  <body>
<table width="100%;">
  <tbody>
   <tr height="20" style="height:15.0pt">
      <td colspan="6" class="textcenter borderall" rowspan="3" height="60" class="xl96" width="384" style="height:45.0pt;
         width:288pt"><img src="{{ url('public/images/logo/logo.png') }}" style="max-width: 150px;" width="100px" height="auto"></td>
      <td colspan="6"  width="384"  class="textcenter borderall" style="border-left:none;width:288pt">{{ $booking->tracking_number }}
      </td>
   </tr>
   <tr height="20"  style="height:15.0pt">
      <td colspan="6" rowspan="2" height="40" align="center" class=" borderall" style="height:30.0pt">
      <img src="data:image/png;base64,{!! $qrcode !!}" alt="barcode"   />
   </td>
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="6" height="20" class="textleft borderall backgrounddoc" style="height:15.0pt">Sender Info</td>
      <td colspan="6"class="textleft borderall backgrounddoc" style="border-left:none">Receiver Info</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="2" height="20" class="textleft borderleft" style="font-size: 10px;">Full Name</td>
      <td colspan="4" class="textleft borderleft" style="font-size: 10px;  ">Email</td>
      <td colspan="2" class="textleft borderleft" style="font-size: 10px;" >Full Name</td>
      <td colspan="4"  class="textleft borderleft" style="font-size: 10px;" >email</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="2" height="20" class="textleft borderall"  style="border-top: none;">{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</td>
      <td colspan="4" class="textleft borderall" style="border-top: none;">{{ $booking->addressessender->email }}</td>
      <td colspan="2" class="textleft borderall" style="border-top: none;">{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }} </td>
      <td colspan="4" class="textleft borderall" style="border-top: none;">{{ $booking->addressesreceiver->email }}</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="6" height="20" class="textleft borderleft" style="font-size: 10px;">Address</td>
      <td colspan="6"  class="textleft borderleft" style="font-size: 10px;">Address</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="6" rowspan="6" height="120" class="textcenter borderall"  style="border-top: none;">@if(!empty($booking->addressessender->address1))
              {{ $booking->addressessender->address1 }} 
            @endif
            @if(!empty($booking->addressessender->address2))
             , {{ $booking->addressessender->address2 }} 
            @endif
            @if(!empty($booking->addressessender->address3))
             , {{ $booking->addressessender->address3 }}
            @endif<br>
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
      <td colspan="6" rowspan="6" class="textcenter borderall"  style="border-top: none;"> @if(!empty($booking->addressesreceiver->address1))
              {{ $booking->addressesreceiver->address1 }} 
            @endif
            @if(!empty($booking->addressesreceiver->address2))
             , {{ $booking->addressesreceiver->address2 }} 
            @endif
            @if(!empty($booking->addressesreceiver->address3))
             , {{ $booking->addressesreceiver->address3 }}
            @endif<br>


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
            @endif</td>
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textleft borderleft" style="font-size: 10px;">company</td>
      <td colspan="3" class="textleft borderleft" style="font-size: 10px;" >Phone</td>
      <td colspan="3" class="textleft borderleft" style="font-size: 10px;" >company</td>
      <td colspan="3" class="textleft borderleft" style="font-size: 10px;" >Phone</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textleft borderall"  style="border-top: none;" > @if(!empty($booking->addressessender->company))
            {{ $booking->addressessender->company }}<br>
            @endif</td>
      <td colspan="3" class="textleft borderall"  style="border-top: none;" >@if(!empty($booking->addressessender->phonenumber))
            {{ $booking->addressessender->phonenumber }}
            @endif</td>
      <td colspan="3" class="textleft borderall"  style="border-top: none;" >@if(!empty($booking->addressesreceiver->company))
            {{ $booking->addressesreceiver->company }}
            @endif</td>
      <td colspan="3" class="textleft borderall"  style="border-top: none;" >@if(!empty($booking->addressesreceiver->phonenumber))
            {{ $booking->addressesreceiver->phonenumber }}<br>
            @endif</td>
   </tr>
   <!-- <tr height="20" style="height:15.0pt">
      <td colspan="12" height="20"  class="textcenter borderall backgrounddoc" style="height:15.0pt">Dimensions in
         inches
      </td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="2" height="20" class="textcenter borderall" style="height:15.0pt">Pieces</td>
      <td colspan="2" class="textcenter borderall" style="border-left:none">length</td>
      <td colspan="2" class="textcenter borderall" style="border-left:none">width</td>
      <td colspan="2" class="textcenter borderall" style="border-left:none">height</td>
      <td colspan="2" class="textcenter borderall" style="border-left:none">Weight</td>
      <td colspan="2" class="textcenter borderall" style="border-left:none">Insure AMT</td>
   </tr>

   @if(!empty($booking->dimentions))
              @foreach($booking->dimentions as $dimention)
              <tr height="20" style="height:15.0pt">
      <td colspan="2" height="20" class="textcenter borderall" >1</td>
      <td colspan="2" class="textcenter borderall" >{{ $dimention->lenth }} Cm</td>
      <td colspan="2" class="textcenter borderall" >{{ $dimention->width }} Cm</td>
      <td colspan="2" class="textcenter borderall" >{{ $dimention->height }} Cm</td>
      <td colspan="2" class="textcenter borderall" >{{ $dimention->weight }} Kg</td>
      <td colspan="2" class="textcenter borderall"> &#163; {{ $dimention->insure_amt ?? '0.00' }} </td>
   </tr>
   @endforeach
   @endif
 -->
   
   <tr height="20" style="height:15.0pt">
      <td colspan="12" rowspan="2" height="40" class="textcenter borderall">Box Number :- {{ $booking->dimentions[0]->box_number }}</td>
   </tr>
   <tr height="20" style="height:15.0pt">
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textcenter borderall" width="192" style="height:15.0pt;width:144pt">Total
         Quantity</td>
      <td colspan="3" class="textcenter borderall" width="192" style="border-left:none;width:144pt">{{ $booking->dimentions_count}}</td>
      <td colspan="6" class="textleft borderleft" style="font-size: 10px; border-right:.5pt solid black;border-left:
         none">Package Info</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textcenter borderall"  style="height:15.0pt">Weight</td>
      <td colspan="3" class="textcenter borderall"  style="border-left:none">{{ max($booking->actual_weight,$booking->volumetric_weight) }} Kg</td>
      <td colspan="6" rowspan="1" class="textcenter borderall"  style="border-right:.5pt solid black;
         border-bottom:.5pt solid black; border-top: none;">{{ $booking->dimentions[0]->description ?? 'N/A' }}</td>
   </tr>
   
  
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textcenter borderall" style="border-right:.5pt solid black;
         height:15.0pt">Box Number </td>
      <td colspan="3" class="textcenter borderall" style="border-right:.5pt solid black;border-left:
         none">{{ $booking->dimentions[0]->box_number }}</td>
    
      <td colspan="6"  class="textleft borderleft"  style="font-size: 10px; border-right:.5pt solid black;border-left:
         none">Package type :</td>
   </tr>
   <tr height="20" style="height:15.0pt">
      <td colspan="3" height="20" class="textcenter borderall"  style="height:15.0pt"><span style="mso-spacerun:yes">&nbsp;</span></td>
      <td colspan="3" class="textcenter borderall" style="border-left:none"></td>
      <td colspan="6" rowspan="1" class="textcenter borderall" style="border-top: none; border-right:.5pt solid black;
         border-bottom:.5pt solid black">{{ $booking->package_type ?? 'N/A' }}</td>
   </tr>
  
    
   <tr height="20" style="height:15.0pt">
      <td colspan="12" height="20" class="textleft borderall"  style="height:15.0pt">Amount in Words
         :<span style="mso-spacerun:yes">{{ $in_word }}</span>
      </td>
   </tr>
  
</tbody>
</table>


  </body>
</html>
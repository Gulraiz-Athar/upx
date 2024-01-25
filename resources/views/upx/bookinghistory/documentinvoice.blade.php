<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    @font-face {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: normal;
        src: url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic');
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;

        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;

        font-size: 12px;
        font-family: Open Sans;
    }

    .borderpoint {
        /*background: #fff;*/
        border-top: 1px solid #5D6975;
    }

    .textcenter {
        text-align: center;

    }

    .textright {
        text-align: right;
    }

    .textleft {
        text-align: left;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 150px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        font-size: 14px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #5D6975;
        white-space: nowrap;
        font-weight: normal;
    }

    table td {
        padding: 10px;
        text-align: right;
    }

    table td.grand {
        border-top: 1px solid #5D6975;;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }

    .main-div {
        border-top: 1px solid #5D6975;
        display: inline-block;
        width: 100%;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 15px;
        height: 30px;
        font-weight: normal;
        margin: 5px 0 20px 0;
    }

    .maintermscondition {
        padding-top: 10px;
    }

    .background-none {
        background: none !important;
    }

    .page-break {
        page-break-after: always;
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

    .bordernone {
        border: none !important;
    }

</style>

<body>
<header class="clearfix">

    <div id="logo">
        @if(!empty($booking->createdby->logo_image))
            <img src="{{ URL::asset('public/images/users_logos/'.$booking->createdby->logo_image) }}"
                 style="max-width: 150px;" height="100px;" width="auto">
        @else
            <h1>Invoice</h1>
        @endif
    </div>

    <div class="main-div">

        <div style="width: 50%; line-height: 25px; float: left;">
            <span style="text-align: left;  font-weight: 600;">Track </span> # {{ $booking->tracking_number }}
        </div>

        <div style="width: 50%; line-height: 25px; text-align: right; float: left;">
            <span style="text-align: right; width: 50%; font-weight: 600;">Date</span>
            {{ date('d M Y', strtotime($booking->created_at)) }}
        </div>

    </div>
    <div style="width: 100%; height: 150px;">
        <div style="width: 35%; float: left; font-size: 14px; word-wrap: break-word;">
            <b>From</b><br> <br>
            @if(!empty($booking->createdby->userdetail->company))
                <strong> Company: </strong> {{ $booking->createdby->userdetail->company }}<br>
            @endif
            <strong>Name: </strong>{{ $booking->createdby->name }} {{ $booking->createdby->lastname }}<br>

            @if(!empty($booking->createdby->userdetail->phone))
                <strong> Phone: </strong> {{ $booking->createdby->userdetail->phone }}<br>
            @endif

            @if(!empty($booking->createdby->email))
                <strong> Email: </strong> {{ $booking->createdby->email }}<br>
            @endif
            <strong> Address: </strong>
            @if(!empty($booking->createdby->userdetail->address1))
                {{ $booking->createdby->userdetail->address1 }}
                @if (strpos($booking->createdby->userdetail->address1, ',') == false)
                    ,
                @endif
            @endif
            @if(!empty($booking->createdby->userdetail->address2))
                {{ $booking->createdby->userdetail->address2 }}
                @if (strpos($booking->createdby->userdetail->address2, ',') == false)
                    ,
                @endif
            @endif
            @if(!empty($booking->createdby->userdetail->address3))
                {{ $booking->createdby->userdetail->address3 }}
                @if (strpos($booking->createdby->userdetail->address3, ',') == false)
                    ,
                @endif

            @endif

            @if(!empty($booking->createdby->userdetail->city))
                {{ $booking->createdby->userdetail->city }},
            @endif
            @if(!empty($booking->createdby->userdetail->state))
                {{ $booking->createdby->userdetail->state }},
            @endif

            @if(!empty($booking->createdby->userdetail->country->name))
                {{ $booking->createdby->userdetail->country->name }}
            @endif<br><br>
        </div>
        <div style="width: 35%; float: left; text-align: left; font-size: 14px; word-wrap: break-word;">
            <b>To</b><br> <br>
            @if(!empty($booking->addressessender->company))
                <strong> Company: </strong> {{ $booking->addressessender->company }} <br>
            @endif
            <strong> Name: </strong>{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}<br>
            @if(!empty($booking->addressessender->phonenumber))
                <strong> Phone: </strong> {{ $booking->addressessender->phonenumber }}<br>
            @endif

            @if(!empty($booking->addressessender->email))
                <strong> Email: </strong> {{ $booking->addressessender->email }}<br>
            @endif
            <strong> Address: </strong>
            @if(!empty($booking->addressessender->address1))
                {{ $booking->addressessender->address1 }},
            @endif
            @if(!empty($booking->addressessender->address2))
                {{ $booking->addressessender->address2 }},
            @endif
            @if(!empty($booking->addressessender->address3))
                {{ $booking->addressessender->address3 }},
            @endif

            @if(!empty($booking->addressessender->city))
                {{ $booking->addressessender->city }},
            @endif
            @if(!empty($booking->addressessender->state))
                {{ $booking->addressessender->state }},
            @endif

            @if(!empty($booking->addressessender->country->name))
                {{ $booking->addressessender->country->name }}
            @endif

            @if(!empty($booking->addressessender->country->name))
                - {{ $booking->addressessender->postalcode }}
            @endif<br><br>

        </div>
        <div style="width: 30%; float: left; text-align: left; font-size: 14px; word-wrap: break-word;">
            <b>Consignee</b> <br> <br>
            @if(!empty($booking->addressessender->company))
                <strong> Company
                    : </strong> @if($booking->addressesreceiver->company != '') {{ $booking->addressesreceiver->company }} @else
                    -- @endif<br>
            @endif
            <strong> Name: </strong>{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }}
            <br>
            @if(!empty($booking->addressesreceiver->phonenumber))
                <strong> Phone: </strong> {{ $booking->addressesreceiver->phonenumber }}<br>
            @endif

            @if(!empty($booking->addressesreceiver->email))
                <strong> Email: </strong> {{ $booking->addressesreceiver->email }}<br>
            @endif
            <strong> Address: </strong>
            @if(!empty($booking->addressesreceiver->address1))
                {{ $booking->addressesreceiver->address1 }},
            @endif
            @if(!empty($booking->addressesreceiver->address2))
                {{ $booking->addressesreceiver->address2 }},
            @endif
            @if(!empty($booking->addressesreceiver->address3))
                {{ $booking->addressesreceiver->address3 }},
            @endif


            @if(!empty($booking->addressesreceiver->city))
                {{ $booking->addressesreceiver->city }},
            @endif
            @if(!empty($booking->addressesreceiver->state))
                {{ $booking->addressesreceiver->state }},
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                {{ $booking->addressesreceiver->country->name }}
            @endif

            @if(!empty($booking->addressesreceiver->country->name))
                - {{ $booking->addressesreceiver->postalcode }}
            @endif<br><br>

        </div>
    </div>

</header>
<main>
    <table>
        <thead>
        </thead>
        <tbody>
        <tr>
            <td colspan="5" class="borderpoint">Service:</td>
            <td class="borderpoint">{{ $booking->service->name  }}</td>
        </tr>


        <tr>
            <td colspan="5" style=" width: 80%" class="">Package Info:</td>
            <td class="">{{ $booking->package_type ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td colspan="5"> Total Quantity:</td>
            <td>{{ $booking->dimentions_count }}</td>
        </tr>
        <tr>
            <td colspan="5">Actual Weight:</td>
            <td>{{ $booking->actual_weight }} Kg</td>
        </tr>

        <tr>
            <td colspan="5"> Handling Price:</td>
            <td>&#163; {{ $booking->handling_price }} </td>
        </tr>
        <tr>
            <td colspan="5"> Package AMT:</td>
            <td>&#163; {{ $booking->upx_price }} </td>
        </tr>

        <tr>
            <td colspan="5" >Sub Total (GBP):</td>
            <td >&#163; {{ $booking->final_upx_price }}</td>
        </tr>
        <tr>
            <td colspan="5">Discount (GBP):</td>
            <td >&#163; - {{ $booking->discount_amt }}</td>
        </tr>
        <tr>
            <td colspan="5">Packaging Charge (GBP):</td>
            <td>&#163; {{ $booking->packing_charge_amt }}</td>
        </tr>
        <tr>
            <td colspan="5">Duties and Taxes (GBP):</td>
            <td>&#163; {{ $booking->tax_amt }}</td>
        </tr>
        <tr>
            <td colspan="5" class="grand total">Total Price (GBP):</td>
            <td class="grand total">&#163;{{ $booking->final_total_upx }}
            </td>
        </tr>
        </tbody>
    </table>
    {{--<div id="notices">
      @if($booking->createdby->role == 'agent')
      <div class="notice">Served by UPX UK LTD.</div>
      @endif
    </div>--}}
</main>
<div class="description-block">
    <span style="font-size: 14px;">
      <b>Track Your Order: </b>{{ url('track/'.$booking->tracking_number) }}
    </span>
    <br><br>
    <span>
        <b>DESCRIPTION OF GOODS: </b>
        @if(!empty($booking->booking_instruction))
            <span style="font-size: 14px;">{{ $booking->booking_instruction }}</span>
        @else
            N/A
        @endif
    </span>
    <br><br>
    <span style="font-size: 14px;">
        <b>Transits time:</b> {{$transit_time}}
    </span>
</div>
<div class="maintermscondition " style=" height: 50px;">
    <div class="textcenter">
        <span style="font-size: 15px;"><b>TERMS AND CONDITIONS</b></span>
        <br>
        <br>
    </div>

    <div style="width: 50%; float: left;">
        <table width="100%" style=" border: none;">
            <tbody>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    Please read Terms and Conditions before signing below:
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    1. Old contents will be valued at $30.00
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    2. New contents maximum will be $50.00
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    3. Refunds will only be given if proof of purchase provided.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    4. The parcel may be disposed of if prohibited items are inserted in the consignment with £100.00
                    imposed on the shipper
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    5. If parcel is not received in Destination and no enquiry is made within 7 days of the complete TT,
                    the parcel may be disposed without notice.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    6. The parcel may be delayed due to Customs clearance and/or adverse weather conditions; and force
                    majeure.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    7. If any threats or abusive language is used, there will be no refund and the consignment will be
                    disposed of without notice.
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="width: 50%; float: right; height: 290px;">
        <table width="100%" style=" border: none;">
            <tbody>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    8. There is no warranty for any war conditions or any Force Majeure.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    9. All goods accepted for carriage must be used item. If item is of valuable nature, you are advised
                    to take adequate reasonable insurance.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    10. All goods must be examined before signing for. No responsibility is accepted thereafter.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    11. Any extra charges incurred, such as customs clearance, is the responsibility of the sender or
                    the consignee.
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    12. All courier services are rendered via third party services; and according to their Terms and
                    Conditions
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    13. We will not be liable to you for any damaged items
                </td>
            </tr>
            <tr height="" style="/* height:15.0pt */">
                <td colspan="12" rowspan="" height="20" class="textleft bordernone borderbottom background-none"
                    style="width: 50%;padding: 5px !important;font-size: 14px;">
                    14. All enquiries must be made prior to sending the parcel.
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
<div style="width: 100%; margin-top: 380px;" >
    <table width="100%">
        <tbody>
        <tr height="" style="/* height:15.0pt */">
            <td colspan="12" rowspan="" height="30" class="textcenter borderall  background-none"
                style="padding: 0px !important;font-size: 12px;">
                HERE BY AUTHORISE MY AGENT TO CLEAR THIS PACKAGE ON OUR BEHALF FOR DELIVERY TO THE CONSIGNEE
            </td>
        </tr>
        <tr height="" style="/* height:15.0pt */">
            <td colspan="12" rowspan="" height="30" class="textcenter borderall borderbottom background-none"
                style="padding: 0px !important;font-size: 12px;">
                I DECLARE THAT ALL THE INFORMATION CONTAINED IN THIS INVOICE IS CORRECT AND TRUE
            </td>
        </tr>
        <tr>
            <td  colspan="12" class=" background-none bordernone">
            </td>
        </tr>
        <tr>
            <td  colspan="12" class=" background-none bordernone">
            </td>
        </tr>
        <tr>
            <td  colspan="12" class=" background-none bordernone">
            </td>
        </tr>
        <tr>
            <td colspan="2"  class="xl111 " >
                SENDER SIGNATURE:
            </td>
            <td colspan="3" class="borderbottom"></td>
            <td colspan="2" class="xl111">AGENT SIGNATURE:</td>
            <td colspan="4" class="borderbottom">&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>

<footer>
    {{-- Invoice was created on a computer and is valid without the signature and seal.--}}
</footer>
</body>
</html>

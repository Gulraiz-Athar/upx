@if(!empty($bookings))

    <style type="text/css">

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .walletcheck.container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .walletcheck.container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #777;
        }

        /* On mouse-over, add a grey background color */
        .walletcheck.container:hover input ~ .walletcheck.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .walletcheck.container input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .walletcheck.container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .walletcheck.container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 7px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>


    <div class="row">


        <div class="col-md-12">
            <div class="form-group">
                <label>Payment Detail</label>
                <table style="width: 100%;">
                    <tr>
                        <th>Track #</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                    @if(!empty($bookings))
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->tracking_number}}</td>
                                <td>
                                    @if($booking->payment_status == 'unpaid')
                                        <b style="color: red">{{ $booking->payment_status}}</b>
                                    @else
                                        <b style="color: green;">{{ $booking->payment_status}}</b>
                                    @endif

                                </td>
                                {{-- <td>&#163;  {{ $booking->final_agent_price}}</td>--}}
                                <td>&#163; {{ $booking->final_total_agent}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="2" style="text-align: right;"><b>Total (GBP):</b></td>
                        <td><b>&#163; {{ $total }}</b></td>

                    </tr>
                </table>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12 ">
            @if(auth()->user()->wallet_amount > 0)
                <div class="panel panel-default credit-card-box" style="float: left; width: 100%;">
                    <div class="panel-heading display-table" style="float: left; width: 100%;">


                        <div style="width:6%; float: left;">
                            <img src="{{ url('public/images/wallet.png') }}" width="30px" height="auto">
                        </div>
                        <div style="width:88%; float: left;">
                            <b style="line-height: 10px; float: left; width: 100%;">UPX Wallet</b>
                            <span>Current Balance: <b> &#163; {{ auth()->user()->wallet_amount  }}</b></span>
                        </div>
                        <div style="width:5%; float: left;">
                            <label class="walletcheck container">
                                <input type="checkbox" class="checkboxcheckornot" data-bookingids="{{ $ids }}">
                                <span class="checkmark"></span>
                            </label>
                        </div>


                    </div>
                </div>
                <a style="cursor: pointer; display: none;" class="btn btn-primary payfromwallet">Pay Now (&#163; <span
                        class="amounttopay">{{ $total }}</span> ) <span class="spinner"> </span></a>
            @endif
            <div class="panel panel-default credit-card-box stripepaymentmodule" style="float: left; width: 100%;">
                <div class="panel-heading display-table">
                    <div class="row display-tr">
                        <div class="display-td">
                            <img class="img-responsive pull-right"
                                 src="{{ URL::asset('public/images/card_accept.png') }}">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">


                    <div class="panel-body">


                        <form role="form" action="" method="post" class="require-validation payment-form"
                              data-cc-on-file="false"
                              data-stripe-publishable-key="{{ config('constants.STRIPE_KEY') }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="bookingid" class="bookingid" value="{{ $ids }}">

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' placeholder="Name on Card" type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input
                                        autocomplete='off' pattern="\d*" x-autocompletetype="cc-number"
                                        placeholder="Card number" class='form-control card-number'
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                           size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary ">Pay Now (&#163; <span
                                            class="amounttopay">{{ $total }}</span> ) <span class="spinner"> </span>
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
            <span style="color: red">Please select at least one booking invoice to change status.</span>
@endif

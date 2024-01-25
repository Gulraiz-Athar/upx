<div class="box box-primary">
    <ul class="list-group mb-3 custom-list-group">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Total Quantity</h6>

            </div>
            <span class="text-muted">{{ $totalquantity }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Actual Weight</h6>
            </div>
            <span class="text-muted">{{ $actualweight }}Kg</span>
        </li>

        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Package AMT</h6>

            </div>
            <strong>&#163; {{ round($upxprice,2) }}  </strong>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Handling Price</h6>

            </div>
            <strong> &#163; {{ $handling_price }}  </strong>
        </li>
        @if($error)
            <li class="list-group-item d-flex justify-content-between">
                <h6 class="my-0" style="color: red">{{ $msg }}</h6>
            </li>
        @else
            <li class="list-group-item sub-padding d-flex justify-content-between">
                <div>
                    <span>Total (GBP) : </span>
                    <strong>&#163;
                        {{--@if(Auth::user()->role == 'agent')
                            {{ round($finalagentprice,2) }}
                        @else
                            {{ round($finalprice,2) }}
                        @endif--}}
                        {{ round($finalprice,2) }}
                    </strong>

                </div>
            </li>
            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                <div class="row">
                    <span class="col-lg-3 col-form-label">Discount</span>
                    <div class="col-lg-6">
                        <input type="text" name="discount_amt" id="discount_amt" class="form-control" value="0">
                    </div>
                </div>
            </li>
            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                <div class="row">
                    <span class="col-lg-7 col-form-label">Packaging Charge</span>
                    <div class="col-lg-5">
                        <input type="text" name="packing_charge_amt" class="form-control packing_charge_amt"
                               id="packing_charge_amt" value="0">
                    </div>
                </div>
            </li>
            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                <div class="row">
                    <span class="col-lg-7 col-form-label">Duties and Taxes </span>
                    <div class="col-lg-5">
                        <input type="text" name="tax_amt" class="form-control tax_amt" id="tax_amt" value="0">
                    </div>
                </div>
            </li>
            <li class="list-group-item sub-padding d-flex justify-content-between">
                <div>
                    <span>Sub Total (GBP) : </span>
                    <strong>&#163; <span id="subtotal">{{ round($finalprice,2) }}</span> </strong>
                </div>
            </li>
            <li class="list-group-item sub-padding d-flex justify-content-between">
                @if($book == 0)
                    <span
                        style="color: red">You have exceeded the booking limit  &#163; {{ auth()->user()->booking_limit }}</span>
                @else
                    <button class="btn btn-primary bookingbutton" type="submit">
                        <i class="fa fa-bookmark" aria-hidden="true"></i> Book <span class="bookingspin"></span>
                    </button>
                @endif

            </li>
        @endif


    </ul>
</div>
@php
    /*if(Auth::user()->role == 'agent'){
        $finalprice = round($finalagentprice,2);
    }*/
@endphp
<script type="text/javascript">
    /******************* calculate discout value **********************/
    var finalprice = "{{ round($finalprice,2) }}";
    var default_value = 0;

    $('body').on('keyup', '#discount_amt,#packing_charge_amt,#tax_amt', function () {
        if ($.isNumeric($(this).val()) || $(this).val().length === 0) {
            var discount_amt = $("#discount_amt").val();
            var packing_charge_amt = $("#packing_charge_amt").val();
            var tax_amt = $("#tax_amt").val();
            calculate_subtotal(discount_amt, packing_charge_amt, tax_amt);
        }
    });

    function calculate_subtotal(discount_amt, packing_charge_amt, tax_amt) {
        if (discount_amt == '') {
            discount_amt = 0;
        }
        if (packing_charge_amt == '') {
            packing_charge_amt = 0;
        }
        if (tax_amt == '') {
            tax_amt = 0;
        }

        var subtotal = (parseFloat(finalprice - discount_amt) + parseFloat(packing_charge_amt) + parseFloat(tax_amt)).toFixed(2);
        if (parseFloat(discount_amt) > parseFloat(finalprice)) {
            var discount_amt = $("#discount_amt").val();
            var $th = $("#discount_amt");
            $th.val(discount_amt.replace(discount_amt, ''));
            subtotal = finalprice;
        }
        $('#subtotal').text(subtotal);
    }
</script>

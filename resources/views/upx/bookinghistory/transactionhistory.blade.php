<style type="text/css">
    .transaction_details td, .transaction_details th {
        border: 1px solid #000 !important;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <label>Admin detail: </label>
        <table class="table transaction_details">

            <tr>
                <th>Actual Weight:</th>
                <td>{{ $booking->actual_weight }} Kg</td>
            </tr>
            @if($booking->service_id != 3)
                <tr>
                    <th>Volumetric Weight:</th>
                    <td>{{ $booking->volumetric_weight }} Kg</td>
                </tr>
            @endif
            <tr>
                <th>Price (1Kg):</th>
                <td>&#163 {{ $booking->price_per_kg_upx }}</td>
            </tr>
        </table>
        <table class="table transaction_details">

            @if($booking->service_id != 3)
                <tr>
                    <th>Insure AMT:</th>
                    <td>&#163; {{ $booking->final_insure_amt }} </td>
                </tr>
            @endif
            <tr>
                <th>Handling Price:</th>
                <td>&#163; {{ $booking->handling_price }} </td>
            </tr>
            <tr>
                <th>Package AMT:</th>
                <td>&#163; {{ $booking->upx_price }}</td>
            </tr>
            <tr>
                <th>Total (GBP):</th>
                <th>&#163; {{ $booking->final_upx_price }}</th>
            </tr>
            <tr>
                <th>Discount (GBP):</th>
                <td>&#163; - {{ $booking->discount_amt }}</td>
            </tr>
            <tr>
                <th>Packaging Charge (GBP):</th>
                <td>&#163; {{ $booking->packing_charge_amt }}</td>
            </tr>
            <tr>
                <th>Duties and Taxes (GBP):</th>
                <td>&#163; {{ $booking->tax_amt }}</td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Final Price (GBP):
                    &#163;{{ $booking->final_total_upx }}</th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <label>Agent detail: </label>
        <table class="table transaction_details">

            <tr>
                <th>Actual Weight:</th>
                <td>{{ $booking->actual_weight }} Kg</td>
            </tr>
            @if($booking->service_id != 3)
                <tr>
                    <th>Volumetric Weight:</th>
                    <td>{{ $booking->volumetric_weight }} Kg</td>
                </tr>
            @endif
            <tr>
                <th>Price (1Kg):</th>
                <td>&#163; {{ $booking->price_per_kg_agent }}</td>
            </tr>
        </table>
        <table class="table transaction_details">
            @if($booking->service_id != 3)
                <tr>
                    <th>Insure AMT:</th>
                    <td>&#163; {{ $booking->final_insure_amt }} </td>
                </tr>
            @endif
             <tr>
                <th>Handling Price:</th>
                <td>&#163; {{ $booking->handling_price_agent }}</td>
            </tr>
            <tr>
                <th>Package AMT:</th>
                <td>&#163; {{ $booking->agent_price }}</td>
            </tr>
            <tr>
                <th>Total (GBP):</th>
                <th>&#163; {{ $booking->final_agent_price }}</th>

            </tr>
            <tr>
                <th>Discount (GBP):</th>
                <td>&#163; - {{ $booking->discount_amt }}</td>
            </tr>
            <tr>
                <th>Packaging Charge (GBP):</th>
                <td>&#163; {{ $booking->packing_charge_amt }}</td>
            </tr>
            <tr>
                <th>Duties and Taxes (GBP):</th>
                <td>&#163; {{ $booking->tax_amt }}</td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Final Price (GBP):
                    &#163;{{ $booking->final_total_agent }}</th>
            </tr>
        </table>
    </div>
</div>

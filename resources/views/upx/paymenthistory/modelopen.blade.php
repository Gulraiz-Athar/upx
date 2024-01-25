<style type="text/css">
  .transaction_details td,.transaction_details th{
    border: 1px solid #000!important;
  }
</style>

<section class="invoice" style="margin: 0px;">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">

            <img src="{{ URL::asset('public/images/logo/logo.png') }}" width="100px" height="auto">
            <small class="pull-right"><b style="color: #000;">Date:</b> {{ date('d M Y',strtotime($payment->created_at)) }}
              <br>
              <b style="color: #000;">Transaction id:</b> @if($payment->transation_id != "-") {{ $payment->transation_id }} @else N/A @endif
            </small>

          </h2>
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->

      <!-- Table row -->

      <!-- /.row -->

      <div class="row">


  <div class="col-md-6">
      <label>Payment detail: </label>
      <table class="table transaction_details">


              <tr>
                <th>Payment By: </th>
                <td>{{ $payment->agent->name }} {{ $payment->agent->lastname }}</td>
              </tr>
              <tr>
                <th>Payment From Wallet: </th>
                <td>&#163 {{ $payment->wallet_amout }}</td>
              </tr>

               <tr>
                <th>Payment From Card:</th>
                <td>&#163; {{ $payment->stripe_amount }} </td>
              </tr>
              <tr>
                <th>Final Amount:</th>
                <td>&#163; {{ $payment->final_amount }} </td>
              </tr>


            </table>
  </div>
  <div class="col-md-6">
      <label>Tracking detail: </label>
      <table class="table transaction_details">

              <tr>
                <th>Track #</th>
                <th>Amount</th>
              </tr>
              @if(!empty($payment->paymentbooking))
                @foreach($payment->paymentbooking as $pay)
                <tr>
                  <th>{{  $pay->tracking_number }}</th>
                  {{--<th>&#163; {{  $pay->final_agent_price }}</th>--}}
                  <th>&#163; {{  $pay->final_total_agent }}</th>
                </tr>
                @endforeach
              @endif
              <tr>
              </tr>
              <tr>
                <th colspan="2" style="text-align: right;">Total (GBP): &#163; {{ $payment->final_amount }}</th>

              </tr>
            </table>
  </div>
</div>
      <!-- /.row -->


    </section>

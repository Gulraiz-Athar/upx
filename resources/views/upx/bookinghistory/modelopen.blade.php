@if(!empty($bookings))

<style type="text/css">

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
<form class="form-some-up form-block formsubmit" role="form" action="{{ route('booking.updatepaymentstatus') }}" method="post" >
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="bookingid" value="{{ $ids }}">

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
      {{--<td>&#163;  {{ $booking->final_agent_price}}</td>--}}
      <td>&#163;  {{ $booking->final_total_agent}}</td>
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

  <div class="col-md-12">
      <div class="form-group">
        <label>Payment Status</label>
         <select class="form-control" name="payment_status">
          <option value="paid">Paid</option>
          <option value="unpaid">Unpaid</option>
        </select>
      </div>
  </div>


</div>

<div class="form-group">
   <button type="submit" class="btn btn-primary">Update <span class="spinner"> </span></button>
</div>
</form>

@else
<span style="color: red">Please select at least one booking invoice to change status.</span>
@endif

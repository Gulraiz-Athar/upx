@if(!empty($bookings))

<style type="text/css">

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
<form class="form-some-up form-block formsubmittrack" role="form" action="{{ route('booking.updatetrackstatus') }}" method="post" >
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="bookingid" value="{{ $ids }}">

<div class="row">
  

   <div class="col-md-12">
      <div class="form-group">
        <label>Payment Detail</label>
        <table style="width: 100%;">
  <tr>
    <th>Track #</th>
    <th>Current Status</th>
   
  </tr>
   @if(!empty($bookings))
   @foreach($bookings as $booking)
   <tr>
      <td>{{ $booking->tracking_number}}</td>
      <td>{{ $booking->logstatus->status}}</td>
      
    </tr>
   @endforeach
   @endif
   
</table>
      </div>
  </div>



<div class="col-md-12">
   <div class="form-group">
      <label>Status : </label>
      <select  class="form-control" name="current_status">
         @if(!empty($logstatus))
         @foreach($logstatus as $log)
         <option value="{{ $log->id }}">{{ $log->status }}</option>
         @endforeach
         @endif
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
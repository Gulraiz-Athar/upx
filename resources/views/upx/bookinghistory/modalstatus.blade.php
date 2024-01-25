<form class="form-some-up form-block bookingchangestatus " action="{{route('booking.changestatus')}}" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" name="logid" value="{{$logid}}">

    <input type="hidden" name="id" value="{{$booking->id}}">



    <div class="row">

        <div class="col-md-4">

            <div class="form-group">

                <label>Booking status</label>

                <select name="service_id" class="form-control service_id" id="service_id" required disabled     >

                    {{-- <option value="">Select Service</option>--}}

                     @if(!empty($logid))

                         @foreach($logs as $log)

                             <option value="{{$log->id}}" @if($logid == $log->id) selected @endif >{{$log->status}}</option>

                         @endforeach

                     @endif

                 </select>

            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group">

                <label>Service</label>

                <select name="service" class="form-control" id="service" required>

                    {{-- <option value="">Select Service</option>--}}

                     @if(!empty($services))

                         @foreach($services as $service)

                             <option value="{{$service->id}}" @if($service->id == $booking->service_id) selected @endif>{{$service->name}}</option>

                         @endforeach

                     @endif

                 </select>

            </div>

        </div>

        @if ($logid == 5)

            <div class="col-md-4">

                <div class="form-group">

                    <label>Forwarded to</label>

                    <select name="forwarded" class="form-control" id="forwarded" required>

                        <option value="">Select Service</option>

                        <option value="Shree Anjani Courier" @if($booking->forwarded_to == "Shree Anjani Courier") selected @endif>Shree Anjani Courier </option>

                        <option value="Blue Dart" @if($booking->forwarded_to == "Blue Dart") selected @endif>Blue Dart </option>

                        <option value="Shree Nandan Courier" @if($booking->forwarded_to == "Shree Nandan Courier") selected @endif>Shree Nandan Courier </option>

                        <option value="Other" @if($booking->forwarded_to == "Other") selected @endif>Other </option>

                    </select>

                </div>

            </div>

             <div class="forwarded_tracking_num_div" style="@if($booking->forwarded_to) display: block @else display: none @endif">
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label>Forwarded company Tracking number</label>
                        <input class="form-control forwarded_tracking_num" type="text" name="forwarded_tracking_num" id="forwarded_tracking_num" required value="@if($booking->forwarded_to_tracking_num) {{$booking->forwarded_to_tracking_num}} @endif">
                    </div>
                </div>
            </div>

            

        @endif

        <div class="col-md-4">

            <div class="form-group">

                <label>Tracking number </label>

                <input class="form-control tracking_num" type="text" name="tracking_num" id="tracking_num" value=" @if($booking->tracking_number) {{$booking->tracking_number}} @endif ">

               

            </div>

        </div>

        <div class="col-md-12">

            <div class="form-group">

                <label>Notes </label>

                <textarea class=" form-control " name="booking_instruction" id="booking_instruction">@if($booking->booking_instruction) {{$booking->booking_instruction}} @endif</textarea>

               

            </div>

        </div>

    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary submitstatusbutton">Update <span class="spinner"> </span></button>

    </div>

</form>
@if(count($bookings) > 0)

    <style type="text/css">

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

    </style>
    <form class="form-some-up form-block invoiceformsubmit" role="form" action="{{ route('bookinghistory.sendinvoicemail') }}"
          method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="bookingid" value="{{ $ids }}">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Invoice Detail</label>
                    <table style="width: 100%;">
                        <tr>
                            <th>Track #</th>
                            <th>Agent Name</th>
                            <th>Agent Email</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                        @if(!empty($bookings))
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->tracking_number}}</td>
                                    <td>{{ $booking->createdby->name.' '.$booking->createdby->lastname }}</td>
                                    <td>{{ $booking->createdby->email }}</td>
                                    <td>
                                        @if($booking->payment_status == 'unpaid')
                                            <b style="color: red">{{ $booking->payment_status}}</b>
                                        @else
                                            <b style="color: green;">{{ $booking->payment_status}}</b>
                                        @endif

                                    </td>
                                    {{--<td>&#163;  {{ $booking->final_agent_price}}</td>--}}
                                    <td>&#163; {{ $booking->final_total_agent}}</td>
                                </tr>
                            @endforeach
                        @endif
                       {{-- <tr>
                            <td colspan="2" style="text-align: right;"><b>Total (GBP) :</b></td>
                            <td><b>&#163; {{ $total }}</b></td>

                        </tr>--}}
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">Subject<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea placeholder="subject" class="form-control" name="subject" id="subject" required></textarea>
            </div>
        </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
                <textarea placeholder="Body" class="form-control" name="body" id="body"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary btn-sm btnsendinvoice" type="submit">Send <span class="invoicespinner"></span></button>
                <button class="btn btn-white btn-sm" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>


@else
    <span style="color: red">Please select at least one booking invoice to change status.</span>
@endif

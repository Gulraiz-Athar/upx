@extends('layouts.app')
@section('content')
@section('pageTitle', 'Invoice')

<style type="text/css">
    .price_detail th, .price_detail td {
        text-align: right !important;
    }

    .price_detail th {
        width: 60% !important;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <a href="javascript:history.back()" class="pull-left btn btn-circle btn-default btn-sm back"
               style="margin-bottom: 15px;">
                Back
            </a>
        </div>
    </div>
    <!-- Main content -->
    <section class="invoice" style="margin: 0px;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">

                    <img src="{{ URL::asset('public/images/logo/logo.png') }}" style="max-height: 150px;" width="100px"
                         height="auto">
                    <small class="pull-right"><b style="color: #000;">Date
                            :</b> {{ date('d M Y',strtotime($booking->created_at)) }}
                        <br>
                        <b style="color: #000;">Tracking #</b> {{ $booking->tracking_number }}
                        <br>

                        <b style="color: #000;">Booked By
                            :</b> {{ $booking->createdby->name }} {{ $booking->createdby->lastname }}
                    </small>

                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                @include('upx.bookinghistory.senderaddress')
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $booking->addressesreceiver->name }} {{ $booking->addressesreceiver->lastname }}</strong><br>
                    @if(!empty($booking->addressesreceiver->address1))
                        {{ $booking->addressesreceiver->address1 }},
                    @endif
                    @if(!empty($booking->addressesreceiver->address2))
                         {{ $booking->addressesreceiver->address2 }},
                    @endif
                    @if(!empty($booking->addressesreceiver->address3))
                         {{ $booking->addressesreceiver->address3 }}
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
                    @endif<br>


                    @if(!empty($booking->addressesreceiver->phonenumber))
                        Phone : {{ $booking->addressesreceiver->phonenumber }}<br>
                    @endif

                    @if(!empty($booking->addressesreceiver->email))
                        Email : {{ $booking->addressesreceiver->email }}<br>
                    @endif

                    @if(!empty($booking->addressesreceiver->company))
                        Company : {{ $booking->addressesreceiver->company }}<br>
                    @endif
                </address>
            </div>
            <!-- /.col -->

            <div class="col-sm-4 invoice-col">
                Return
                @include('upx.bookinghistory.returnaddress')

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Box Number</th>
                        <th>Qty</th>
                       {{-- <th>Length</th>
                        <th>Width</th>
                        <th>Height</th>--}}
                        <th>Weight</th>
                       {{-- <th>Consignment AMT</th>
                        <th>Insure AMT</th>--}}
                        <th>Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($booking->dimentions))
                        @foreach($booking->dimentions as $dimention)
                            <tr>
                                <td>{{ $dimention->box_number }}</td>
                                <td>1</td>
                                <td>{{ $dimention->weight }}Kg</td>
                                <td>{{ $dimention->description }}</td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-4">
                <p class="lead"><i class="fa fa-info-circle" aria-hidden="true"></i> Package Info:</p>
                <p><b>Package type: </b><br> {{ $booking->package_type ?? 'N/A' }}</p>
                <hr>
                <p><b>Package Instruction: </b><br> {{ $booking->booking_instruction ?? 'N/A' }}</p>


            </div>
            <div class="col-xs-4">
                <p class="lead"><i class="fa fa-info-circle" aria-hidden="true"></i> Booking Logs:</p>
                <p><b>Tracking number: </b> {{ $booking->tracking_number }} </p>
                @if(!empty($booking->logs))
                    @foreach($booking->logs as $logs)
                        <p> Your order is {{ $logs->status }}
                            at {{ date('d M Y H:i A',strtotime($logs->created_at))}}</p>
                    @endforeach
                @endif


            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <p class="lead"><i class="fa fa-money" aria-hidden="true"></i> Price Detail: </p>

                <div class="table-responsive">
                    <table class="table price_detail">
                        <tr>
                            <th style="width:50%">Package type:</th>
                            <td>{{ $booking->dimentions_count }}</td>
                        </tr>
                        <tr>
                            <th>Actual Weight:</th>
                            <td>{{ $booking->actual_weight }} Kg</td>
                        </tr>

                        <tr>
                            <th>Handling Price:</th>
                            <td>&#163; {{ $booking->handling_price }} </td>
                        </tr>
                        <tr>
                            <th>Package AMT:</th>
                            <td>&#163;
                                {{ $booking->upx_price }}

                            </td>
                        </tr>
                        <tr>
                            <th>Total (GBP):</th>

                            <td>&#163;{{ $booking->final_upx_price }}</td>
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
                            <th>Final Price (GBP):</th>
                            <td>&#163;{{ $booking->final_total_upx }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </section>
</section>
<div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ID document upload </h4>
            </div>
            <div class="modal-body">
                <form class="form-some-up form-block modalformsubmit" role="form" action="{{ route('bookinghistory.uploaddocimage') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="bookingid" id="bookingid" value="">
                    <div class="form-group">
                        <label>Upload Document<span class="text-danger">*</span></label>
                        <input type="file" name="id_doc_image" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit <span class="spinner"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
    <script type="text/javascript">
        $('#myModal').on('show.bs.modal', function (event) {
            var bookingaddid = $('.bookingid').attr('data-id');
            $("#bookingid").val(bookingaddid);
        });
        $( ".modalformsubmit" ).validate({
            rules: {
                id_doc_image: {
                    required:true,
                    accept: "image/jpg,image/jpeg,image/png,pdf"
                },
            },
            messages: {
                id_doc_image: {
                    accept: 'Uploaded file is not a valid image. Only JPG, PNG and PDF files are allowed.'
                },
            }
        });
        $('body').on('submit','.modalformsubmit',function(e){
            e.preventDefault();
            $.ajax({
                url : $(this).attr('action'),
                data: new FormData(this),
                type: 'POST',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    $('.submitbutton').prop( "disabled", true );

                },
                success:function(data){
                    $('.submitbutton').prop( "disabled", false );
                    PNotify.removeAll();
                    if(data.status == 400){
                        $('.spinner').html('');
                        new PNotify({
                            title: 'Oh No!',
                            text: data.msg,
                            type:'error'
                        });
                    }
                    if(data.status == 200){
                        $('.spinner').html('');
                        $('.myModal').modal('hide');
                        new PNotify({
                            title: 'success!',
                            text: data.msg,
                            type:'success'
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1500 );
                    }

                },

            });
        });
    </script>
@endpush
@endsection

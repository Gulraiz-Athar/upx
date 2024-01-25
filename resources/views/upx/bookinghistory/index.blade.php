@extends('layouts.app')

@section('content')

@section('pageTitle', 'Booking History')





@include('upx.includes.topbar')

<style>

    .disabled {

        pointer-events: none !important;

        cursor: default !important;

    }

</style>

@push('links')

    <style type="text/css">

        .country_tag {

            background-color: #3c8dbc;

            font-weight: 100;

            font-size: 14px;

            margin-right: 5px;

            color: #fff;

            padding: 5px 15px;

        }



        .switch {

            position: relative;

            display: inline-block;

            width: 53px;

            height: 28px;

        }



        .switch input {

            opacity: 0;

            width: 0;

            height: 0;

        }



        .slider {

            position: absolute;

            cursor: pointer;

            top: 0;

            left: 0;

            right: 0;

            bottom: 0;

            background-color: #ccc;

            -webkit-transition: .4s;

            transition: .4s;

        }



        .slider:before {

            position: absolute;

            content: "";

            height: 23px;

            width: 23px;

            left: 2px;

            bottom: 3px;

            background-color: white;

            -webkit-transition: .4s;

            transition: .4s;

        }



        input:checked + .slider {

            background-color: #2196F3;

        }



        input:focus + .slider {

            box-shadow: 0 0 1px #2196F3;

        }



        input:checked + .slider:before {

            -webkit-transform: translateX(26px);

            -ms-transform: translateX(26px);

            transform: translateX(26px);

        }





        /* Rounded sliders */



        .slider.round {

            border-radius: 34px;

        }



        .slider.round:before {

            border-radius: 50%;

        }



        .payment_status_search {

            width: 90%;

            border: 1px solid #aaa;

            line-height: 26px;

            background-color: #fff;

            border-radius: 4px;

            height: 26px;

            color: #999;

            padding: 0px;

        }



        button.pricesticky.btn.btn-warning {

            position: fixed;

            right: 0;

            z-index: 1049;

            top: 50%;

        }

        button.invoicesticky.btn.btn-warning {

            position: fixed;

            right: 0;

            z-index: 1049;

            top: 43%;

        }

    </style>

@endpush



<button class="pricesticky btn btn-warning openform" data-toggle="modal" data-target=".modal_edit_list"

        style="display: none;">Total (GBP) : &#163; <span class="changeprice"></span></button>

<button class="invoicesticky btn btn-warning openinvoiceform" data-toggle="modal" data-target=".modal_invoice"

        style="display: none;"> <i class="fa fa-envelope"></i> Send Invoice</button>

<!-- Main content -->

<section class="content">



    <div class="box">

        <div class="box-body">

            <div class="row">

                <div class="col-md-12">

                    <div class="row">

                        <form class="form-some-up form-block" role="form" action="{{ route('booking.download') }}"

                              method="post">

                            {{ csrf_field() }}

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label>Booking Status</label>

                                    <select class="logmultiple" name="statusid[]" multiple="multiple"

                                            data-placeholder="Select status"

                                            style="width: 90%;">

                                        @if(!empty($logstatus))

                                            @foreach($logstatus as $log)

                                                <option value="{{ $log->id }}">{{ $log->status }}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label>Select Country</label>

                                    <select class="countrymultiple" name="countries[]" multiple="multiple"

                                            data-placeholder="Select country"

                                            style="width: 90%;">

                                        @if(!empty($receivecountries))

                                            @foreach($receivecountries as $country)

                                                <option value="{{ $country->id }}">{{ $country->name }}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label>Select Agent</label>

                                    <select class="usertype" data-placeholder="Select user" name="usertype[]"

                                            multiple="multiple" style="width: 90%;">

                                        @if(!empty($users))

                                            @foreach($users as $user)

                                                <option

                                                    value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                </div>

                            </div>



                            <div class="col-md-3">

                                <div class="form-group">

                                    <label>Booking Date</label>

                                    <div class="input-group">

                                        <button type="button" class="btn btn-default pull-right daterange"

                                                id="daterange-btn">

                                            <input type="hidden" name="startdate" class="startdate">

                                            <input type="hidden" name="enddate" class="enddate">

                                            <span>

                            <i class="fa fa-calendar"></i> Date range picker

                          </span>

                                            <i class="fa fa-caret-down"></i>

                                        </button>

                                    </div>



                                </div>

                            </div>

                            <div class="col-md-3">

                                <div class="form-group">

                                    <label>Payment Status</label>

                                    <select class="form-control payment_status_search" style="width: 100%;"

                                            name="payment_status">

                                        <option value="">Select status</option>

                                        <option value="paid">Paid</option>

                                        <option value="unpaid">Unpaid</option>

                                    </select>

                                </div>

                            </div>

                            <div class="col-md-3 pull-right" style="margin-top: 15px;">

                                <div class="form-group">

                                    <button class="btn btn-primary searchdata"><i class="fa fa-search"

                                                                                  aria-hidden="true"></i> Search <span

                                            class="spinner"></span></button>



                                    <button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-download"

                                                                                                aria-hidden="true"></i>

                                        Excel

                                    </button>

                                    <a href="{{ route('bookinghistory.index') }}" class="btn btn-danger"><i

                                            class="fa fa-refresh" aria-hidden="true"></i> Reset <span

                                            class="spinner"></span></a>

                                </div>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <a href="{{ route('booking.index')}}" class="btn btn-success btn-sm pull-right"

               class="pull-right btn btn-circle btn-default btn-sm" style="margin-bottom: 15px;">

                <i class="fa fa-plus"></i> Add

            </a>

            <a class="btn btn-warning btn-sm pull-right openform" data-toggle="modal" data-target=".modal_edit_list"

               style="margin:0px 10px 15px 0px;">

                <i class="fa fa-refresh" aria-hidden="true"></i> Change Payment Status

            </a>

            <a class="pull-right btn btn-circle btn-info btn-sm openstatusform" data-toggle="modal"

               data-target=".statusform" style="margin:0px 10px 15px 0px;">

                <i class="fa fa-refresh" aria-hidden="true"></i> Change Booking Status

            </a>



        </div>



        <div class="col-xs-12">

        @include('upx.includes.message')

        <!-- /.box -->

            <div class="box">

                <!-- /.box-header -->

                <div class="box-body table-responsive">

                    <table id="agents" class="table table-bordered table-striped">

                        <thead>

                        <tr>

                            <th>#</th>



                            <th>Payment Status</th>

                            <th>Payable Amount</th>

                            <th>Quantity<br>Weight<br>Quoted</th>

                            <th>Tracking Number</th>

                            <th>Booking Date</th>

                            <th>Booked By</th>

                            <th>Receiver<br>Country</th>

                            <th>Status</th>

                            @if(auth()->user()->role == 'admin')

                                <th>Booking Status</th>

                            @endif



                            <th>Invoices</th>



                            <th>Action</th>

                        </tr>

                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                </div>

                <!-- /.box-body -->

            </div>

            <!-- /.box -->

        </div>

        <!-- /.col -->

    </div>

    <!-- /.row -->

</section>

<!-- /.content -->



<div class="modal fade modal_edit_list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Change Payment Status</h4>

            </div>

            <div class="modal-body paymentstatusmodel">

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>



<div class="modal fade transationhistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Transaction Details</h4>

            </div>

            <div class="modal-body transationmodel">

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>



<div class="modal fade statusform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Change Booking Status</h4>

            </div>

            <div class="modal-body statusformmodel">

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

{{--send invoice modal--}}

<div class="modal fade modal_invoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Send Invoice</h4>

            </div>

            <div class="modal-body invoicemodel">

            </div>

        </div>

    </div>

</div>

{{--send invoice modal--}}



{{--send invoice modal--}}

{{-- data-toggle="modal" data-target="#booking_status" --}}

<div class="modal fade booking_status" id="booking_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Booking Status</h4>

            </div>

            <div class="modal-body bookingstatus">

            </div>

        </div>

    </div>

</div>

{{--send invoice modal--}}

@push('links')

    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">

    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">



@endpush



@push('script')

    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css"

          rel="stylesheet"/>

    <script type="text/javascript"

            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>

    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>

    <script src="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script>

        $(function () {

            $('body').on('click', '.awbdownloadclass', function (event) {

                var awb = $(this).data('box_id');

                var awbid = $(this).data('awbid');

                $.each(awb.split('|'), function (index, value) {

                    if (value != null && value != '') {

                        event.preventDefault();

                        event.stopPropagation();

                        window.open("{{ url('upx/bookinghistory/awb/view') }}" + '/' + awbid + '/' + value, '_blank');

                        //window.open("{{ url('upx/bookinghistory/awb/download') }}"+'/'+awbid+'/'+value, '_blank');

                        //window.open("{{ url('upx/bookinghistory/awb/download') }}"+'/'+awbid+'/'+value, "_self");

                    }



                });

            });



            $('#daterange-btn').daterangepicker({

                    ranges: {

                        'Today': [moment(), moment()],

                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],

                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],

                        'This Month': [moment().startOf('month'), moment().endOf('month')],

                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

                    },

                    startDate: moment().subtract(29, 'days'),

                    endDate: moment()

                },

                function (start, end) {

                    $('.startdate').val(start.format('MMMM D, YYYY'));

                    $('.enddate').val(end.format('MMMM D, YYYY'));

                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))

                }

            )

            $('.logmultiple').multipleSelect();

            $('.usertype').multipleSelect();

            $('.agentmultiple').multipleSelect();

            $('.countrymultiple').multipleSelect();





            var table = $('#agents').DataTable({

                responsive: true,

                processing: true,

                serverSide: true,

                order: [],

                columnDefs: [{

                    'targets': 0,

                    "render": function(data, type, row, meta){

                        if(row['pstatus'] != 'canceled' && row['paymentstatus'] != 'paid'){

                            return "<input type='checkbox' class='dt-checkboxes' value='"+row['id']+"'>";

                        }

                        return "<input type='checkbox'  class='dt-checkboxes' value='"+row['id']+"'>";

                    },

                    'checkboxes': {

                        'selectRow': true

                    },



                }],

                select: {

                    'style': 'multi'

                },

                ajax: {

                    'url': "{{ route('bookinghistory.getall') }}",

                    'type': 'POST',

                    'data': function (d) {

                        d._token = "{{ csrf_token() }}";

                        d.statusid = $('.logmultiple').val();

                        d.usertype = $('.usertype').val();

                        d.countries = $('.countrymultiple').val();

                        d.startdate = $('#daterange-btn').data('daterangepicker').startDate._d;

                        d.enddate = $('#daterange-btn').data('daterangepicker').endDate._d;

                        d.payment_status = $('.payment_status_search').val();

                    },

                },

                columns: [

                    {data: 'id', "orderable": false},

                    {data: 'payment_status'},

                    {data: 'payable_amount'},

                    {data: 'quantity_weight_quote'},

                    {data: 'tracking_number'},

                    {data: 'booking_date'},

                    {data: 'booked_by'},

                    {data: 'receiver_country'},

                    {data: 'status'},

                        @if(auth()->user()->role == 'admin') {

                        data: 'booking_status', "orderable": false

                    },

                        @endif

                    {

                        data: 'invoice_download', "orderable": false

                    },

                    {data: 'action', "orderable": false},

                ]

            });





            $('.searchdata').click(function (event) {

                event.preventDefault();

                $("#agents").DataTable().ajax.reload()

            });



            $('body').on('change', '.dt-checkboxes,.dt-checkboxes-select-all', function () {

                var rows_selected = table.column(0).checkboxes.selected();



                var bookingid = [];

                i = 0;

                $.each(rows_selected, function (index, rowId) {



                    // Create a hidden element

                    bookingid[i++] = rowId;



                });

                console.log(bookingid);

                if (bookingid.length === 0) {

                    $('.pricesticky').css('display', 'none');

                    $('.invoicesticky').css('display', 'none');

                } else {

                    $.ajax({

                        url: "{{ route('booking.getstickyprice')}}",

                        type: 'POST',

                        async:false,

                        headers: {

                            'X-CSRF-TOKEN': '{{ csrf_token() }}'

                        },

                        data: {

                            bookingid: bookingid

                        },



                        success: function (data) {

                            if (data.status == 200) {

                                $('.invoicesticky').css('display', 'block');

                                $('.pricesticky').css('display', 'block');

                                $('.changeprice').text(data.result);

                            } else {

                                $('.invoicesticky').css('display', 'none');

                                $('.pricesticky').css('display', 'none');

                            }





                        },



                    });

                }

            });





            $('body').on('click', '.openform', function () {



                var id = $(this).data('wight_id');

                var rows_selected = table.column(0).checkboxes.selected();

                var bookingid = [];

                i = 0;

                $.each(rows_selected, function (index, rowId) {

                    // Create a hidden element

                    bookingid[i++] = rowId;



                });





                $.ajax({

                    url: "{{ route('booking.changemultiplestatus')}}",

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        wight_id: id,

                        bookingid: bookingid

                    },

                    beforeSend: function () {

                        $('.paymentstatusmodel').html('<h5>loading..</h5>')

                    },

                    success: function (data) {

                        $('.paymentstatusmodel').html(data);

                        $('.select2').select2({});



                    },



                });

            });



            $('body').on('click', '.openstatusform', function () {



                var rows_selected = table.column(0).checkboxes.selected();

                var bookingid = [];

                i = 0;

                $.each(rows_selected, function (index, rowId) {

                    // Create a hidden element

                    bookingid[i++] = rowId;



                });





                $.ajax({

                    url: "{{ route('booking.changemultipletrack')}}",

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        bookingid: bookingid

                    },

                    beforeSend: function () {

                        $('.statusformmodel').html('<h5>loading..</h5>')

                    },

                    success: function (data) {

                        $('.statusformmodel').html(data);





                    },



                });

            });





            $('body').on('click', '.checkhistory', function () {



                var id = $(this).data('id');





                $.ajax({

                    url: "{{ route('bookinghistory.checkhistory')}}",

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        bookingid: id

                    },

                    beforeSend: function () {

                        $('.transationmodel').html('<h5>loading..</h5>')

                    },

                    success: function (data) {

                        $('.transationmodel').html(data);





                    },



                });

            });





            $('body').on('click', '.changenotification', function () {

                if ($(this).prop("checked") == true) {

                    var notify = 1;

                } else if ($(this).prop("checked") == false) {

                    var notify = 0;

                }

                var bookingid = $(this).data('bookingid');

                $.ajax({

                    url: '{{ route("booking.notifystatus") }}',

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        bookingid: bookingid,

                        notify: notify

                    },



                    error: function () {

                        new PNotify({

                            title: 'Oh No!',

                            text: 'Something went wrong!',

                            type: 'error'

                        });

                    }

                });

            });





            $('body').on('submit', '.formsubmit', function (e) {

                e.preventDefault();

                $.ajax({

                    url: $(this).attr('action'),

                    data: new FormData(this),

                    type: 'POST',

                    contentType: false,

                    cache: false,

                    processData: false,

                    beforeSend: function () {

                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')

                    },

                    success: function (data) {

                        PNotify.removeAll();

                        $('.pricesticky').css('display', 'none');

                        $('.invoicesticky').css('display', 'none');

                        if (data.status == 400) {

                            $('.spinner').html('');

                            new PNotify({

                                title: 'Oh No!',

                                text: data.msg,

                                type: 'error'

                            });

                        }

                        if (data.status == 200) {

                            $('.spinner').html('');

                            $('.modal_edit_list').modal('hide');

                            $('#agents').DataTable().ajax.reload();

                            table.column(0).checkboxes.deselect();

                            $('.pricesticky').css('display', 'none');

                            $('.invoicesticky').css('display', 'none');

                            new PNotify({

                                title: 'Success!',

                                text: data.msg,

                                type: 'success'

                            });

                        }



                    },



                });

            });



            $('body').on('submit', '.formsubmittrack', function (e) {

                e.preventDefault();

                $.ajax({

                    url: $(this).attr('action'),

                    data: new FormData(this),

                    type: 'POST',

                    contentType: false,

                    cache: false,

                    processData: false,

                    beforeSend: function () {

                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')

                    },

                    success: function (data) {

                        PNotify.removeAll();

                        $('.pricesticky').css('display', 'none');

                        $('.invoicesticky').css('display', 'none');

                        if (data.status == 400) {

                            $('.spinner').html('');

                            new PNotify({

                                title: 'Oh No!',

                                text: data.msg,

                                type: 'error'

                            });

                        }

                        if (data.status == 200) {

                            $('.spinner').html('');

                            $('.statusform').modal('hide');

                            $('#agents').DataTable().ajax.reload();

                            table.column(0).checkboxes.deselect();

                            $('.pricesticky').css('display', 'none');

                            $('.invoicesticky').css('display', 'none');

                            new PNotify({

                                title: 'Success!',

                                text: data.msg,

                                type: 'success'

                            });

                        }



                    },



                });

            });



            $('body').on('change', '.changestatus', function () {

                var id = $(this).data('id');

                var value = $(this).val();

                $('.booking_status').modal('show'); 

                $.ajax({

                    url: '{{ route("booking.changestatusmodal") }}',

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                            id: id,

                            logid: value

                    },

                    beforeSend: function () {

                        $('.transationmodel').html('<h5>loading..</h5>')

                    },

                    success: function (data) {

                        $('.bookingstatus').html(data);

                    },



                });

            });



            $('body').on('submit', '.bookingchangestatus', function (e) {

                e.preventDefault();

                $.ajax({

                   

                    url: $(this).attr('action'),

                    data: new FormData(this),

                    type: 'POST',

                    contentType: false,

                    cache: false,

                    processData: false,

                    beforeSend: function() {

                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>');

                        $('.submitstatusbutton').prop("disabled", true);

                    },

                    success: function (data) {

                        $('.submitstatusbutton').prop("disabled", false);

                        $('.spinner').html('');



                        if (data.status == 400) {

                            new PNotify({

                            title: 'Oh No!',

                            text: data.msg,

                            type: 'error'

                        });

                        }

                        if (data.status == 200) {

                            new PNotify({

                            title: 'Success!',

                            text: data.msg,

                            type: 'success'

                        });

                            // toastr.success(data.msg, 'Success!');

                            $('.booking_status').modal('hide'); 

                        }

                        if (data.status == 401) {

                            new PNotify({

                            title: 'Oh No!',

                            text: data.msg,

                            type: 'error'

                        });

                            // toastr.success(data.msg, 'Success!');

                            $('.booking_status').modal('hide'); 

                        }

                    },

                    error: function () {

                        new PNotify({

                            title: 'Oh No!',

                            text: 'Something went wrong!',

                            type: 'error'

                        });

                    }

                });

            });



            $('body').on('click', '.delete_weight', function () {

                var id = $(this).data('id');

                (new PNotify({

                    title: 'Confirmation Needed',

                    text: 'Are you sure?',

                    icon: 'glyphicon glyphicon-question-sign',

                    hide: false,

                    confirm: {

                        confirm: true

                    },

                    buttons: {

                        closer: false,

                        sticker: false

                    },

                    history: {

                        history: false

                    },

                    addclass: 'stack-modal',

                    stack: {

                        'dir1': 'down',

                        'dir2': 'right',

                        'modal': true

                    }

                })).get().on('pnotify.confirm', function () {

                    $.ajax({

                        url: '{{ url("upx/weight") }}/' + id,

                        type: 'DELETE',

                        headers: {

                            'X-CSRF-TOKEN': '{{ csrf_token() }}'

                        },

                        beforeSend: function () {

                        },

                        success: function (data) {

                            if (data.status == 400) {

                                new PNotify({

                                    title: 'Oh No!',

                                    text: data.msg,

                                    type: 'error'

                                });

                            }

                            if (data.status == 200) {

                                $("#agents").DataTable().ajax.reload();

                            }



                        },

                        error: function () {

                            new PNotify({

                                title: 'Oh No!',

                                text: 'Something went wrong!',

                                type: 'error'

                            });

                        }

                    });

                });

            });



        });

        /*canacel and reopen booking*/

        $('body').on('click', '.cancel_booking', function () {

            var id = $(this).data('id');

            var status = $(this).data('status');

            (new PNotify({

                title: 'Are you sure?',

                text: 'You want to ' + status + ' booking ?',

                icon: 'glyphicon glyphicon-question-sign',

                hide: false,

                confirm: {

                    confirm: true

                },

                buttons: {

                    closer: false,

                    sticker: false

                },

                history: {

                    history: false

                },

                addclass: 'stack-modal',

                stack: {

                    'dir1': 'down',

                    'dir2': 'right',

                    'modal': true

                }

            })).get().on('pnotify.confirm', function () {

                $.ajax({

                    url: '{{ route("bookinghistory.cancel") }}',

                    type: 'post',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        id: id,

                        status: status



                    },

                    beforeSend: function () {

                    },

                    success: function (data) {

                        if (data.status == 400) {

                            new PNotify({

                                title: 'Oh No!',

                                text: data.msg,

                                type: 'error'

                            });

                        }

                        if (data.status == 200) {

                            new PNotify({

                                title: 'Success!',

                                text: data.msg,

                                type: 'success'

                            });

                            $("#agents").DataTable().ajax.reload();

                        }



                    },

                    error: function () {

                        new PNotify({

                            title: 'Oh No!',

                            text: 'Something went wrong!',

                            type: 'error'

                        });

                    }

                });

            });

        });



        /*Copy booking*/

        $('body').on('click', '.copy_booking', function () {

            var id = $(this).data('id');

            (new PNotify({

                title: 'Are you sure?',

                text: 'You want to copy booking ?',

                icon: 'glyphicon glyphicon-question-sign',

                hide: false,

                confirm: {

                    confirm: true

                },

                buttons: {

                    closer: false,

                    sticker: false

                },

                history: {

                    history: false

                },

                addclass: 'stack-modal',

                stack: {

                    'dir1': 'down',

                    'dir2': 'right',

                    'modal': true

                }

            })).get().on('pnotify.confirm', function () {

                $.ajax({

                    url: '{{ route("bookingpro.copy") }}',

                    type: 'post',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {

                        id: id,

                    },

                    beforeSend: function () {

                    },

                    success: function (data) {

                        if (data.status == 400) {

                            new PNotify({

                                title: 'Oh No!',

                                text: data.msg,

                                type: 'error'

                            });

                        }

                        if (data.status == 200) {

                            new PNotify({

                                title: 'Success!',

                                text: data.msg,

                                type: 'success'

                            });

                            $("#agents").DataTable().ajax.reload();

                        }

                    },

                    error: function () {

                        new PNotify({

                            title: 'Oh No!',

                            text: 'Something went wrong!',

                            type: 'error'

                        });

                    }

                });

            });

        });



        /*send invoice modal*/

        $('body').on('click', '.openinvoiceform', function () {

            var table = $('#agents').DataTable();

           // var id = $(this).data('wight_id');

            var rows_selected = table.column(0).checkboxes.selected();

            var bookingid = [];

            i = 0;

            $.each(rows_selected, function (index, rowId) {

                // Create a hidden element

                bookingid[i++] = rowId;

            });

            $.ajax({

                url: "{{ route('bookinghistory.sendinvoicemodel')}}",

                type: 'POST',

                headers: {

                    'X-CSRF-TOKEN': '{{ csrf_token() }}'

                },

                data: {

                   // wight_id: id,

                    bookingid: bookingid

                },

                beforeSend: function () {

                    $('.invoicemodel').html('<h5>loading..</h5>')

                },

                success: function (data) {

                    $('.invoicemodel').html(data);

                    $('.select2').select2({});



                },



            });

        });



        /*click on send button to form submit*/

        $('body').on('submit', '.invoiceformsubmit', function (e) {

            e.preventDefault();

            $.ajax({

                url: $(this).attr('action'),

                data: new FormData(this),

                type: 'POST',

                contentType: false,

                cache: false,

                processData: false,

                beforeSend: function () {

                    $('.btnsendinvoice').prop('disabled', true);

                    $('.invoicespinner').html('<i class="fa fa-spinner fa-spin"></i>')

                },

                success: function (data) {

                    $('.btnsendinvoice').prop('disabled', false);

                    PNotify.removeAll();

                    if (data.status == 400) {

                        $('.spinner').html('');

                        new PNotify({

                            title: 'Oh No!',

                            text: data.msg,

                            type: 'error'

                        });

                    }

                    if (data.status == 200) {



                        $('.invoicespinner').html('');

                        $('.modal_invoice').modal('hide');

                        $('#agents').DataTable().ajax.reload();

                        table.column(0).checkboxes.deselect();

                        $('.invoicesticky').css('display', 'none');

                        $('.pricesticky').css('display', 'none');

                        $.notify(data.msg, 'success');

                    }



                },



            });

        });



        /*pro forma invoice download*/

        $('body').on('click', '.proformadownload', function (event) {

            var box_ids = $(this).data('box_id');

            var bookingid = $(this).data('bookingid');

            $.each(box_ids.split('|'), function (index, value) {

                if (value != null && value != '') {

                    event.preventDefault();

                    event.stopPropagation();

                    window.open("{{ url('upx/bookinghistory/proforma/view') }}" + '/' + bookingid + '/' + value, '_blank');

                }



            });

        });
        
        $('body').on('change', '#forwarded', function(e){
            var data = $( "#forwarded option:selected" ).text();
                $(".forwarded_tracking_num_div").css("display","none");
            if (data != '' && data !='Select Service') {
                $(".forwarded_tracking_num_div").css("display","block");
            }
        });

    </script>

@endpush

@endsection


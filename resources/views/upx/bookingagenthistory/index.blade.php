@extends('layouts.app')
@section('content')
@section('pageTitle', 'Booking History')


@include('upx.includes.topbar')

@push('links')
    <style type="text/css">
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

        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;

        }

    </style>
@endpush

<button class="pricesticky btn btn-warning openform" data-toggle="modal" data-target=".modal_edit_list"
        style="display: none;">Total (GBP) : &#163; <span class="changeprice"></span></button>
<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Current Status </label>
                                <select class="logmultiple" multiple="multiple" data-placeholder="Select status"
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
                                <label>Payment Status </label>
                                <select class="form-control payment_status_search">
                                    <option value="">Select status</option>
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Booking Date </label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-default pull-right daterange"
                                            id="daterange-btn">
                          <span>
                            <i class="fa fa-calendar"></i> Date range picker
                          </span>
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 20px;">
                            <div class="form-group pull-right">
                                <button class="btn btn-primary searchdata"><i class="fa fa-search"
                                                                              aria-hidden="true"></i> Search <span
                                        class="spinner"></span></button>
                                <a href="{{ url('upx/agentbookinghistory') }}" class="btn btn-danger"><i
                                        class="fa fa-refresh" aria-hidden="true"></i> Reset <span
                                        class="spinner"></span></a>
                            </div>
                        </div>
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


        </div>

        <div class="col-xs-12">

            <!-- /.box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="agents" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Payment Status</th>
                            <th>Payable Amount</th>
                            <th>Package Type</th>
                            <th>Quantity<br>Weight<br>Quoted</th>
                            <th>Tracking Number</th>
                            <th>Booking Date</th>
                            <th>Current Status</th>
                            <th>Status</th>
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
                <h4 class="modal-title" id="myModalLabel">Pay to Upx</h4>
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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
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
            $('body').on('click', '.checkboxcheckornot', function () {
                var bookingids = $(this).data('bookingids');
                if ($(this).prop("checked") == true) {
                    var checkbox = 1;
                } else if ($(this).prop("checked") == false) {
                    var checkbox = 0;
                }

                $.ajax({
                    url: "{{ route('agentbookinghistory.balancefromwallet') }}",
                    data: {bookingid: bookingids, checkbox: checkbox},
                    async:false,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (data) {

                        if (data.stripe == 0) {
                            $('.stripepaymentmodule').css('display', 'none');
                            $('.payfromwallet').css('display', 'inline-block');
                            $('.amounttopay').text(data.payable_amount);
                        }
                        if (data.stripe == 1) {
                            $('.stripepaymentmodule').css('display', 'block');
                            $('.payfromwallet').css('display', 'none');
                            $('.amounttopay').text(data.payable_amount);
                        }
                    },

                });
            });
            /************************************ Payment Module *************************************/

            var $form = $(".require-validation");
            $('body').on('submit', '.require-validation', function (e) {

                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /************************************ Payment Module *************************************/

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    if ($('.checkboxcheckornot').is(":checked")) {
                        var checkbox = 1;
                    } else {
                        var checkbox = 0;
                    }
                    var formData = new FormData();
                    formData.append('bookingid', $('.bookingid').val());
                    formData.append('checkbox', checkbox);
                    formData.append("token", token);
                    $.ajax({
                        url: "{{ route('agentbookinghistory.payamount') }}",
                        data: formData,
                        type: 'POST',
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                        },
                        success: function (data) {
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
                                table.column(0).checkboxes.deselect();
                                $('.spinner').html('');
                                $('.modal_edit_list').modal('hide');

                                $('.pricesticky').css('display', 'none');
                                new PNotify({
                                    title: 'success!',
                                    text: data.msg,
                                    type: 'success'
                                });
                                window.setTimeout(function () {
                                    window.location.href = "{{ url('upx/agentbookinghistory') }}"
                                }, 3000)
                                //$('#agents').DataTable().ajax.reload();

                            }

                        },

                    });
                }
            }


            $('body').on('click', '.payfromwallet', function () {
                $.ajax({
                    url: "{{ route('agentbookinghistory.walletpayment') }}",
                    data: {bookingid: $('.bookingid').val()},
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                    },
                    success: function (data) {
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
                            table.column(0).checkboxes.deselect();
                            $('.spinner').html('');
                            $('.modal_edit_list').modal('hide');


                            $('.pricesticky').css('display', 'none');
                            new PNotify({
                                title: 'success!',
                                text: data.msg,
                                type: 'success'
                            });
                            window.setTimeout(function () {
                                window.location.href = "{{ url('upx/agentbookinghistory') }}"
                            }, 3000)


                        }

                    },

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
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )
            $('.logmultiple').multipleSelect();
            $('.usertype').multipleSelect();
            $('.agentmultiple').multipleSelect();

            var table = $('#agents').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                orderable: false,
                order: [],
                columnDefs: [{
                    'targets': 0,
                    "render": function(data, type, row, meta){
                        if(row['pstatus'] != 'canceled' && row['paymentstatus'] != 'paid'){
                            return "<input type='checkbox' class='dt-checkboxes' value='"+row['id']+"'>";
                        }
                        return "";
                    },
                    'checkboxes': {
                        'selectRow': true
                    },

                }],
                select: {
                    'style': 'multi'
                },

                ajax: {
                    'url': "{{ route('agentbook.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                        d.statusid = $('.logmultiple').val();
                        d.usertype = $('.usertype').val();
                        d.startdate = $('#daterange-btn').data('daterangepicker').startDate._d;
                        d.enddate = $('#daterange-btn').data('daterangepicker').endDate._d;
                        d.payment_status = $('.payment_status_search').val();
                    },
                },
                initComplete: function (settings) {
                    var api = this.api();

                    api.cells(
                        api.rows(function (idx, data, node) {
                            console.log(data['payment_status']);
                            return (data['payment_status'] == '<b style="color:green">paid</b>') ? true : false;
                        }).indexes(),
                        0
                    ).checkboxes.disable();
                },
                columns: [
                    {data: 'id', "orderable": false},
                    {data: 'payment_status'},
                    {data: 'payable_amount'},
                    {data: 'package_type'},
                    {data: 'quantity_weight_quote'},
                    {data: 'tracking_number'},
                    {data: 'booking_date'},
                    {data: 'current_status'},
                    {data: 'status'},
                    {data: 'invoice_download', "orderable": false},
                    {data: 'action', "orderable": false},
                ]
            });

            $('.searchdata').click(function () {
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
                if (bookingid.length === 0) {
                    $('.pricesticky').css('display', 'none');
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
                                $('.pricesticky').css('display', 'block');
                                $('.changeprice').text(data.result);
                            } else {
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
                    url: "{{ route('agentbookinghistory.changemultiplestatus')}}",
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

    </script>
@endpush
@endsection

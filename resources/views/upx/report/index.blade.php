@extends('layouts.app')
@section('content')
@section('pageTitle', 'Booking')

    @include('upx.includes.topbar')
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <form class="form-some-up form-block" role="form" action="{{ route('report.reportprint') }}"
                                method="get">
                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-default pull-right daterange"
                                                id="daterange-btn">
                                                <input type="hidden" name="startdate" class="startdate">
                                                <input type="hidden" name="enddate" class="enddate">
                                                <span> <i class="fa fa-calendar"></i> Date range picker</span>
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3 pull-right" style="margin-top: 15px;">
                                    <div class="form-group">
                                        <button class="btn btn-primary searchdata"><i class="fa fa-search"
                                                aria-hidden="true"></i> Search <span class="spinner"></span></button>

                                        <button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-download"
                                                aria-hidden="true"></i>
                                            print
                                        </button>
                                        <a href="{{ route('report.index') }}" class="btn btn-danger"><i
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
        <div class="box">
            <div class="box-body table-responsive">
                <table id="report" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>

                        {{-- <th>Consignee</th> --}}
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>Address 3</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Post Code</th>
                        <th>Country</th>
                        <th>Telephone</th>
                        <th>Pieces</th>
                        <th>Weight</th>
                        <th>Invoice Value</th>
                        <th>Bag<br>No</th>
                        <th>Description</th>
                        {{-- <th>Currency</th> --}}
                        <th>KYC</th>
                        <th>KYC No</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @push('links')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
        <style>
            .show-calendar {
                right: auto !important;
                left: 280px !important;
            }

            .daterangepicker.opensleft:after {
                right: auto;
                left: 9.5px !important;
            }

            .daterangepicker.opensleft:before {
                /* left: 329px; */
                left: 9px !important;
            }

            .daterangepicker.opensleft::before {
                right: auto;
            }

        </style>
    @endpush

    @push('script')
        <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script>
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                            'month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('.startdate').val(start.format('MMMM D, YYYY'));
                    $('.enddate').val(end.format('MMMM D, YYYY'));
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            );

            var table = $('#report').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                buttons: [
                         'print'
                    ],
                ajax: {
                    'url': "{{ route('report.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                        d.startdate = $('#daterange-btn').data('daterangepicker').startDate._d;
                        d.enddate = $('#daterange-btn').data('daterangepicker').endDate._d;
                    },
                },
                columns: [
                    // {data: 'id', "orderable": false},
                    {data: 'DT_RowIndex', "orderable": false},
                    // {data: 'Consignee'},
                    {data: 'address_1'},
                    {data: 'address_2'},
                    {data: 'address_3'},
                    {data: 'city'},
                    {data: 'state'},
                    {data: 'post_code'},
                    {data: 'country'},
                    {data: 'telephone'},
                    {data: 'pieces'},
                    {data: 'weight'},
                    {data: 'invoice_Value'},
                    {data: 'bag_no'},
                    {data: 'description'},
                    // {data: 'Currency'},
                    {data: 'kyc'},
                    {data: 'kyc_no'},
                    
                ]
            });

            $('.searchdata').click(function (event) {
                event.preventDefault();
                $("#report").DataTable().ajax.reload()
            });


        </script>

    @endpush
@endsection

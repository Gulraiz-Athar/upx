@extends('layouts.app')
@section('content')
@section('pageTitle', 'Zones')


@include('upx.includes.topbar')

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

        .select-dropdown {
            width: 90%;
            border: 1px solid #aaa;
            line-height: 26px;
            background-color: #fff;
            border-radius: 4px;
            height: 26px;
            color: #999;
            padding: 0px;
        }

    </style>
@endpush
<!-- Main content -->

<section class="content">
    <!------------------------Start Filter section ------------------------>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Services</label>
                                <select class="form-control  zone_service_id" style="width: 100%;"
                                        name="payment_status">
                                    <option value="">Select Service</option>
                                    @if(!empty($services))
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pull-left" style="margin-top: 24px;">
                            <div class="form-group">
                                <button class="btn btn-primary searchdata"><i class="fa fa-search"
                                                                              aria-hidden="true"></i> Search <span
                                        class="spinner"></span></button>
                                <a href="{{ route('zone.index') }}" class="btn btn-danger"><i class="fa fa-refresh"
                                                                                              aria-hidden="true"></i>
                                    Reset <span class="spinner"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------End Filter section ------------------------>
    <div class="row">
        <div class="col-md-12">
            <a href="#" data-zoneid="" data-toggle="modal" data-target=".modal_edit_list"
               class="btn btn-success btn-sm pull-right openform" class="pull-right btn btn-circle btn-default btn-sm"
               style="margin-bottom: 15px;">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
        <div class="col-xs-12">
        @include('upx.includes.message')
        <!-- /.box -->

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="agents" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Zones Name</th>
                            <th>Service</th>
                            <th>Transit time</th>
                            <th>Country</th>
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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title engineertitle" id="myModalLabel"></h4>
            </div>


            <div class="modal-body">


            </div>


        </div>
    </div>

</div>

@push('script')
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
    <script>
        $('.logmultiple').multipleSelect();
        $(function () {
            /**************************** datatable *******************/
            $('#agents').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    'url': "{{ route('zone.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                        d.service_id = $('.zone_service_id').val();
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', "orderable": false},
                    {data: 'name'},
                    {data: 'service'},
                    {data: 'transit_time'},
                    {data: 'country'},
                    {data: 'action', "orderable": false},
                ]
            });
            /**************************** datatable *******************/
            /********************* reset datatable *********************/
            $('.searchdata').click(function (event) {
                event.preventDefault();
                $("#agents").DataTable().ajax.reload()
            });
            /*********************** reset datatable *******************/
            $('body').on('click', '.openform', function () {
                var id = $(this).data('zoneid');
                if (id == '') {
                    $('.engineertitle').text('{{ __('Add Zone') }}');
                } else {
                    $('.engineertitle').text('{{ __('Edit Zone') }}');
                }
                $.ajax({
                    url: "{{ route('zone.getmodel')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {zoneid: id},
                    beforeSend: function () {
                        $('.modal-body').html('<h5>loading..</h5>')
                    },
                    success: function (data) {
                        $('.modal-body').html(data);
                        $('.select2').select2({});

                        $(".formsubmit").validate({
                            rules: {
                                name: {maxlength: 50},
                                country_id:{
                                    required :true,
                                }
                            },
                            errorPlacement: function (error, element) {
                                var elem = $(element);
                                if (element.hasClass('select2') && element.next('.select2-container').length) {
                                    error.insertAfter(element.next('.select2-container'));
                                }else {
                                    error.insertAfter(element);
                                }
                            }

                        });
                    },
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
                            $.notify(data.msg, 'success');
                        }
                    },
                });
            });

            $('body').on('click', '.delete_zone', function () {
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
                        url: '{{ url("upx/zone") }}/' + id,
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
        })

        $('body').on('change', '#service_id', function () {
            var service_id = $(this).val();
            $.ajax({
                url: "{{ route('zone.getcountries')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    service_id: service_id
                },
                success: function (data) {
                    console.log(data);
                    $("#country_id").html(data);
                    // $('.select2').select2('val', ["value1", "value2", "value3"]);
                },
            });
        });
    </script>
@endpush
@endsection

@extends('layouts.app')

@section('content')

@section('pageTitle', 'Address Books')





@include('upx.includes.topbar')

<!-- Main content -->



<section class="content">

    <div class="row">



        <form action="{{ route('addressbook.download') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-primary btn-circle pull-right" style="margin-left: 4px;"><i class="fa fa-download" aria-hidden="true"></i>
                    Excel
                </button>
                
                <a href="#" data-addressbookid="" data-toggle="modal" data-target=".modal_edit_list"
                class="btn btn-success btn-sm pull-right openform" class="pull-right btn btn-circle btn-default btn-sm"
                style="margin-bottom: 15px;">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
    </form>

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

                            <th>Name</th>

                            <th>Company</th>

                            <th>Address1</th>

                            <th>City</th>

                            <th>State</th>

                            <th>Zip</th>

                            <th>Country</th>

                            <th>Phone</th>

                            @if(auth()->user()->role == 'admin')

                                <th>Type</th>

                                <th>Added By</th>

                            @endif



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

    <div class="modal-dialog " role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>

                <h4 class="modal-title engineertitle" id="myModalLabel">Address Details</h4>

            </div>



            <div class="modal-body">





            </div>



        </div>

    </div>



</div>

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>

    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript"

            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>

    <script>

        $(function () {

            $('#agents').DataTable({



                processing: true,

                serverSide: true,

                order: [],

                ajax: {

                    'url': "{{ route('addressbook.getall') }}",

                    'type': 'POST',

                    'data': function (d) {

                        d._token = "{{ csrf_token() }}";



                    },

                },

                columns: [

                    {data: 'DT_RowIndex', "orderable": false},

                    {data: 'name'},

                    {data: 'company'},

                    {data: 'address1'},

                    {data: 'city'},

                    {data: 'state'},

                    {data: 'postalcode'},

                    {data: 'country'},

                    {data: 'phone_number'},

                        @if(auth()->user()->role == 'admin')

                    {

                        data: 'type'

                    },

                    {data: 'added_by'},

                        @endif

                    {

                        data: 'action', "orderable": false

                    },



                ]

            });



            $('body').on('click', '.openform', function () {

                var id = $(this).data('addressbookid');

                if (id == '') {

                    $('.engineertitle').text('{{ __('Add  Address Book') }}');

                } else {

                    $('.engineertitle').text('{{ __('Edit Address Book') }}');

                }

                $.ajax({

                    url: "{{ route('addressbook.getmodel')}}",

                    type: 'POST',

                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                    data: {addressbookid: id},

                    beforeSend: function () {

                        $('.modal-body').html('<h5>loading..</h5>')

                    },

                    success: function (data) {

                        $('.modal-body').html(data);

                        $(".formsubmit").validate({

                            rules: {

                                name: {maxlength: 50},

                                company: {maxlength: 50},

                                address1: {maxlength: 50},

                                address2: {maxlength: 50},

                                address3: {maxlength: 50},

                                city: {maxlength: 50},

                                state: {maxlength: 50},

                                postalcode: {maxlength: 50},

                                email: {maxlength: 50},

                                phone_number: {maxlength: 50},

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

                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>');

                        $('.submitbutton').prop("disabled", true);

                    },

                    success: function (data) {

                        $('.submitbutton').prop("disabled", false);

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



                        }



                    },



                });

            });



            $('body').on('click', '.delete_address', function () {

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

                        url: '{{ url("upx/addressbook") }}/' + id,

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

    </script>

@endpush

@endsection


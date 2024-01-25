@extends('layouts.app')
@section('content')
@section('pageTitle', 'Agent')


@include('upx.includes.topbar')
<style type="text/css">
    .error {
        color: red;
        font-weight: 100;
    }

    .logo_preview {
        max-width: 300px;
    }

    .image_preview {
        max-width: 300px;
    }
</style>
<!-- Main content -->

<section class="content">
    <div class="row">

        <div class="col-md-12">

            <a data-agent_id="" data-toggle="modal" data-target=".modal_edit_list"
               class="btn btn-success btn-sm pull-right openform" style="margin-bottom: 15px;">
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
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Code Number</th>
                            <th>Password</th>
                            <th>Booking Limit</th>
                            <th>Due Amount</th>
                            <th>Status</th>
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
    <div class="modal-dialog" role="document" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title engineertitle" id="myModalLabel">Agent Detail</h4>
            </div>


            <div class="modal-body agentaddedit">


            </div>


        </div>
    </div>
</div>


<div class="modal fade password" id="change_pass" tabindex="-1" role="dialog" align="center"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 400px;">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title pull-left" id="myModalLabel">Agent Password</h4>
            </div>


            <div class="modal-body changepassbody">


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
        function readURL(input, classes) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.' + classes).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(function () {
            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (Math.floor(element.files[0].size / 1024) <= param)
            }, 'Max. upload file should be 2MB.');
            $('body').on('change', '.logo_image', function () {
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  //  alert("Only formats are allowed : "+fileExtension.join(', '));
                }else{
                    readURL(this, 'logo_preview');
                }

            });
            $('body').on('change', '.changeuserimage', function () {
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  //  alert("Only formats are allowed : "+fileExtension.join(', '));
                }else{
                    readURL(this, 'image_preview');
                }
            });
            $('#agents').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    'url': "{{ route('agent.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";

                    },
                },
                columns: [
                    {data: 'DT_RowIndex', "orderable": false},
                    {data: 'image', "orderable": false},
                    {data: 'name'},
                    {data: 'lastname'},
                    {data: 'email'},


                    {data: 'code_number'},
                    {data: 'password'},
                    {data: 'booking_limit'},
                    {data: 'unpaid_amount'},
                    {data: 'status'},
                    {data: 'action', "orderable": false},

                ]
            });

            $('body').on('click', '.openform', function () {
                var id = $(this).data('agent_id');

                if (id == '') {
                    $('.engineertitle').text('{{ __('Add Agent') }}');
                } else {
                    $('.engineertitle').text('{{ __('Edit Agent') }}');
                }

                $.ajax({
                    url: "{{ route('agent.getmodel')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {agent_id: id},
                    beforeSend: function () {
                        $('.agentaddedit').html('<h5>loading..</h5>')
                    },
                    success: function (data) {
                        $('.agentaddedit').html(data);
                        $('.booking_limit').inputmask('decimal', {
                            rightAlign: false,
                        });
                        /*$.validator.addMethod("uniquecodenumber", function (value, element) {
                            let result = false;
                            $.ajax({
                                url: "{{route('upx.uniquecodenumber')}}",
                                type: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data :{
                                    code_number : value,
                                    id:id
                                },
                                dataType: "JSON",
                                success: function (data) {
                                    console.log(data);
                                    if (data.status == 200) {
                                        result = false;
                                    } else {
                                        result = true;
                                    }
                                },
                                async: false
                            });
                            return result;
                        });*/
                        $(".formsubmit").validate({
                            rules: {
                                name:{maxlength: 50},
                                lastname:{maxlength: 50},
                                email:{maxlength: 50},
                                phone:{maxlength: 50},
                                company:{maxlength: 50},
                                address1:{maxlength: 100},
                                address2:{maxlength: 100},
                                address3:{maxlength: 100},
                                city:{maxlength: 20},
                                state:{maxlength: 20},
                                postal_code:{maxlength: 10},
                                company_no:{maxlength: 30},
                                vat_number:{maxlength: 30},

                                imageuser: {accept: "image/jpg,image/jpeg,image/png,image/gif",filesize: 2048 },
                                logo_image_user: {accept: "image/jpg,image/jpeg,image/png,image/gif",filesize: 2048},
                                code_number: {
                                    required:true,
                                    maxlength: 3,
                                    digits: true,

                                },
                            },
                            messages: {
                                imageuser: {accept: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed.'},
                                logo_image_user: {accept: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed.'}
                            }

                        });

                        setTimeout(function () {
                            $('.classfocus').focus()
                        }, 700);


                    },

                });
            });

            $('body').on('click', '.change_password', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('agent.changepassword')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {id: id},
                    beforeSend: function () {
                        $('.changepassbody').html('<h5>loading..</h5>')
                    },
                    success: function (data) {
                        $('.changepassbody').html(data);
                        $('.agentpassword').addClass('dilip');
                        $(".agentpassword").validate({
                            rules: {
                                password: {
                                    required: true,
                                    minlength: 6
                                },
                                password_confirmation: {
                                    required: true,
                                    minlength: 6,
                                    equalTo: "#mainpassword"
                                }
                            },
                        });
                    },

                });
            });

            $('body').on('submit', '.agentpassword', function (e) {
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
                        $('.changepass').prop("disabled", false);
                        PNotify.removeAll();
                        if (data.status == 200) {
                            $('.password').modal('hide');
                            $('#agents').DataTable().ajax.reload();
                            $('.spinner').html('');
                            new PNotify({
                                title: 'success!',
                                text: data.msg,
                                type: 'success'
                            });

                        }
                        if (data.status == 400) {
                            $('.spinner').html('');
                            new PNotify({
                                title: 'fail!',
                                text: data.msg,
                                type: 'fail'
                            });

                        }

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
                            new PNotify({
                                title: 'success!',
                                text: data.msg,
                                type: 'success'
                            });

                        }

                    },

                });
            });

            $('body').on('click', '.changestatus', function () {
                var id = $(this).data('id');
                var status = $(this).data('status');
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
                        url: '{{ route("agent.changestatus") }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {id: id, status: status},
                        success: function (data) {
                            $("#agents").DataTable().ajax.reload();
                        },
                        error: function () {
                            new PNotify({
                                title: 'Oh No!',
                                text: 'Something went wrong!',
                                type: 'error'
                            });
                        }
                    });
                })

            });
            $('body').on('click', '.delete_agents', function () {
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
                        url: '{{ url("upx/agent") }}/' + id,
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

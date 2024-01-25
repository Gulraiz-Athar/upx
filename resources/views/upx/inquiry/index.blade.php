@extends('layouts.app')
@section('content')
@section('pageTitle', 'Inquiry')


@include('upx.includes.topbar')
<!-- Main content -->

<section class="content">
    <div class="row">

        <div class="col-xs-12">
        @include('upx.includes.message')
        <!-- /.box -->

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="inquiry" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Country</th>
                            <th>Service</th>
                            <th>Service Type</th>
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

<!---- modal details----------->
<div class="modal fade transationhistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Inquiry details</h4>
            </div>
            <div class="modal-body transationmodel">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!---- modal details----------->

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
    <script>
        $(function () {
            $('#inquiry').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    'url': "{{ route('inquiry.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', "orderable": false},
                    {data: 'firstname'},
                    {data: 'lastname'},
                    {data: 'email'},
                    {data: 'contactno'},
                    {data: 'country'},
                    {data: 'service'},
                    {data: 'service_type'},
                    {
                        data: 'action', "orderable": false
                    },
                ]
            });
        })

        $('body').on('click','.checkhistory',function(){
            var id = $(this).data('id');
            $.ajax({
                url : "{{ route('inquiry.getmodel')}}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data : {id:id},
                beforeSend: function(){
                    $('.modal-body').html('<h5>loading..</h5>')
                },
                success:function(data){
                    $('.count_my').text(data.count);
                    $('.transationmodel').html(data.view);
                    $("#agents").DataTable().ajax.reload();
                },

            });
        });
    </script>
@endpush
@endsection

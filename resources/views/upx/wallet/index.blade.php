@extends('layouts.app')
@section('content')
@section('pageTitle', 'Wallet')


@include('upx.includes.topbar')
<!-- Main content -->

<section class="content">
    <div class="row">

        <div class="col-md-12">


            <a href="#" class="btn btn-success btn-sm pull-right " id="customButton" style="margin-bottom: 15px;">
                Add
            </a>
            <form id="myForm" class="pull-right" action="{{ route('wallet.add') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" oninput="this.value = Math.abs(this.value)"
                       id="amountInDollars"
                       style="line-height: 25px; border-radius: 5px; border: 1px solid #b3b0b0; margin-right: 10px; padding: 0px 0px 0px 10px;"
                       placeholder="amount" maxlength="6" />
                <input type="hidden" id="stripeToken" name="stripeToken"/>
                <input type="hidden" id="stripeEmail" name="stripeEmail"/>
                <input type="hidden" id="amountInCents" name="amountInCents"/>
            </form>
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
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Wallet Balance</th>

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


@push('script')
    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script>
        $(function () {

            $('#amountInDollars').inputmask('decimal', {
                rightAlign: false
            });
            /**************** remove decimal value****************/
            $('#amountInDollars').bind('paste',function(e) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
            });

            var handler = StripeCheckout.configure({
                key: "{{ config('constants.STRIPE_KEY') }}",
                image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                token: function (token) {
                    $("#stripeToken").val(token.id);
                    $("#stripeEmail").val(token.email);
                    $("#amountInCents").val(Math.floor($("#amountInDollars").val() * 100));
                    $("#myForm").submit();
                }
            });

            $('#customButton').on('click', function (e) {
                if ($.isNumeric($("#amountInDollars").val()) && $("#amountInDollars").val() > 0) {
                    var amountInCents = Math.floor($("#amountInDollars").val() * 100);
                    var displayAmount = parseFloat(Math.floor($("#amountInDollars").val() * 100) / 100).toFixed(2);
                    // Open Checkout with further options
                    handler.open({
                        name: 'Unitet Parcel Xpress',
                        description: 'Wallet amount (£' + displayAmount + ')',
                        currency: 'gbp',
                        amount: amountInCents,
                        allowRememberMe: false
                    });
                    e.preventDefault();
                } else {
                    PNotify.removeAll();
                    new PNotify({
                        title: 'Oh No!',
                        text: 'Please add numeric and greater than 0 value.',
                        type: 'error'
                    });
                }

            });

// Close Checkout on page navigation
            $(window).on('popstate', function () {
                handler.close();
            });
            $('#agents').DataTable({
                order: [],
                processing: true,
                serverSide: true,
                ajax: {
                    'url': "{{ route('wallet.getall') }}",
                    'type': 'POST',
                    'data': function (d) {
                        d._token = "{{ csrf_token() }}";
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', "orderable": false},
                    {data: 'date'},
                    {data: 'amount'},
                    {data: 'wallet_balance'},
                ]
            });
        })



    </script>
@endpush
@endsection

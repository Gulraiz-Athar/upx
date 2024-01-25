<style type="text/css">
    .transaction_details td,.transaction_details th{
        border: 1px solid #000!important;
    }
</style>

<section class="invoice" style="margin: 0px;">


    <div class="row">


        <div class="col-md-12">
            <label>Inquiry detail: </label>
            <table class="table transaction_details">


                <tr>
                    <th>Firstname: </th>
                    <td>{{ $data->firstname }} </td>
                    <th>Last Name: </th>
                    <td>{{ $data->lastname }}</td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td>{{ $data->email }} </td>
                    <th>Contact No:</th>
                    <td>{{ $data->contactno }} </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <th>Shipper Address:</th>
                    <td>{{ $data->shipper_address }} </td>
                    <th>country: </th>
                    <td>{{ $data->getcountry->name }}</td>

                </tr>
                @if($data->service != 3)
                <tr>
                    <th>Length (cm): </th>
                    <td>{{ $data->length }}</td>
                    <th>Width (cm): </th>
                    <td>{{ $data->width }} </td>

                </tr>
                <tr>
                    <th>Height (cm): </th>
                    <td>{{ $data->height }}</td>
                    <th>Weight (kg): </th>
                    <td>{{ $data->weight }} </td>

                </tr>
                @endif
                <tr>
                    <th>Service: </th>
                    <td>{{ $data->getservice->name  }}</td>
                    <th>Service type: </th>
                    <td> {{ $data->service_type }}@if($data->service == 3)KG @endif </td>

                </tr>
                <tr>
                    <th>Chargeable Weight: </th>
                    <td>{{ $data->chargeable_weight }}KG</td>
                    <th>Total: </th>
                    <td>&#163;{{ $data->total }}</td>
                </tr>
            </table>
        </div>

    </div>
    <!-- /.row -->


</section>


@php
// echo "<pre>";
// print_r($printreports->toArray());
// exit();
//     echo "<pre>";
//         foreach ($printreports as $print) {
//             print_r($print);
//         }
//     exit();    
@endphp
@include('upx.includes.head')
<div class="box">
    <div class="box-body table-responsive">
        <table id="report" class="table table-bordered table-striped">
            <thead>
            <tr>
                
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
                @foreach ($printreports as $print)
                    <tr>
                        <td>{{ $print->addressessender->address1 ?? '-' }} </td>
                        <td>{{ $print->addressessender->address2 ?? '-'}} </td>
                        <td>{{ $print->addressessender->address3 ?? '-'}} </td>
                        <td>{{ $print->addressessender->city ?? '-'}} </td>
                        <td>{{ $print->addressessender->state ?? '-'}} </td>
                        <td>{{ $print->addressessender->postalcode ?? '-'}} </td>
                        <td>{{ $print->addressessender->country->name ?? '-'}} </td>
                        <td>{{ $print->addressessender->phonenumber ?? '-'}} </td>
                        <td>{{ $print->dimentions_count ?? '-'}} </td>
                        <td>{{ max($print->actual_weight, $print->volumetric_weight) ?? '-'}} </td>
                        <td>{{ max($print->final_total_upx, $print->final_total_upx) ?? '-'}} </td>
                        <td>-</td>
                        <td>{{ $print->booking_instruction ?? '-'}} </td>
                        <td>{{ $print->addressessender->id_type ?? '-'}} </td>
                        <td>{{ $print->addressessender->id_number ?? '-'}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('upx.includes.scripts')
<script>
    $(function() {
    window.print()
    });
</script>
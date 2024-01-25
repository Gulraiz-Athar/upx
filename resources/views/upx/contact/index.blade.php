@extends('layouts.app')
@section('content')
@section('pageTitle', 'Contact Us')


@include('upx.includes.topbar')

@push('links')
<style type="text/css">

 
  .country_tag{
      background-color: #3c8dbc;
      font-weight:100; 
      font-size:14px;
      margin-right: 5px; 
      color: #fff; 
      padding: 5px 15px;    
  }

  
</style>
@endpush
<!-- Main content -->

    <section class="content">
      <div class="row">

      	
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
                  <th >Date</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>
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
<script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $(function () {

    $('#agents').DataTable({
			
			processing: true,
			serverSide: true,
      order: [],
			ajax: {
				'url': "{{ route('contact.getall') }}",
				'type': 'POST',
				'data': function ( d ) {
          			d._token = "{{ csrf_token() }}";
          
        		},
			},
			columns: [
			{ data: 'DT_RowIndex',"orderable": false},
			{ data: 'date'},
			{ data: 'name'},
      { data: 'email'},
      { data: 'message'},
			
			
			]
	});

   
    
  })
</script>
@endpush
@endsection
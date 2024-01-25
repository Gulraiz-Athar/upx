@extends('layouts.app')
@section('content')
@section('pageTitle', 'Agent')
<style type="text/css">
  .error {
    color: red;
  }
</style>
<!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->

 
        <div class="col-md-12">
      		<a href="{{ route('agent.index') }}" class="pull-left btn btn-circle btn-default btn-sm back" style="margin-bottom: 15px;">
      			Back
      		</a>
	     </div>
        <div class="col-md-12">
          @include('upx.includes.message')
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Agent</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form method="post" id="submitform" action="{{ route('agent.store') }}">
            	{{ csrf_field() }}
              <input type="hidden" name="agent_id" value="{{ isset($agent->id) ? $agent->id : '' }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" value="{{ isset($agent->name) ? $agent->name : old('name') }}" name="name"  placeholder="First Name">
                  @if ($errors->has('name'))
          					<span class="help-block" style="color:red;">
          						<strong>{{ $errors->first('name') }}</strong>
          					</span>
          				@endif
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" class="form-control"  value="{{ isset($agent->lastname) ? $agent->lastname : old('lastname') }}" name="lastname" placeholder="lastname">
                  @if ($errors->has('lastname'))
          					<span class="help-block" style="color:red;">
          						<strong>{{ $errors->first('lastname') }}</strong>
          					</span>
          				@endif
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Email</label>
                  <input type="email" placeholder="Email" name="email" value="{{ isset($agent->email) ? $agent->email : old('email') }}"  class="form-control">
                   @if ($errors->has('email'))
          					<span class="help-block" style="color:red;">
          						<strong>{{ $errors->first('email') }}</strong>
          					</span>
          				@endif
                </div>
               <div class="form-group">
                  <label for="exampleInputFile">Status</label>
                  <select class="form-control" name="status">
                    <option value="Active" @if(isset($agent->status) && $agent->status == 'Active') selected @endif>Active</option>
                    <option value="Inactive" @if(isset($agent->status) && $agent->status == 'Inactive') selected @endif>Inactive</option>
                  </select>
                   @if ($errors->has('status'))
                    <span class="help-block" style="color:red;">
                      <strong>{{ $errors->first('status') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary submitbutton">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>

@push('script')
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">

  $(document).ready(function () {
    $( "#submitform" ).submit(function( event ) {
      if($('#submitform').valid())
      {
        $('.submitbutton').prop('disabled', true);
      }
      
    });
    $( "#submitform" ).validate({
      rules: {
        name : {
          required: true,
        },
        lastname: {
          required: true,
        },

        email :{
          required: true,
        }
        
      }
    });
  });
</script>
@endpush
@endsection
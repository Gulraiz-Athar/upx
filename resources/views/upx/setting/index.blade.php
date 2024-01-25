@extends('layouts.app')
@section('content')
@section('pageTitle', 'Weight')
<style type="text/css">
  .error {
    color: red;
  }
</style>
<!-- Main content -->
<section class="content">
      <div class="row">
        
        <div class="col-md-12">
          @include('upx.includes.message')
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form method="post" class="formsubmit" id="submitform" action="{{ route('setting.store') }}">
            	{{ csrf_field() }}
             
              <div class="box-body">
                
                    <div class="row">
                     <div class="col-md-12">
                        <label>Handling Price : </label>
                        <input type="text" placeholder="Handling Price" class="form-control hangling_price" name="setting[hangling_price]" value="{{ settingvalue('hangling_price') }}" required="" />

                        <input type="hidden"  name="setting[stripekey]" value="1234" />
                      </div>
                    </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary submitbutton pull-right">Submit <span class="spinner"></span></button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>

@push('script')

<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
<script>
  $(function () {
     $('.hangling_price').inputmask('decimal', {
                    rightAlign: false,

                    });
  });
</script>
@endpush
@endsection
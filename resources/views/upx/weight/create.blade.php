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
        <!-- left column -->

 
        <div class="col-md-12">
      		<a href="{{ route('weight.index') }}" class="pull-left btn btn-circle btn-default btn-sm back" style="margin-bottom: 15px;">
      			Back
      		</a>
	     </div>
        <div class="col-md-12">
          @include('upx.includes.message')
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Weights</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
            <form method="post" class="formsubmit" id="submitform" action="{{ route('weight.store') }}">
            	{{ csrf_field() }}
             
              <div class="box-body">
                
                    <div class="row field_wrapper">
                      <div class="col-md-3">
                        <input type="text" placeholder="Weight" class="comment" name="weight[]" value=""/>
                        <a href="#"  class="add_button" title="Add field"><i style="font-size: 25px;color: green;    margin-left: 5px;" class="fa fa-plus-circle" aria-hidden="true"></i></a>
                      </div>
                    </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary submitbutton">Submit <span class="spinner"></span></button>
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
    /****************************************** ADD Remove  ***************************/
    var maxField = 500; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-3"><input type="text" class="comment" placeholder="Weight" name="weight[]" value=""/><a href="#"  style="font-size: 25px; margin-left: 5px; color: red;" class="remove_button"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    while(x<=10){
      $(wrapper).append(fieldHTML); 
      x++
    }
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    /****************************************** ADD Remove  ***************************/


    $('body').on('submit','.formsubmit',function(e){
                e.preventDefault();
                $.ajax({
                    url : $(this).attr('action'),
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,       
                    cache: false,             
                    processData:false, 
                    beforeSend: function(){
                      $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                    },
                    success:function(data){
                    PNotify.removeAll();
                     if(data.status == 400){
                        $('.spinner').html('');
                              new PNotify({
                              title: 'Oh No!',
                              text: data.msg,
                              type:'error'
                        });
                      }
                      if(data.status == 200){
                        $('.spinner').html('');
                         new PNotify({
                              title: 'Success!',
                              text: 'Successfully submitted',
                              type:'success'
                        });
                         window.setTimeout(function() {
                            window.location.href = "{{ route('weight.index')}}";
                        }, 1000);
                      }

                    },
                    error:function(){
                      PNotify.removeAll();
                      $('.spinner').html('');
                              new PNotify({
                              title: 'Oh No!',
                              text: 'Something went wrong!',
                              type:'error'
                        });
                    }
                    
                });
            });

  });
</script>
@endpush
@endsection
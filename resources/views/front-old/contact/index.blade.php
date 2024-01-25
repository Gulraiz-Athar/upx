@extends('front.layout.app')
@section('content')
@section('pageTitle', 'Contact')
@section('heading', 'CONTACT US')
@section('body', 'Get in touch with us easily')

@include('front.pages_part.breadcrumb')
<style type="text/css">
    .form-control, .input-group-addon, .bootstrap-select .btn{
        text-transform: none;
        color: #000;
    }
</style>
<!-- Contact Us -->
                <section class="contact-page pad-30">                    
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-1">
                                <ul class="contact-detail title-2">
                                  <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                                     <span>uk numbers:</span> 
                                     <p class="gray-clr"> +0116-326-7812 <br> +0116-319-4920 </p>
                                  </li>
                                 
                                  <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                                     <span>Email address:</span> 
                                     <p class="gray-clr"> support@upx-uk.com <br> info@upx-uk.com </p>
                                  </li>
                               </ul>
                            </div>

                            <div class="col-md-5 col-sm-6 col-md-offset-1 contact-form">

                                <div class="calculate-form">
                                    <div class="errorsuccess">
                                    </div>
                                    
                                    <form class="row contact-form formsubmit" action="{{ route('contact.submit') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Name: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="name" id="Name" required placeholder="Name" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Email: </label></div>
                                            <div class="col-sm-9"> <input type="email" name="email" id="Email" required  placeholder="Email" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Phone: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="phone" id="Phone" placeholder="Phone" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Message: </label></div>
                                            <div class="col-sm-9"> <textarea class="form-control" placeholder="Message" name="message" id="Message" required cols="25" rows="3"></textarea> </div>
                                        </div>                                  
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-9 col-xs-12 pull-right"> 
                                                <button name="submit" id="submit_btn" class="btn-1"> send message <span class="spinner"></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Contact Us -->

                <!-- Contact Map -->
                <section class="map pt-80">
                    <div class="map-canvas">
                        <div id="map-canvas"></div>
                    </div>
                </section>
                <!-- /.Contact Map -->
@push('script')
<script type="text/javascript">
    $(document).ready(function(){
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
                        $('.errorsuccess').html('');
                      $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success:function(data){
                    $('.errorsuccess').html('');
                     if(data.status == 400){

                        $('.spinner').html('');
                        $('.errorsuccess').html('<div class="alert alert-danger"><strong>Oh No!</strong>'+data.msg+'</div');
                        
                     }
                      if(data.status == 200){
                        $('.formsubmit')[0].reset();
                        $('.spinner').html('');
                        $('.errorsuccess').html('<div class="alert alert-success"><strong>Thank you for contacting us!</strong>'+data.msg+'</div');
                        
                        
                      }

                    },
                    
                });
            });
    })
</script>
@endpush

@endsection
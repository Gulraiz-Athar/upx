<!-- Main Jquery JS -->
        <script src="{{ URL::asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>        
        <!-- Bootstrap JS -->
        <script src="{{ URL::asset('assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>    
        <!-- Bootstrap Select JS -->
        <script src="{{ URL::asset('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>    
        <!-- OwlCarousel2 Slider JS -->
        <script src="{{ URL::asset('assets/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>   
        <!-- Sticky Header -->
        <script src="{{ URL::asset('assets/js/jquery.sticky.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ URL::asset('assets/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>
        <!-- Map JS -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
        <!-- Theme JS -->
        <script src="assets/js/theme-ajax-mail.js" type="text/javascript"></script>
        <!-- Data binder -->
        <script src="{{ URL::asset('assets/plugins/data.binder.js/data.binder.js') }}" type="text/javascript"></script>

        <!-- Slider JS -->        


        <!-- Theme JS -->
        <script src="{{ URL::asset('assets/js/theme.js') }}" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>

        @stack('script')
        <script type="text/javascript">
        function Calculate(){
                var length = $('.lengthvalue').val();
                var width = $('.widthvalue').val();
                var height = $('.heightvalue').val();
                var weight = $('.weightvalue').val();
                
                var country = $('.countryvalue').val();

                if(length != "" && width != "" && height != "" && weight != "" &&  country > 0){
                        $.ajax({
                                url : '{{ route("user.getprice") }}',
                                type: 'POST',
                                headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data:{length:length,width:width,height:height,weight:weight,country:country},
                                beforeSend: function(){
                                      $('.pricecalculation').html('<i class="fa fa-spinner fa-spin"></i>');  
                                      $('.totalweight').html('<i class="fa fa-spinner fa-spin"></i>');
                                },
                                success:function(data){                                 
                                        if(data.status == 200){
                                                $('.pricecalculation').html(data.price);  
                                                $('.totalweight').html(data.weight);
                                        }else{
                                                $('.pricecalculation').html('0.00');  
                                                $('.totalweight').html('0.00');
                                        }
                                },
                                error: function(){
                                        $('.pricecalculation').text('0.00');
                                         $('.totalweight').text('0');
                                }
                        });
                }else{
                      $('.pricecalculation').text('0.00');  
                }
                
        }
         $(document).ready(function(){
                $('.masknumber').inputmask('decimal', {
                        rightAlign: false
                });
                $('.lengthvalue,.widthvalue,.heightvalue,.weightvalue,.gramvalue').focusout(function(){
                    Calculate();
                });
                $('.lengthvalue,.widthvalue,.heightvalue,.weightvalue,.gramvalue').keyup(function(){
                    Calculate();
                });
                $('.countryvalue').change(function(){
                    Calculate();
                })
                
         });
        </script>
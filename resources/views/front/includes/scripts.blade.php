<!-- Main Jquery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script src="{{ URL::asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap JS -->
<script src="{{ URL::asset('assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap Select JS -->
<script src="{{ URL::asset('assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}"
        type="text/javascript"></script>
<!-- OwlCarousel2 Slider JS -->
<script src="{{ URL::asset('assets/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>
<!-- Sticky Header -->
<script src="{{ URL::asset('assets/js/jquery.sticky.js') }}"></script>
<!-- Wow JS -->
<script src="{{ URL::asset('assets/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>
<!-- Map JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoK_mbU_w57TMuxHhTuHL6hrDW8nOIvjg&v=3.exp&amp;sensor=false"></script>
<!-- Theme JS -->
<script src="assets/js/theme-ajax-mail.js" type="text/javascript"></script>
<!-- Data binder -->
<script src="{{ URL::asset('assets/plugins/data.binder.js/data.binder.js') }}" type="text/javascript"></script>

<!-- Slider JS -->


<!-- Theme JS -->
<script src="{{ URL::asset('assets/js/theme.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>

<script src="{{ asset('public/effect_title/js/TweenLite.min.js') }}"></script>
<script src="{{ asset('public/effect_title/js/EasePack.min.js') }}"></script>
<script src="{{ asset('public/effect_title/js/rAF.js') }}"></script>
<script src="{{ asset('public/effect_title/js/demo-1.js') }}"></script>


@stack('script')
<script type="text/javascript">
    /************************ change on service dropdown *******************/
    $(document).on('change', '.service', function () {

        var service = $(this).val();
        $(".service_type_div").hide();
        $(".dimensiondiv").show();
        $(".document_type_div").hide();
        if (service == 1) { // if door to door service
            $(".service_type_div").show();
        }
        if (service == 3) { //if document service
            $(".document_type_div").show();
            $(".dimensiondiv").hide();
        }
        // $('.quotefrm')[0].reset();
        $('.lengthvalue').val("");
        $('.widthvalue').val("");
        $('.heightvalue').val("");
        $('.weightvalue').val("");
        $('.pricecalculation').html('0.00');
        $('.totalweight').html('0.00');

        $(".timeline_s").hide();
        $('.test').html('');

        Calculate();
    });
    function Calculate(type='') {
        $('#booknowbtn').prop('disabled', false);
        $('.booking-error-div').hide();
        var length = $('.lengthvalue').val();
        var width = $('.widthvalue').val();
        var height = $('.heightvalue').val();
        var weight = $('.weightvalue').val();
        var country = $('.countryvalue').val();
        var service = $('.service').val();
        var service_type = $('.service_type').val();
        var document_service_type = $('.document_service_type').val();
// console.log(weight);
     //   if (length != "" && width != "" && height != "" && weight != "" && country > 0) {
        if (service != "" && country > 0) {
            $.ajax({
                url: '{{ route("user.getprice") }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    length: length,
                    width: width,
                    height: height,
                    weight: weight,
                    country: country,
                    service: service,
                    service_type: service_type,
                    document_service_type: document_service_type,
                },
                beforeSend: function () {
                    $('.pricecalculation').html('<i class="fa fa-spinner fa-spin"></i>');
                    $('.totalweight').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function (data) {
                    console.log(data.timeline)
                    if (data.status == 200) {
                        if(data.timeline == null){
                            $(".timeline_s").hide();
                            $('.test').html('');
                        }else if(data.timeline ==''){
                            $(".timeline_s").hide();
                            $('.test').html('');
                        }else{
                            $(".timeline_s").show();
                            // $('.test').val(data.timeline);
                            $('.test').html('<label>'+data.timeline+'</label>');
                        }
                        if(data.price == 0 && data.weight != 0){
                            $('.booking-error-div').show();
                            $('#booking-error').text('We do not ship to the selected country for now.');
                            $('#booknowbtn').prop('disabled', true);
                        }

                        $('.pricecalculation').html(data.price);
                        $('.totalweight').html(data.weight);
                        $('#chargeable_weight').val(data.weight);
                        $('#total').val(data.price);
                        var country = "";
                        for(var i = 0; i < data.countries.length; i++) {
                            country += "<option value='" + data.countries[i]['id'] + "'>" + data.countries[i]['name'] + "</option>";
                        }
                        if(type != 'country'){
                            $( 'select[name="country"]' ).html( country );
                        }
                    } else {
                        $('.pricecalculation').html('0.00');
                        $('.totalweight').html('0.00');
                        $('#chargeable_weight').val(0.00);
                        $('#total').val(0.00);
                    }
                },
                error: function () {
                    $('.pricecalculation').text('0.00');
                    $('.totalweight').text('0');
                }
            });
        } else {
            $('.pricecalculation').text('0.00');
        }

    }

    $(document).ready(function () {
        $('.masknumber').inputmask('decimal', {
            rightAlign: false
        });
        $('.lengthvalue,.widthvalue,.heightvalue,.weightvalue,.gramvalue').focusout(function () {
            Calculate();
        });
        $('.lengthvalue,.widthvalue,.heightvalue,.weightvalue,.gramvalue').keyup(function (e) {
            Calculate();

        });
        $('.countryvalue').change(function () {
            Calculate('country');
        })
        $('.service_type,.document_service_type').change(function () {
            Calculate();
        })

        $('body').on('keyup', '.masknumber', function () {
            var number = ($(this).val().split('.'));
            if ((number - Math.floor(number)) !== 0 && number[1].length > 2)
            {
                var salary = parseFloat($(this).val());
                $(this).val( salary.toFixed(2));
            }

        });
    });
</script>

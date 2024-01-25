@extends('front.layout.app')
@section('content')
@section('pageTitle', 'Quote')
@section('heading', 'Get a Quote')

@section('body', 'Contact us today with your requirements and let us work on the best courier solution for you at the most competitive prices.')

<style>
    label.error {
        color: red;
    }
</style>
@include('front.pages_part.breadcrumb')
@include('front.pages_part.calculate')
@include('front.pages_part.steps')


@push('script')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dist/Pnotify/pnotify.custom.min.css') }}"/>
    <script src="{{ URL::asset('dist/Pnotify/pnotify.custom.min.js') }}"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(".quotefrm").validate({
            rules: {
                length: {
                    required: function (element) {
                        return $("#service").val() != 3;
                    }
                },
                width: {
                    required: true,
                },
                height: {
                    required: true,
                },
                weight: {
                    required: true,
                },
                country: {
                    required: true,
                }
            }
        });
        $(document).on('click', '.booknowbtn', function () {

            var val = $('.quotefrm').valid();

            if (val != false) {
                $(".inquiryfrmdiv").show();
                $(".bookbtndiv").hide();
            } else {
                return false;
            }
        });
        $('body').on('submit', '.quotefrm', function (e) {
            $('.firstname').rules('add', {
                required: true,
            });
            $('.lastname').rules('add', {
                required: true,
            });
            $('.email').rules('add', {
                required: true,
                email: true
            });
            $('.contactno').rules('add', {
                required: true,
            });
            $('.shipper_address').rules('add', {
                required: true,
            });
            e.preventDefault();
            if($('#quotefrm').valid()){
                $(this).prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: $(this).attr('action'),
                    data: $('form#quotefrm').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                    },
                    success: function (data) {
                        $(this).prop('disabled', false);
                        $('.spinner').html('');
                        PNotify.removeAll();
                        if (data.status == 400) {
                            new PNotify({
                                title: 'Oh No!',
                                text: data.msg,
                                type: 'error'
                            });
                        }
                        if (data.status == 200) {
                            $('.quotefrm')[0].reset();
                            $('.pricecalculation').html('0.00');
                            $('.totalweight').html('0.00');
                            $(".inquiryfrmdiv").hide();
                            $(".bookbtndiv").show();
                            //$('html, body').animate({scrollTop: 30}, 1000);
                            $("html, body").animate({scrollTop: $('.calculate').offset().top}, 1000);
                            new PNotify({
                                title: 'Success!',
                                text: data.msg,
                                type: 'success'
                            });
                        }
                    },
                });
            }
        });


    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.owl-carousel.homeSlider').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayTimeout: 500,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })

//


// flag slider//

            $('.owl-carousel.flagSlider').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayTimeout: 500,
                margin: 30,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
            //

            $(".owl-prev , .owl-next").empty();
        })
    </script>>
@endpush
@endsection

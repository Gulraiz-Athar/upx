@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / D2D Kenya')
@section('heading', 'D2D Kenya')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX offers a fast and dynamic door to door service to all major locations in Kenya. Our dedicated and experienced team provides the best solutions tailored to your needs at the price that suits you. We have bi-monthly consignments to Kenya by Air:<br><br>

• &nbsp;&nbsp;	Cut off is every other Thursday <br>
• &nbsp;&nbsp;	Depart our warehouse on Friday<br>
• &nbsp;&nbsp;	Flight booked over weekend out of UK<br>
• &nbsp;&nbsp;	Arrive Nairobi on Wednesday/Thursday<br>
• &nbsp;&nbsp;	Release and Delivery expected by the end of Friday (Saturday/Sunday for Mombasa)<br>


@endsection
@section('service_image')
{{ URL::asset('assets/img/block/d2d-kenya.jpg') }}
@endsection
@include('front.pages_part.servicepart')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">               
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    <div class="more-about clrbg-before" style="margin-bottom: 10px">
                        <h2 class="title-1">Please note that</h2>
                        <div class="pad-10"></div>
                        <p>
                            1) &nbsp; No flammable or dangerous goods (such as perfumes/deodorants) are permitted<br>

                            2) &nbsp; Airline charges on the greater of actual or volumetric weight for each pc. Volumetric weight is worked out by multiplying the dimensions of each box and dividing by 6000. So, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; length x width x height in cm divide by 6000<br>

                            3) &nbsp; Insurance is not provided and can be purchased additional at 10% of the value of cover which is non-refundable. For expensive items, we highly recommend this.<br><br>

                            We provide a free delivery address, so you can shop online at your favourite stores such as eBay and amazon - and have them delivered to our address in the UK:
                            <br><br>
                            UPX UK Ltd, 120E Melton Road, Leicester, LE4 5ED<br><br>
                           
                            Please ensure your name is on each parcel i.e. checkout with the address above and your name before "c/o UPX UK Ltd"<br><br>

                            PLEASE EMAIL US YOUR ORDERS AT THE EMAIL ADDRESS ABOVE SO THAT WE ARE IN THE LOOP FROM THE WORD GO<br><br>

                            PLEASE ENSURE YOUR NAME IS ON EACH PACKAGE DELIVERED SO WE CAN ALLOCATE IT TO YOURSELF<br><br>

                            We take pictures upon its arrival to our warehouse and when you confirm to dispatch it, we book it on the next schedule keeping you notified all the way.<br><br>

                            We provide free packaging and consolidation to try our best to ensure volumetric weight is not greater than actual (sometimes it is simply not possible with item such as pillows/crisps)<br><br>

                        </p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
 

@endsection
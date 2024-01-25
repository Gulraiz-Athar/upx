@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / d2d tanzania')
@section('heading', 'd2d tanzania')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX offers a fast and dynamic door to door service to all major locations in Tanzania. Our dedicated and experienced team provides the best solutions tailored to your needs at the price that suits you. We have weekly consignments to Tanzania by Air: <br>
• &nbsp;&nbsp;	Cut off is End of Day Wednesday<br>
• &nbsp;&nbsp;	Depart our warehouse on Thursday<br>
• &nbsp;&nbsp;	Flight booked every weekend out of UK<br>
• &nbsp;&nbsp;	Arrive Zanzibar on Tuesday/Wednesday<br>
• &nbsp;&nbsp;	Takes 2-4 days to be delivered to Dar es Salaam<br><br>

Airline charges on the greater of actual or volumetric weight for each pc. Volumetric weight is worked out by multiplying the dimensions of each box and dividing by 6000. So, length x width x height in cm divide by 6000.
Insurance is not provided and can be purchased additional at 10% of the value of cover which is non-refundable. For expensive items, we highly recommend this.
<br><br>
We provide a free delivery address, so you can shop online at your favourite stores such as eBay and amazon - and have them delivered to our address in the UK.<br><br>

UPX , 120E Melton Road, Leicester, LE4 5ED<br><br>
Please ensure your name is on each parcel i.e. checkout with the address above and your name before "c/o UPX"<br><br>
PLEASE EMAIL US YOUR ORDERS AT THE EMAIL ADDRESS ABOVE SO THAT WE ARE IN THE LOOP FROM THE WORD GO<br><br>
PLEASE ENSURE YOUR NAME IS ON EACH PACKAGE DELIVERED SO WE CAN ALLOCATE IT TO YOURSELF<br><br>
We take pictures upon its arrival to our warehouse and when you confirm to dispatch it, we book it on the next schedule keeping you notified all the way.<br><br>
We provide free packaging and consolidation to try our best to ensure volumetric weight is not greater than actual (sometimes it is simply not possible with item such as pillows/crisps).


@endsection
@section('service_image')
{{ URL::asset('assets/img/block/d2d-Tanzania.jpg') }}
@endsection
@include('front.pages_part.servicepart')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">               
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
 

@endsection
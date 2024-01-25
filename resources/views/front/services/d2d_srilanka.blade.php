@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / D2D Sri Lanka')
@section('heading', 'D2D Sri Lanka')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX offers a fast and dynamic door to door service to all major locations in Sri Lanka. Our dedicated and experienced team provides the best solutions tailored to your needs at the price that suits you. We offer the most competitive rates for parcels to all the destinations in Sri Lanka, collecting your parcel and delivering it to your chosen destination. We provide you with boxes/cartons for your parcel and arrange customs clearance within the one unbeatable price. Get Your Parcel Delivered By Air To Sri Lanka And To Countries around the world. We Will Handle Import and Export Clearances on Your Behalf for Safe and Hassle-Free Cargo Deliveries. <br><br>
For more information related to customs clearance Please visit <a href="https://nkrfreight.com/customs-broker-clearance-leicester-uk/" target="_blank">https://nkrfreight.com/customs-broker-clearance-leicester-uk/</a>  <br><br>
Our parcel delivery service is always reliable, quick and safe with all major courier companies like DHL, DPD, UPS, FedEx and many more. <br><br>
We work hard to make our customers lives as easy as possible by offering best of our services to every customer.

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/d2d-srilanka.jpg') }}
@endsection
@include('front.pages_part.servicepart')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">               
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    <div class="more-about clrbg-before" style="margin-bottom: 10px">
                        <h2 class="title-1">Restricted items to Sri Lanka</h2>
                        <div class="pad-10"></div>
                        <p>There are several items which are restricted to import to Sri Lanka which are as below:<br>
                            - &nbsp; Indian and Pakistani Currency <br>
                            - &nbsp; Narcotics and illegal drugs <br>
                            - &nbsp; Pornographic materials <br>
                            - &nbsp; Materials offensive to religious groups <br>
                            For more information, contact Sri Lanka’s customs authority, as well as consulting our prohibited items page for goods banned from carriage by our couriers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
 

@endsection
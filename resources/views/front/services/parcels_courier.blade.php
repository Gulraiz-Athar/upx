@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Parcels and Courier')
@section('heading', 'Parcels and Courier')

@include('front.pages_part.breadcrumb')
@section('service_description')
Send parcels from UPX to the world. We offer quick and easy online booking service so that you can generate online quote, select your preferred option and complete your booking within a few steps. We offer :<br>
- &nbsp;&nbsp;&nbsp;	Online Tracking of your parcel<br>
- &nbsp;&nbsp;&nbsp;	Express Next day deliveries <br>
- &nbsp;&nbsp;&nbsp;	After sales customer service and assistance<br><br>
With outstanding dispatch coordination, every Courier is focused on timely delivery, 100% accuracy, and strict adherence to the specific instructions of the client. Our couriers are uniformed and professional in appearance and demeanour.  No job is too small or too large for us to handle efficiently and cost-effectively.<br><br>
We collaborate with world-Class parcel couriers to provide you with the best available services. All couriers are reputable and have been established a number of decades and are widely known amongst the Public but we are offering low prices, so you, save money. We have an easy to use quotes tool so you can compare services And prices depending On your needs.



@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Parcels-and-courier.jpg') }}
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
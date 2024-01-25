@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / d2d India')
@section('heading', 'd2d India')

@include('front.pages_part.breadcrumb')
@section('service_description')
We offer a no hassle Door to Door baggage shipping service to India, collecting your parcel and delivering it to your chosen destination. We provide you with boxes/cartons for your parcel and arrange customs clearance in the UK & India all within the one unbeatable price.<br><br>
Our aim is to ensure your product reaches its chosen market efficiently, therefore each solution may well be unique, dependent upon your timescales and your budget.<br><br>
Ensuring that goods arrive the most effective way possible is as important as ensuring that they reach their destination swiftly. Our features include stringent control of transportation functions, the use of fast, accurate systems, constant service monitoring, ensuring continuous delivery performance and well-trained, innovative people.


@endsection
@section('service_image')
{{ URL::asset('assets/img/block/d2d-INDIA.jpg') }}
@endsection
@include('front.pages_part.servicepart')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">               
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    <div class="more-about clrbg-before" style="margin-bottom: 10px">
                        <h2 class="title-1">Prohibited items for Cargo</h2>
                        <div class="pad-10"></div>
                        <p>
                            All kinds of animals are strictly banned from sending by cargo. All kinds of firearms, weapons and explosives are prohibited as well.<br><br>
                            Aerosol cans and sprays are banned as well. Engines, generators, fire extinguishers, alcoholic beverages, tobacco products, antiques, cash money, life jackets and materials which are hazardous are strictly banned from being sent via our cargo service.
                            
                        </p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
 

@endsection
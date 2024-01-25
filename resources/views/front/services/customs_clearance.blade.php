@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Customs Clearance')
@section('heading', 'Customs Clearance')

@include('front.pages_part.breadcrumb')
@section('service_description')
We offer Customs Clearance in Leicester with complete range of import services from all destinations worldwide. Whether your shipment is Air Freight, Break Bulk, RORO or Sea Freight; our experienced team will monitor the arrival and dispatch of your shipment, providing free advice and answer any questions that you may have on all clearance procedures.<br><br>
We understand that Import Customs Clearance in Leicester or anywhere in the UK can be complex; so that is why is our team are at hand to digest all the rules, regulations and processes to make it easy to understand. It is as simple as 1, 2 and 3!<br><br>
We are focused on ensuring that we provide an efficient, professional, and timely service to tailor your company’s individual needs – so why not contact us today and let our team take the hassle of your shoulders?<br><br>
For Trade Tariff, commodity codes, duty and VAT rates please visit the Government’s website or visit <a href="https://nkrfreight.com/" style="color: #2371a9;">website</a> for assistance regarding Customs Clearance in Leicester.

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Customs-Clearance.jpg') }}
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
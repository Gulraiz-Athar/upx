@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Road Freight')
@section('heading', 'road Freight')

@include('front.pages_part.breadcrumb')
@section('service_description')
We offer regular daily trailer and arctic departures to and from most European destinations whatever the size of shipment. <br><br>
Our Road Freight operations staff will arrange movement from door to door. If the delivery or origin point is outside the EU, we can arrange for customs clearance at destination or on import into the UK. We specialise in Road shipments to the Middle East providing peace of mind.<br><br>
For urgent, time sensitive and high-value goods we offer dedicated van and truck services for deliveries also to and from anywhere in Europe.<br><br>
Please see our Import Guide and Export Guide for complete information about Importing and Exporting on <a href="https://nkrfreight.com/" style="color: #2371a9;">the website</a> 

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Road-Freight-Image.jpg') }}
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
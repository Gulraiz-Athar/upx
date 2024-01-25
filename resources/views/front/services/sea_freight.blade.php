@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Sea Freight')
@section('heading', 'Sea Freight')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX delivers a fast, flexible, and responsive sea freight service. We use premier shipping lines to safeguard capacity on busy routes. We offer you choice, cost efficiency and reliability. We care about the growth of your business and work with you developing innovative freight solutions and improvements in your supply chain, eliminating waste, saving you time and money.
@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Sear-Freight-Image.jpg') }}
@endsection
@include('front.pages_part.servicepart')

 <!-- More About Us -->
                <section class="pad-30 more-about-wrap">
                    <div class="theme-container container pb-100">               
                        <div class="row">
                            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="more-about clrbg-before" style="margin-bottom: 10px">
                                    <h2 class="title-1">Consolidation - Less than Container Load (LCL)</h2>
                                    <div class="pad-10"></div>
                                    <p>LCL freight is the most economical way for shipping smaller cargo. Whether you need to ship smaller quantities or need help consolidating shipments together, you can rely on us to provide you with quality LCL services from all major ports across the world. Our experienced team manage many LCL consignments every day. Our approach ensures reliable and efficient movement of your goods.<br>

                                        Our expertise in the LCL sector to East Africa has enabled us to create our own service which provides transparency all the way – especially with destination fees which other agents keep hidden to bump up their profit margin!<br>
                                        
                                        Whether you are importing LCL from the Far East or would like to export LCL shipments from the UK to any part of the world; our team are at your service.
                                        </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="more-about clrbg-before" style="margin-bottom: 10px">
                                    <h2 class="title-1">Export Full Container Loads (FCL)</h2>
                                    <div class="pad-10"></div>
                                    <p>
                                        UPX provides an unrivalled service for export for Ocean Freight, offering comprehensive rates with all the major and minor shipping lines. With competitive contract freight rates as well as knowledge of niche shipping lines servicing specific lanes, we can offer a full range of services including port to port or door to port shipment, making the entire shipping process simple.<br>
                                        Our global partners and agents can assist with customs and clearance at destination, providing a tailored service so that your cargo is delivered to its destination without hassle.<br>
                                        With our vast contacts of hauliers, we can arrange container collection where sometimes shipping lines do not have availability – tailoring the right package that suits your needs. We can assist with containers that need to be dropped on the ground for easy loading, reducing the risk of damage to the cargo. Containers can be dropped on the ground for as long as you like to give you the time required to load peacefully and at your leisure.
                                        Please visit our sister company’s <a href="https://nkrfreight.com/" style="color: #2371a9;">website</a> for complete information about FCL.
                                        

                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12  col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".40s">
                                <div class="more-about clrbg-before">
                                    <h2 class="title-1">Import</h2>
                                    <div class="pad-10"></div>
                                    <p>UPX can handle all your sea freight shipments from any port worldwide to the UK. Whether it is an LCL or an FCL, our specialist team is on hand to assist throughout the process.<br>
                                        We can liaise with your suppliers directly, coordinating with them to ensure time efficiency between order completion, loading and departure from the country of origin. Our documentation team can support you with obtaining all the necessary paperwork including Certificate of Origin, Export and Import Licences, Letters of Credit and Health Phytosanitary Certificates.<br>
                                        Planning is key to ensure extra costs such as demurrage and quay rent simply are not charged by the shipping line and port. As a result, our documentation and clearance department will begin the necessary custom clearing process during the transit time to enable your cargo to be delivered to its destination in a timely manner after arrival.
                                        Please visit our sister company’s <a href="https://nkrfreight.com/" style="color: #2371a9;">website</a> for complete information about Importing via Ocean Freight.
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.More About Us -->

@endsection
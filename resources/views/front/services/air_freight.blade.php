@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / air Freight')
@section('heading', 'Air Freight')

@include('front.pages_part.breadcrumb')

@section('service_description')
UPX offers a fast and dynamic air freight service for your more urgent shipments. We understand the demands for quick turnaround in today’s fast paced global market. Our dedicated air freight team use their knowledge and experience to offer the best solutions tailored to your needs at the right price.<br><br>
Through our sub offices and trusted agents, we have access to over 240 airlines in over 115 countries. We have contract rates with many prime international airlines and obtain daily spot rates to ensure you get the best deal.

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Air-Freight-Image.jpg') }}
@endsection
@include('front.pages_part.servicepart')

 <!-- More About Us -->
                <section class="pad-30 more-about-wrap">
                    <div class="theme-container container pb-100">               
                        <div class="row">
                            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="more-about clrbg-before" style="margin-bottom: 10px">
                                    <h2 class="title-1">Consolidation:</h2>
                                    <div class="pad-10"></div>
                                    <p>
                                        To obtain cheaper rates, UPX can provide air consolidation shipments to most major worldwide destinations. Air consolidation allows clients to balance cost and transit time by sharing space with other clients sending cargo to the same destination.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="more-about clrbg-before" style="margin-bottom: 10px">
                                    <h2 class="title-1">Export</h2>
                                    <div class="pad-10"></div>
                                    <p>
                                        UPX can handle your air freight shipments from any UK and European airport to any airport in the world. To ensure efficiency, we have secured comprehensive contracts and block space agreements with many airlines. Our friendly team will assist you with routing options and complete all documentations for export compliance; providing you the confidence that your cargo will arrive at its destination hassle-free.<br>
	                                    Please visit our sister company’s <a href="https://nkrfreight.com/" style="color: #2371a9;">website</a> for more information on Exporting.

                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12  col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".40s">
                                <div class="more-about clrbg-before">
                                    <h2 class="title-1">Import</h2>
                                    <div class="pad-10"></div>
                                    <p>
                                        Through our global partners and agents, we have access to over 240 airlines in over 115 countries.<br>
                                        We have contract rates with many prime international airlines and obtain daily spot rates to ensure you get the best deal with all your air cargo import requirements. Our clearance team, work hand in hand with our air freight import team making sure that there are no delays with the delivery of your cargo to the final destination.<br>

                                        Please visit our sister company’s <a href="https://nkrfreight.com/" style="color: #2371a9;">website</a> for complete information about Importing.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.More About Us -->

@endsection
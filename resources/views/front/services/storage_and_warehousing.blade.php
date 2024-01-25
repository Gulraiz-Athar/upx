@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Storage And Warehousing')
@section('heading', 'Storage And Warehousing')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX has been growing its warehousing space since day one! Through our extensive network of dedicated and shared warehousing Nationwide, we are confidently able to provide a cost-efficient warehousing and distribution solution to all our clients so that they can fulfil their commitments to their customers.<br><br>
Our warehouse in Leicester is located centrally in the UK – giving us the edge to deliver goods for our clients with ease across the country. Whether your cargo is standard goods or bulk heavy equipment, we have the right equipment to offload and store your goods safely and securely with 24-hour surveillance.<br><br>
We are confident that we provide the most competitively priced storage solution in Leicester providing flexibility for short- and long-term storage.<br><br>
We have access to fully bonded warehousing, both around Heathrow and Manchester airport as well as at Felixstowe and Southampton seaport, allowing our customers to secure goods of any kind. All bonded warehousing is supported by Customs and Excise and authorised by the HMRC allowing for goods to be stored under duty suspension, deferring all duties until the point of despatch.<br><br>
We even have access to Bonded Facilities worldwide including in the UAE where we have secured cargo from a cross trade transaction to assist the client offset the duties and taxes.

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Storage-and-warehousing.jpg') }}
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
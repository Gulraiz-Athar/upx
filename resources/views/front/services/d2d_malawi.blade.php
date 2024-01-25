@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / D2D Malawi')
@section('heading', 'D2D Malawi')

@include('front.pages_part.breadcrumb')
@section('service_description')
UPX offers a fast and dynamic door to door service to all major locations in Malawi. Our dedicated and experienced team provides the best solutions tailored to your needs at the price that suits you. Malawi is one of the hardest to reach countries in the world so deliveries here are not as cheap as, say, a cross-country delivery from London to Manchester, but UPX operates a lot cheaper option than our competitors. <br><br>  

By gathering experience from big postage giants like UPS, Fed Ex and DHL we got enough knowledge to know how to make efficient deliveries, offer cheap deals and make customers happy. Good posting relies on an operative courier service, the availability of the cheapest way to ship and customer involvement. By letting our clients freely choose the best way to send their items from our quote, we unlock a new dimension in the postage world, to allow customers and consumers to impact the service they are getting for the better. <br><br>

We have a wide range of area covering 45000 square miles and all major cities like Lilongwe, Blantyre and Mzuzu. UPX can help you find the cheapest courier options to Malawi. Our team ensures that your item arrives quickly and safely. <br><br>

Also please be aware of the relevant customs tariffs which you can find on the <a href="http://www.mra.mw/custom-and-excise" target="_blank"> Malawi Revenue Authority website.</a>

@endsection
@section('service_image')
{{ URL::asset('assets/img/block/d2d-Malawi.jpg') }}
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
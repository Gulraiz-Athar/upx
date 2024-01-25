@extends('front.layout.app')
@section('content')
@section('pageTitle', 'SERVICE / Door to Door')
@section('heading', 'Door to Door')

@include('front.pages_part.breadcrumb')
@section('service_description')
Door to Door cargo service is getting more and more popular these days. It means picking item from the house address of the client and delivering it to the door of the person whom the product is being sent to. It provides convenience to the customers and is highly reliable.<br><br>
UPX offers the cheapest rates for parcels worldwide, door-door courier service which provides time and cost savings for critical shipments with strict deadlines. Same day collections can be arranged direct from your home, office or warehouse with overnight flight departures and express customs clearance guaranteeing your shipment is delivered to your client’s door.<br><br>
Using our special discounted rates with DHL, DPD, FedEx, TNT and UPS; you and your clients are certain to be satisfied with the various service options available. Covering over 220 countries, your consignments can be tracked online and be insured up to a value of £5,000.<br><br>
Our Documents service is the most competitive nationwide – the max you will pay for DHL Express if you book through NKR Freight is £25.00 for a 0.5kg document to any major city worldwide.<br><br>
Through our sub offices and partners in strategic locations worldwide including China, Kenya, India, Tanzania, Pakistan, United States, Egypt, Morocco, United Arab Emirates, Russia, Canada, Brazil, Argentina, Sudan, Switzerland, Japan, Germany, Australia, Sweden, Netherlands, Norway, New Zealand, France, Denmark, Finland, Singapore, Italy, Austria, Spain, South Korea, Luxembourg, Portugal, Thailand, Greece, Qatar, Saudi Arabia, Malaysia, Mexico, Poland, Turkey, Ghana and South Africa.; we aim to provide clients with the complete package for all their logistical requirements.


@endsection
@section('service_image')
{{ URL::asset('assets/img/block/Door-2-Door.jpg') }}
@endsection
@include('front.pages_part.servicepart')
    <!-- More About Us -->
    <section class="pad-30 more-about-wrap">
        <div class="theme-container container pb-100">               
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                    <div class="more-about clrbg-before" style="margin-bottom: 10px">
                        <h2 class="title-1">Domestic</h2>
                        <div class="pad-10"></div>
                        <p>
                            With the cheapest rates for parcels due to the volume that we send with local couriers such as APC, DPD, Parcelforce, TNT and UPS; we can provide the most competitive rates for your local deliveries. Parcels sent can be tracked and insured to provide peace of mind. For corporate customers, we can provide a tailored rate card and booking system providing an easy booking procedure, trackable facility and raising any queries.<br><br>
                            We provide services Nationally including in London, Leicester, Birmingham, Coventry, Nottingham, Bradford, Bristol, Derby, Edinburgh, Sheffield, Liverpool, Newcastle, Oxford, Peterborough, Portsmouth, Wolverhampton, York, Leeds, Manchester.
                        </p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- /.More About Us -->
 

@endsection
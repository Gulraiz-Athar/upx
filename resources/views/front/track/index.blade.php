@extends('front.layout.app')

@section('content')

@section('pageTitle', 'Tracking')

@section('heading', 'Parcel Tracking')

@section('body', 'Track your Parcel & see the current condition')

@include('front.pages_part.breadcrumb')

<!-- Tracking -->

<section class="pt-50 pb-120 tracking-wrap">

   <div class="theme-container container ">

      <div class="row pad-10">

         <div class="col-md-8 col-md-offset-2 tracking-form wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">

            <h2 class="title-1"> track your Parcel </h2>

            <span class="font2-light fs-12">Now you can track your Parcel easily</span>

            <div class="row">

               <form action="{{ route('find.track') }}" method="POST">

                  {{ csrf_field() }}

                  <div class="col-md-7 col-sm-7">

                     <div class="form-group">

                        <input type="text" placeholder="Enter Your Tracking Number" required="" class="form-control box-shadow" name="tract_number" value="{{ $id }}" style="color: #000;">

                     </div>

                  </div>

                  <div class="col-md-5 col-sm-5">

                     <div class="form-group">

                        <button class="btn-1">track your Parcel</button>

                     </div>

                  </div>

               </form>

            </div>

         </div>

      </div>

      @if(!empty($booking))

      <div class="row">

         <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s">

            <div class="col-md-12">

               <!-- The time line -->

               <ul class="timeline">

                  <!-- timeline time label -->

                  <li class="time-label">

                     <span class="bg-red">

                     {{ date('d M Y',strtotime($booking->created_at)) }}

                     </span>

                  </li>

                  <!-- /.timeline-label -->

                  

                  @if(!empty($booking->logs))

                    @foreach($booking->logs as $logs)

                    <!-- timeline item -->

                  <li>

                    @php 

                        $icons = array('fa-ship','fa-truck','fa-train','fa-user');

                        $randIndex = array_rand($icons);

                         @endphp

                     <i class="fa {{ $icons[$randIndex] }} bg-aqua"></i>

                     <div class="timeline-item">



                        <span class="time"><i class="fa fa-clock-o"></i> {{ time_elapsed_string(strtotime($logs->created_at)) }}</span>

                        <h3 class="timeline-header no-border">Your order is  {{ $logs->status }} at {{ date('d M Y H:i A',strtotime($logs->created_at))}}</h3>

                     </div>

                  </li>

                  <!-- END timeline item -->

                      

                    @endforeach

                  @endif

                  

                 

                 

               </ul>

            </div>

         </div>

         <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">

            <div class="prod-info white-clr">

               <ul>

                  <li> <span class="title-2">Package Type:</span> <span class="fs-16">{{ $booking->package_type }}</span> </li>

                   @if (!empty($booking->forwarded_to))
                  <li> <span class="title-2">Forwarded to:</span> <span class="fs-16">{{ $booking->forwarded_to }}</span> </li>
                  @endif
                  @if (!empty($booking->forwarded_to_tracking_num))
                  <li> <span class="title-2">Forwarded Company Tracking Number:</span> <span class="fs-16">{{ $booking->forwarded_to_tracking_num }}</span> </li>
                  @endif

                   @if (!empty($booking->booking_instruction))
                  <li> <span class="title-2">Notes:</span> <span class="fs-16">{{ $booking->booking_instruction }}</span> </li>
                  @endif
                  
                  <li> <span class="title-2">Tracking Number:</span> <span class="fs-16">{{ $booking->tracking_number }}</span> </li>

                  <li> <span class="title-2">order date:</span> <span class="fs-16">{{ date('d M Y',strtotime($booking->created_at)) }}</span> </li>

                  <li> <span class="title-2">Current status:</span> <span class="fs-16 theme-clr">{{ $booking->logstatus->status }}</span> </li>

                  <li> <span class="title-2">weight (kg):</span> <span class="fs-16">{{ max($booking->actual_weight,$booking->volumetric_weight) }} KG</span> </li>

                  <li> <span class="title-2">Quantity:</span> <span class="fs-16">{{ $booking->dimentions_count }} </span> </li>

                  <li> <span class="title-2">Receiver Country:</span> <span class="fs-16">{{ $booking->addressesreceiver->country->name }} </span> </li>

               </ul>

            </div>

         </div>

      </div>

      @else

      @if($id != '')

      <section class="pt-50 pb-120 error-wrap">

         <div class="theme-container container text-center">

            <p class="fs-20">No result found for your UPX query. Please try again. </p>

            <h3 class="no-margin pt-10"> <a href="{{ url('/') }}" class="title-1"> <i class="arrow_left fs-20"></i> go back to home </a> </h3>

         </div>

      </section>

      @endif

      @endif

   </div>

</section>

<!-- /.Tracking -->

@endsection
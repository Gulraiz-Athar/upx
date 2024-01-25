@extends('front.layout.app')
@section('content')
@section('pageTitle', 'Home')
<!-- Content Wrapper -->

   <!-- Banner -->
   <section class="banner mask-overlay pad-120 white-clr">
      <div class="container theme-container rel-div">
         <img class="pt-10 effect animated fadeInLeft" alt="" src="{{ URL::asset('assets/img/icons/icon-1.png') }}" />
         <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
            <li>fast</li>
            <li>secured</li>
            <li>worldwide</li>
         </ul>
         <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">Door 2 Door <br>   Send <span class="theme-clr"> document </span> worldwide here </h2>
      </div>
      <div class="pad-50 visible-lg"></div>
   </section>
   <!-- /.Banner -->
   <!-- Track Product -->
   <section>
      <div class="theme-container container">
         <div class="row">
            <div class="col-md-8 col-md-offset-2 track-prod clrbg-before wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
               <h2 class="title-1"> track your Parcel </h2>
               <span class="font2-light fs-12">Now you can track your Parcel easily</span>
               <div class="row">
                  <form action="{{ route('find.track') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="col-md-7 col-sm-7">
                        <div class="form-group">
                           <input type="text" name="tract_number" placeholder="Enter your Tracking Number" required="" class="form-control box-shadow">
                        </div>
                     </div>
                     <div class="col-md-5 col-sm-5">
                        <div class="form-group">
                           <button type="submit" class="btn-1">track your Parcel</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.Track Product -->
   
   @include('front.pages_part.aboutpart')
   @include('front.pages_part.calculate')
   @include('front.pages_part.steps')
   <!-- Product Delivery -->
   <section class="prod-delivery pad-120">
      <div class="theme-container container">
         <div class="row">
            <div class="col-md-11 col-md-offset-1">
               <div class="pt-120 rel-div">
                  <div class="pb-50 hidden-xs"></div>
                  <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Get the <span class="theme-clr"> fastest </span> product delivery </h2>
                  <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam <br>
                     nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam <br>
                     erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci <br>
                     tation ullamcorper suscipit lobortis nisl ut aliquip.
                  </p>
                  <div class="pb-120 hidden-xs"></div>
               </div>
               <div class="delivery-img pt-10">
                  <img alt="" src="{{ URL::asset('assets/img/block/delivery.png') }}" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s"/>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /.Product Delivery -->
   @include('front.pages_part.testimonial')
   <!-- Contact us -->
   <section class="contact-wrap pad-120">
      <span class="bg-text wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> Contact </span>
      <div class="theme-container container">
         <div class="row">
            <div class="col-md-6 col-sm-8">
               <div class="title-wrap">
                  <h2 class="section-title wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">contact us</h2>
                  <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s" >Get in touch with us easiky</p>
               </div>
               <ul class="contact-detail title-2">
                  <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                     <span>uk numbers:</span> 
                     <p class="gray-clr"> +0116-326-7812 <br> +0116-319-4920 </p>
                  </li>
                 
                  <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                     <span>Email address:</span> 
                     <p class="gray-clr"> support@upx-uk.com <br> info@upx-uk.com </p>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <!-- /.Contact us -->

<!-- /.Content Wrapper -->
@endsection
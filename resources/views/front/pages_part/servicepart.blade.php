<!-- About Us -->
   <section class="pad-80 about-wrap clrbg-before leftRedStrip" >
      <span class="bg-text wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> service </span>
      <div class="theme-container container">
         <div class="row">
            <div class="col-md-6">
               <div class="about-us" style="margin-top: 17px;!important">
                  <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">@yield('service_description')
                     <p>
              
                  {{-- <ul class="feature">
                     <li>
                        <img alt="" src="{{ URL::asset('assets/img/icons/icon-2.png') }}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                           <h2 class="title-1">Fast delivery</h2>
                           <p>Duis autem vel eum iriure dolor</p>
                        </div>
                     </li>
                     <li>
                        <img alt="" src="{{ URL::asset('assets/img/icons/icon-3.png') }}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                           <h2 class="title-1">secured service</h2>
                           <p>Duis autem vel eum iriure dolor in hendrerit</p>
                        </div>
                     </li>
                     <li>
                        <img alt="" src="{{ URL::asset('assets/img/icons/icon-4.png') }}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s">
                           <h2 class="title-1">worldwide shipping</h2>
                           <p>Eum iriure dolor in hendrerit in vulputa</p>
                        </div>
                     </li>
                  </ul> --}}
               </div>
            </div>
            <div class="col-md-6 text-center">
               <div class="pb-80 visible-lg"></div>
               <img alt="" src="@yield('service_image')" class="wow slideInRight" data-wow-offset="50" data-wow-delay=".20s" />
               {{-- <img alt="" src="{{ URL::asset('assets/img/block/about-img.png') }}" class="wow slideInRight" data-wow-offset="50" data-wow-delay=".20s" /> --}}
            </div>
         </div>
      </div>
   </section>
   <!-- /.About Us -->
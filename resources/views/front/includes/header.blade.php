<!-- Header -->

            <header class="header-main">



                <!-- Header Topbar -->

                <div class="top-bar font2-title1 white-clr">

                    <div class="theme-container container">

                        <div class="row">



                            <div class="col-md-12 col-sm-12 fs-12">



<div class="flagAdded">





<div class="falgDv">



<img src="{{ URL::asset('assets/img/modified/new_flags.png') }}">



</div>



                                <p class="contact-num">  <i class="fa fa-phone"></i> Call us now: <span class="theme-clr"> +44 (0) 116 326 7812 | +44 (0) 116 319 4920  </span> </p>





<div class="socialIconTop">

                   <ul class="social-icons list-inline">

                  <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a target="_blank" href="https://www.facebook.com/upxuk" class="fa fa-facebook"></a> </li>

                  <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a target="_blank" href="https://twitter.com/UPX95159082" class="fa fa-twitter"></a> </li>



                  <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a target="_blank" href="https://www.linkedin.com/in/upx-uk-6134881b8/" class="fa fa-linkedin"></a> </li>

               </ul>



</div>







                                 </div>

                            </div>

                        </div>

                    </div>

                    <a target="_blank"  href="{{ route('login') }}" class="sign-in fs-12 theme-clr-bg"> Log in </a>

                </div>

                <!-- /.Header Topbar -->



                <!-- Header Logo & Navigation -->

                <nav class="menu-bar font2-title1">

                    <div class="theme-container container">

                        <div class="row">

                            <div class="col-md-2 col-sm-2">

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">

                                    <span class="sr-only">Toggle navigation</span>

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>

                                </button>

                                <a class="navbar-logo" href="{{ url('/') }}"> <img src="{{ URL::asset('public/images/logo/logo.png') }}" height="80px" width="auto" alt="logo" /> </a>

                            </div>



                            <div class="col-md-10 col-sm-10 fs-12">

                                <div id="navbar" class="collapse navbar-collapse no-pad">

                                    <ul class="navbar-nav theme-menu">

                                        <li class="@if(Route::is('home')) {{ 'active' }} @endif"><a href="{{ route('home') }}">Home</a></li>



                                           <li class="dropdown @if(Route::is('service.air_freight') || 

                                           Route::is('service.sea_freight') || 

                                           Route::is('service.road_freight') || 

                                           Route::is('service.storage_and_warehousing') || 

                                           Route::is('service.customs_clearance') || 

                                           Route::is('service.door_to_door') || 

                                           Route::is('service.d2d_India') || 

                                           Route::is('service.d2d_pakistan') || 

                                           Route::is('service.d2d_tanzania') || 

                                           Route::is('service.d2d_kenya') || 

                                           Route::is('service.parcels_courier') || 

                                           Route::is('service.d2d_srilanka') || 

                                           Route::is('service.d2d_bangladesh') || 

                                           Route::is('service.d2d_malawi')) {{ 'active' }} @endif"> <a data-toggle="dropdown" class="dropdown-toggle" a href="#">services <b class="caret"></b></a>

                                                <ul class="dropdown-menu">

                                                <li><a href="{{ route('service.air_freight') }}">AIR FREIGHT</a></li>

                                                <li><a href="{{ route('service.sea_freight') }}">SEA FREIGHT</a></li>

                                                <li><a href="{{ route('service.road_freight') }}">ROAD FREIGHT</a></li>

                                                <li><a href="{{ route('service.storage_and_warehousing') }}">STORAGE & WAREHOUSING</a></li>

                                                <li><a href="{{ route('service.customs_clearance') }}">CUSTOMS CLEARANCE</a></li>

                                                <li><a href="{{ route('service.parcels_courier') }}">PARCELS & COURIER</a></li>

                                                <li><a href="{{ route('service.door_to_door') }}">DOOR TO DOOR</a></li>

                                                <li><a href="{{ route('service.d2d_India') }}">D2D INDIA</a></li>

                                                <li><a href="{{ route('service.d2d_pakistan') }}">D2D PAKISTAN</a></li>

                                                <li><a href="{{ route('service.d2d_tanzania') }}">D2D TANZANIA</a></li>

                                                <li><a href="{{ route('service.d2d_kenya') }}">D2D KENYA</a></li>

                                                <li><a href="{{ route('service.d2d_malawi') }}">D2D MALAWI</a></li>

                                                <li><a href="{{ route('service.d2d_srilanka') }}">D2D SRI LANKA</a></li>

                                                <li><a href="{{ route('service.d2d_bangladesh') }}">D2D BANGLADESH</a></li>



                                                </ul>

                                                </li>

                                         <li class="@if(Route::is('aboutus')) {{ 'active' }} @endif"><a href="{{ route('aboutus') }}"> about us</a> </li>

                                        <li class="@if(Route::is('quote')) {{ 'active' }} @endif"><a href="{{ route('quote') }}">QUOTE</a></li>

                                        <li class="@if(Route::is('track')) {{ 'active' }} @endif"><a href="{{ route('track') }}"> tracking </a> </li>

                                        <li class="@if(Route::is('contact')) {{ 'active' }} @endif"><a href="{{ route('contact') }}"> Contact Us </a> </li>











                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </nav>

                <!-- /.Header Logo & Navigation -->



            </header>

            <!-- /.Header -->


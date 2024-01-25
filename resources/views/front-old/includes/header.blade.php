<!-- Header -->
            <header class="header-main">

                <!-- Header Topbar -->
                <div class="top-bar font2-title1 white-clr">
                    <div class="theme-container container">
                        <div class="row">
                            
                            <div class="col-md-12 col-sm-7 fs-12">
                                <p class="contact-num">  <i class="fa fa-phone"></i> Call us now: <span class="theme-clr"> +0116-326-7812 | +0116-319-4920 </span> </p>
                            </div>
                        </div>
                    </div>
                    <a target="_blank"  href="{{ route('login') }}" class="sign-in fs-12 theme-clr-bg"> sign in </a>
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
                                <a class="navbar-logo" href="{{ url('/') }}"> <img src="{{ URL::asset('public/images/logo/logo.png') }}" height="70px" width="auto" alt="logo" /> </a>
                            </div>
                            
                            <div class="col-md-10 col-sm-10 fs-12">
                                <div id="navbar" class="collapse navbar-collapse no-pad">
                                    <ul class="navbar-nav theme-menu">
                                        <li class="@if(Route::is('home')) {{ 'active' }} @endif"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="@if(Route::is('quote')) {{ 'active' }} @endif"><a href="{{ route('quote') }}">QUOTE</a></li>
                                        <li class="@if(Route::is('track')) {{ 'active' }} @endif"><a href="{{ route('track') }}"> tracking </a> </li>
                                        <li class="@if(Route::is('contact')) {{ 'active' }} @endif"><a href="{{ route('contact') }}"> Contact Us </a> </li>

                                        <li class="@if(Route::is('aboutus')) {{ 'active' }} @endif"><a href="{{ route('aboutus') }}"> about us</a> </li>
                                        
                                        
                                       
                                    </ul>                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /.Header Logo & Navigation -->

            </header>
            <!-- /.Header -->
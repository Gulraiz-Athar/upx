<style type="text/css">
  .header_logo{
    max-width: 150px;
  }
</style>
  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UPX</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="header_logo" src="{{ URL::asset('public/images/users_logos/'.GetMyLogo()) }}" height="75px" width="auto"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
         
              @php $image = url('public/images/users/default.png'); @endphp

              @if(!empty(auth()->user()->image) && auth()->user()->image !== null)

              @php $image = url('public/images/users/'.auth()->user()->image); @endphp
              @endif

          @if(auth()->user()->role == 'agent')
          <li class="dropdown user user-menu">
           <?php 

            $duaamount = auth()->user()->unpaidbokings->sum('final_agent_price');
            $limitamout = auth()->user()->booking_limit;

            ?>
            <a class="dropdown-toggle">Due Amount : <b>  @if($limitamout < $duaamount) <span style="color: red"> &#163; {{ $duaamount }} </span> @else  &#163; {{ $duaamount }}  @endif</b> </a>
          </li>
          <li class="dropdown user user-menu">
            <a class="dropdown-toggle">Booking Limit : <b> &#163; {{ $limitamout  }} </b> </a>
          </li>
          <li class="dropdown user user-menu">
            <a class="dropdown-toggle">Wallet Amount : <b> &#163; {{ auth()->user()->wallet_amount  }} </b> </a>
          </li>
          @endif
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ $image }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
             
             <li class="user-header">
              
                <img src="{{ $image }}" class="img-circle" alt="User Image">

                <p>
                 {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    @if(auth()->user()->role == 'agent')
                    Agent User
                    @else
                    Admin User
                    @endif
                    
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                	<a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
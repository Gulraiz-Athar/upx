<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->

            <li class="{{ activeMenu('dashboard') }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('agent') }}">
                    <a href="{{ route('agent.index') }}">
                        <i class="fa fa-user"></i><span>Agents</span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('zone') }}">
                    <a href="{{ route('zone.index') }}">
                        <i class="fa fa-area-chart"></i><span> Zones</span>
                    </a>
                </li>
            @endif


            @if(checkPermission(['admin']))
            <!-- <li class="{{ activeMenu('weight') }}">
          <a href="{{ route('weight.index') }}">
            <i class="fa fa-adjust"></i><span>Weights</span>
          </a>
        </li> -->
            @endif

            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('price') }}">
                    <a href="{{ route('price.index') }}">
                        <i class="fa fa-money"></i><span> Price Slab</span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin','agent']))
                <li class="{{ activeMenu('addressbook') }}">
                    <a href="{{ route('addressbook.index') }}">
                        <i class="fa fa-address-card-o"></i><span> Address Books</span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin','agent']))
                <li class="{{ activeMenu('booking') }}">
                    <a href="{{ route('booking.index') }}">
                        <i class="fa fa-cube"></i><span> Booking</span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('bookinghistory') }}">
                    <a href="{{ route('bookinghistory.index') }}">
                        <i class="fa fa-history" aria-hidden="true"></i><span> Booking History  </span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['agent']))
                <li class="{{ activeMenu('agentbookinghistory') }}">
                    <a href="{{ route('agentbookinghistory.index') }}">
                        <i class="fa fa-history" aria-hidden="true"></i><span> Booking History </span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin','agent']))


                <li class="{{ activeMenu('paymenthistory') }}">
                    <a href="{{ route('paymenthistory.index') }}">
                        <i class="fa fa-money" aria-hidden="true"></i><span> Payment History  <span class="count_my"
                                                                                                    style="background-color: #3c8dbc; padding: 3px 8px;border-radius: 50%;"> @if(auth()->user()->role == 'agent') {{ auth()->user()->unreadpayment()->count() }} @else {{ CountPaymentUnreadAdmin() }} @endif  </span></span>
                    </a>
                </li>
            @endif

            @if(checkPermission(['admin','agent']))
            <li class="{{ activeMenu('report') }}">
                <a href="{{ route('report.index') }}">
                    <i class="fa fa-bar-chart"></i><span>Report</span>
                </a>
            </li>
        @endif


            @if(checkPermission(['agent']))
                <li class="{{ activeMenu('wallet') }}">
                    <a href="{{ route('wallet.index') }}">
                        <i class="fa fa-google-wallet" aria-hidden="true"></i><span> Wallet</span>
                    </a>
                </li>
            @endif
            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('contact') }}">
                    <a href="{{ route('contact.index') }}">
                        <i class="fa fa-phone" aria-hidden="true"></i><span> Contact Us</span>
                    </a>
                </li>
            @endif
            @if(checkPermission(['admin']))
                <li class="{{ activeMenu('inquiry') }}">
                    <a href="{{ route('inquiry.index') }}">
                        <i class="fa fa-inbox" aria-hidden="true"></i><span> Inquiry</span>
                    </a>
                </li>
        @endif
        <!-- @if(checkPermission(['admin']))
            <li class="{{ activeMenu('setting') }}">
          <a href="{{ route('setting.index') }}">
            <i class="fa fa-cog" aria-hidden="true"></i><span> Setting</span>
          </a>
        </li>
        @endif -->


            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i><span> Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>


            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

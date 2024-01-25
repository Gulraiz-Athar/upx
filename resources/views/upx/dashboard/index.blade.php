@extends('layouts.app')
@section('content')
@section('pageTitle', 'Dashboard')


     @include('upx.includes.topbar')
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @if(Auth::user()->role == 'admin')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $agents }}</h3>
              <p>Total Agents</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('agent.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $bookings }}</h3>

              <p>Total Bookings</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="@if(auth()->user()->role == 'agent') {{ route('agentbookinghistory.index') }}  @else {{ route('bookinghistory.index') }} @endif" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         @if(Auth::user()->role == 'admin')
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $zones }}</h3>

              <p>Total Zones</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('zone.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        @endif
        

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $addresses }}</h3>

              <p>Total Addresses</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('addressbook.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->

       <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Recent Bookings</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table id="agents" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Current Status</th>
                        <th>Package Type</th>
                        <th>Quantity<br>Weight<br>Quoted</th>
                        <th>Tracking Number</th>
                        <th>Booking Date</th>
                        @if(auth()->user()->role == 'admin')
                        <th>Booked By</th>
                         @endif
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @if(!empty($booking) && count($booking) > 0)

                      @php $i = 1; @endphp
                      @foreach($booking as $book)

                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $book->logstatus->status }}</td>
                        <td>{{ $book->package_type }}</td>
                        <td> {{ $book->dimentions_count }} <br>{{ max($book->actual_weight,$book->volumetric_weight) }} Kg <br>&#163 {{ $book->final_upx_price }}</td>
                        
                       <td>{{ $book->tracking_number }}</td>
                        <td>{{ date('d M Y',strtotime($book->created_at)) }} </td>
                         @if(auth()->user()->role == 'admin')
                        <td>{{ $book->createdby->name }} {{ $book->createdby->lastname }}</td>
                        @endif
                        
                        <td><a href="{{ route('bookinghistory.show',[$book->id]) }}" ><span class="fa fa-eye"></span></a></td>
                    </tr>
                      @php $i++ @endphp
                      @endforeach
                    @else
                    <tr>
                      <td colspan="10" style="text-align: center;">No data available in table</td>
                    </tr>
                    @endif
                    
                  </tbody>
               </table>
            </div>
           
          </div>
          <!-- /.row -->
        </div>
       
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
    
@endsection
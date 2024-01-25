@extends('layouts.app')
@section('content')
@section('pageTitle', 'Booking')

@include('upx.includes.topbar')
@php
    $return_id = $name = $lastname =  $email = $address1 = $address2 = $address3 = $country_id = $state =  $city = $postalcode = $phonenumber =  $company = $id_type = $id_number = "";
    if($booking->addressesreturn){
        $name = $booking->addressesreturn->name;
        $lastname = $booking->addressesreturn->lastname;
        $email = $booking->addressesreturn->email;
        $address1 = $booking->addressesreturn->address1;
        $address2 = $booking->addressesreturn->address2;
        $address3= $booking->addressesreturn->address3;
        $country_id = $booking->addressesreturn->country_id;
        $state = $booking->addressesreturn->state;
        $city = $booking->addressesreturn->city;
        $postalcode = $booking->addressesreturn->postalcode;
        $phonenumber = $booking->addressesreturn->phonenumber;
        $company = $booking->addressesreturn->company;
        $id_type = $booking->addressesreturn->id_type;
        $id_number = $booking->addressesreturn->id_number;
        $return_id = $booking->addressesreturn->id;
    }

@endphp
<style type="text/css">
    label.error {
        color: red;
        font-weight: 100;
    }

    input.error {
        outline: red !important;
        border-color: #ffb6b6 !important;

    }

    .field_wrapper label.error {
        display: none !important;
    }

    .weightunits.error ~ .mainlable {
        color: #red !important;
    }

    .weightunits.error ~ .extralable {
        color: #red !important;
    }

    .fieldbooking label.mainlable {
        left: 5px;
    }

    .is_insure {
        position: absolute;
        top: -20px;
        left: 35px;
    }

    .mainbookingdiv .fieldbooking {
        margin-top: 20px;
    }

    .weightunits {
        width: 95px !important;
    }

    .custom-list-group .list-group-item {
        padding: 0px 15px !important;
    }

    .custom-list-group .list-group-item.sub-padding {
        padding: 7px 15px !important;
    }
</style>
<section class="content">
    <div class="strolltop">
        <div class="alert alert-success successmessage" role="alert" style="display: none;">
            <h4 class="alert-heading">Success!</h4>
            <p>Your booking is successfully update!! <a
                    href="@if(auth()->user()->role == 'admin'){{ route('bookinghistory.index') }}@else {{ route('agentbookinghistory.index') }}  @endif">Click
                    here</a> for redirect to booking history page.


        </div>
    </div>
    <form action="{{ route('bookingpro.update',[$booking->id]) }}" method="post" class="bookingform"
          enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" class="booking_status" name="booking_status" value="0">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Make a booking</h3>

                    </div>
                    <div class="box-body">
                        <!------------------------------ Sender Detail --------------------------------------------------->
                        <div class="col-md-6 senderaddress">
                            <label>Sender </label>
                            <!-- <a style="margin-left: 5px; cursor: pointer;"   data-toggle="tooltip" class="save_sender" data-placement="right" title="Update your address"> <i class="fa fa-save" ></i></a><span class="senderspinner"></span> -->
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <input type="hidden" name="sender_id" value="{{$booking->addressessender->id}}">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country <span
                                        style="color: red;">*</span></label>
                                <select class="form-control sendercountry select2" name="coutry_s" style="width: 100%;">
                                    @if(!empty($countries))
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->id }}" @if($country->id == $booking->addressessender->country_id) {{ 'selected' }} @endif>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control first_name_s" name="first_name_s"
                                               placeholder="First Name" value="{{ $booking->addressessender->name}}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Last Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control last_name_s" name="last_name_s"
                                               placeholder="Last Name" value="{{ $booking->addressessender->lastname}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope"></i> Email <span
                                                style="color: red;">*</span></label>
                                        <input type="email" class="form-control email_s" name="email_s"
                                               placeholder="Email" value="{{ $booking->addressessender->email}}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company </label>
                                        <input type="text" class="form-control company_s" name="company_s"
                                               placeholder="Company" value="{{ $booking->addressessender->company}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control phone_s" name="phone_s"
                                               placeholder="Phone" value="{{ $booking->addressessender->phonenumber}}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-address-card-o"></i> Address Line 1 <span
                                                style="color: red;">*</span></label>
                                        <textarea class="form-control address1_s" name="address1_s"
                                                  required
                                                  value="{{ $booking->addressessender->address1}}">{{ $booking->addressessender->address1}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <textarea class="form-control address2_s" name="address2_s"
                                                  placeholder="Address2"
                                                  value="{{ $booking->addressessender->address2}}">{{ $booking->addressessender->address2}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" placeholder="Address Line 3" class="form-control address3_s"
                                               name="address3_s"
                                               value="{{ $booking->addressessender->address3}}">
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-map-pin" aria-hidden="true"></i> Postal Code <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control postal_code_s" name="postal_code_s"
                                               placeholder="Postal Code"
                                               value="{{ $booking->addressessender->postalcode}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control state_s" name="state_s"
                                               value="{{ $booking->addressessender->state}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_s"
                                               value="{{ $booking->addressessender->city}}" name="city_s"
                                               placeholder="City"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-id-badge" aria-hidden="true"></i> VAT Number</label>
                                        <input type="text" class="form-control vat_number" name="vat_number"
                                               placeholder="VAT Number" value="{{ $booking->addressessender->vat_number}}" maxlength="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            <i class="fa  fa-info-circle" aria-hidden="true"></i> ID Type
                                        </label>
                                        @php
                                            $b_id_type = $booking->addressessender->id_type;    
                                        @endphp
                                        <select class="form-control id_type_s" name="id_type_s"
                                                placeholder="Type of ID Number" required>
                                            <option value="">Select type</option>
                                            <option value="Driving License"
                                                    @if($booking->addressessender->id_type == 'Driving License') selected @endif>
                                                Driving License
                                            </option>
                                            <option value="Social Security number"
                                                    @if($booking->addressessender->id_type == 'Social Security number') selected @endif>
                                                Social Security number
                                            </option>
                                            <option value="Passport" @if($booking->addressessender->id_type == 'Passport') selected @endif>
                                                Passport
                                            </option>
                                            <option value="Other"  @if($b_id_type != 'Pan card' && $b_id_type != 'Driving License' && $b_id_type != 'Passport') selected @endif>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="otheridtype"></div>

                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-book" aria-hidden="true"></i> ID Number </label>
                                        <input type="text" class="form-control id_number_s" name="id_number_s"
                                               value="{{ $booking->addressessender->id_number}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-image" aria-hidden="true"></i> Document </label>
                                        <input type="file" class="image_s" name="image_s" placeholder="Upload Document">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------- Sender Detail ------------------------------------------------>
                        <!-------------------------------------- Receiver Detail -------------------------------------------------->
                        <div class="col-md-6 receiveraddress">
                            <label>Receiver </label>
                            <!--  <a style="margin-left: 5px; cursor: pointer;" class="save_receiver"  data-toggle="tooltip" data-placement="right" title="Save to Address Book"> <i class="fa fa-save" ></i></a> <span class="receiverspinner"></span> -->
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <input type="hidden" name="receiver_id" value="{{$booking->addressesreceiver->id}}">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country</label>
                                <select class="form-control select2 receivercountry" name="country_r"
                                        style="width: 100%;">
                                    @if(!empty($receivecountries))
                                        @foreach($receivecountries as $country)
                                            <option
                                                value="{{ $country->id }}" @if($country->id == $booking->addressesreceiver->country_id) {{ 'selected' }} @endif>{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Full Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control searchauto full_namer" name="full_name_r"
                                               placeholder="Full Name"
                                               value="{{$booking->addressesreceiver->name.' '.$booking->addressesreceiver->lastname}}"
                                               required>
                                    </div>
                                </div>

                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope"></i> Email</label>
                                        <input type="email" class="form-control email_r" name="email_r"
                                               value="{{$booking->addressesreceiver->email}}">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company</label>
                                        <input type="text" class="form-control company_r" name="company_r"
                                               value="{{$booking->addressesreceiver->company}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone </label>
                                        <input type="text" class="form-control phone_r" name="phone_r"
                                               value="{{$booking->addressesreceiver->phonenumber}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><i class="fa fa-address-card-o"></i> Address Line 1 <span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control address1_r" name="address1_r" placeholder="Address Line 1"
                                          required
                                          value="{{$booking->addressesreceiver->address1}}">{{$booking->addressesreceiver->address1}}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <input type="text" class="form-control address2_r" name="address2_r"
                                               value="{{$booking->addressesreceiver->address2}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" class="form-control address3_r" name="address3_r"
                                               value="{{$booking->addressesreceiver->address3}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-map-pin" aria-hidden="true"></i> Postal Code <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control postal_code_r" name="postal_code_r"
                                               placeholder="Postal Code"
                                               value="{{$booking->addressesreceiver->postalcode}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control state_r" name="state_r"
                                               value="{{$booking->addressesreceiver->state}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_r" name="city_r" placeholder="City"
                                               required value="{{$booking->addressesreceiver->city}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-------------------------------- Receiver Detail ----------------------------------------->
                        <!---------------------------------- Check box --------------------------------------------->
                        <div class="checkbox checkboxclass">
                            <div class="col-md-6">
                                <label style="margin-top: 15px;">
                                    <input type="checkbox" value="1" name="return_address" class="checkreturn"
                                           @if(!empty($booking->addressesreturn)) checked @endif>
                                    Return address is different from sender address.
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-top: 15px;">
                                    <input type="checkbox" value="1" name="mail_notify"
                                           @if($booking->mail_notify == 1) checked @endif> Send notification email to
                                    Sender and Receiver.
                                </label>
                            </div>
                        </div>
                        <!--------------------------------- Check box ----------------------------------------------->
                        <!-------------------------------- Return address Detail ----------------------------------->
                        <div
                            class="col-md-6 return_address @if(!empty($booking->addressesreturn)) {{ 'displayblock' }} @endif">
                            <label>Return Address</label>
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <input type="hidden" name="return_id" value="{{$return_id}}">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country</label>
                                <select class="form-control select2" name="country_d" style="width: 100%;">
                                    @if(!empty($countries))
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                    @if($country->id == $country_id) selected @endif>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control first_name_d" name="first_name_d"
                                               placeholder="First Name" required value="{{$name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Last Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control last_name_d" name="last_name_d"
                                               placeholder="Last Name" value="{{$lastname}}" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope"></i> Email <span
                                                style="color: red;">*</span></label>
                                        <input type="email" class="form-control email_d" name="email_d"
                                               placeholder="Email" required value="{{$email}}">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control company_d" name="company_d"
                                               placeholder="Company" value="{{$company}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control phone_d" name="phone_d"
                                               placeholder="Phone" required value="{{$phonenumber}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><i class="fa fa-address-card-o"></i> Address1 <span style="color: red;">*</span></label>
                                <textarea class="form-control address1_d" name="address1_d" placeholder="Address1"
                                          required value="{{$address1}}">{{$address1}}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <input type="text" class="form-control" name="address2_d"
                                               value="{{$address2}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" class="form-control" name="address3_d"
                                               value="{{$address3}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-map-pin" aria-hidden="true"></i> Postal Code <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control postal_code_d" name="postal_code_d"
                                               placeholder="Postal Code" required value="{{$postalcode}}">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control" name="state_d"
                                               value="{{$state}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_d" name="city_d" placeholder="City"
                                               required value="{{$city}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!---------------------------------Return address Detail ------------------------------------------->
                    </div>
                </div>
            </div>
            <div class="col-md-3 loadprice" style="padding-left: 0px;">
                <div class="box box-primary">
                    <ul class="list-group mb-3 custom-list-group">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Total Quantity</h6>

                            </div>
                            <span class="text-muted">{{ count($booking->dimentions) }}</span>
                        </li>
                        @if($booking->service_id == 1 || $booking->service_id == 2)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Volumetric weight</h6>

                                </div>
                                <span class="text-muted">{{ $booking->volumetric_weight }}Kg</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Actual Weight</h6>
                            </div>
                            <span class="text-muted">{{ $booking->actual_weight }}Kg</span>
                        </li>

                        @if($booking->service_id == 1 || $booking->service_id == 2)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Consignment AMT</h6>
                                </div>
                                <strong> &#163; {{ $booking->final_consignment_amt }}  </strong>
                            </li>

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Insure AMT</h6>
                                </div>
                                <strong> &#163; {{ $booking->final_insure_amt }}  </strong>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Package AMT</h6>

                            </div>
                            <strong>&#163; {{ $booking->upx_price }}  </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Handling Price</h6>

                            </div>
                            <strong> &#163; {{ $booking->handling_price }}  </strong>
                        </li>
                        @if(isset($error))
                            <li class="list-group-item d-flex justify-content-between">
                                <h6 class="my-0" style="color: red">{{ $msg }}</h6>
                            </li>
                        @else
                            <li class="list-group-item sub-padding d-flex justify-content-between">
                                <div>
                                    <span>Total (GBP) : </span>
                                    <strong>&#163;
                                        {{ round($booking->final_upx_price,2) }}
                                        {{--@if(Auth::user()->role == 'agent')
                                            {{ round($booking->final_agent_price,2) }}
                                        @else
                                            {{ round($booking->final_upx_price,2) }}
                                        @endif--}}
                                    </strong>
                                </div>
                            </li>
                            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                                <div class="row">
                                    <span class="col-lg-3 col-form-label">Discount</span>
                                    <div class="col-lg-6">
                                        <input type="text" name="discount_amt" id="discount_amt" class="form-control"
                                               value="{{ $booking->discount_amt }}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                                <div class="row">
                                    <span class="col-lg-7 col-form-label">Packaging Charge</span>
                                    <div class="col-lg-5">
                                        <input type="text" name="packing_charge_amt"
                                               class="form-control packing_charge_amt" id="packing_charge_amt"
                                               value="{{ $booking->packing_charge_amt }}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item sub-padding d-flex justify-content-between lh-condensed">
                                <div class="row">
                                    <span class="col-lg-7 col-form-label">Duties and Taxes </span>
                                    <div class="col-lg-5">
                                        <input type="text" name="tax_amt" class="form-control tax_amt" id="tax_amt"
                                               value="{{ $booking->tax_amt }}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item sub-padding d-flex justify-content-between">
                                <div>
                                    <span>Sub Total (GBP) : </span>
                                    <strong>&#163; <span id="subtotal">{{ round($booking->final_total_upx,2) }}</span>
                                    </strong>
                                </div>
                            </li>
                            <li class="list-group-item sub-padding d-flex justify-content-between">
                                @if(isset($book) && $book== 0)
                                    <span
                                        style="color: red">You have exceeded the booking limit  &#163; {{ auth()->user()->booking_limit }}</span>
                                @else
                                    <button class="btn btn-primary bookingbutton" type="submit"><i
                                            class="fa fa-bookmark"
                                            aria-hidden="true"></i> Book <span
                                            class="bookingspin"></span></button>
                                @endif

                            </li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
        <!-------------------------------Booking Detail -------------------------------------------------->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Booking Detail</h3>

                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Service </label>
                                            <select name="service_id" class="form-control service_id" id="service_id"
                                                    required>

                                                @if(!empty($services))
                                                    @foreach($services as $service)
                                                        <option value="{{$service->id}}"
                                                                @if($booking->service_id == $service->id) selected @endif>{{$service->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @php
                                        $bookingdisplay ='none';
                                        $documentdisplay ='show';
                                        if($booking->service_id == '1'){
                                            $bookingdisplay ='show';
                                            $documentdisplay ='none';
                                        }
                                    @endphp
                                    <div class="col-md-2" id="service_type_div" style="display: {{$bookingdisplay}}">
                                        <div class="form-group">
                                            <label for="">Service Type </label>
                                            <select name="service_type" class="form-control">
                                                <option value="">Service Type</option>
                                                <option value="economy"
                                                        @if($booking->service_type == 'economy') selected @endif>Economy
                                                </option>
                                                <option value="express"
                                                        @if($booking->service_type == 'express') selected @endif>Express
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Type </label>
                                            <input type="text" class="form-control" name="package_type"
                                                   id="exampleInputEmail1" value="{{$booking->package_type}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="Payment_method_div">
                                        <div class="form-group">
                                            <label for="">Payment method </label>
                                            <select name="Payment_method" class="form-control Payment_method">
                                                <option value="">Payment Type</option>
                                                <option value="Cash"@if($booking->payment_method == 'Cash') selected @endif>Cash</option>
                                                <option value="Debit card"@if($booking->payment_method == 'Debit card') selected @endif>Debit card</option>
                                                <option value="Credit card"@if($booking->payment_method == 'Credit card') selected @endif>Credit card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Instruction </label>
                                            <textarea name="booking_instruction" style="width: 100%;"
                                                      value="{{$booking->booking_instruction}}">{{$booking->booking_instruction}}</textarea>
                                        </div>
                                    </div>

                                </div>


                                <div class="row field_wrapper">
                                    <div class="col-md-4 col-lg-offset-5">

                                    </div>
                                    @if($booking->service_id == '1' || $booking->service_id == '2')
                                        @if(count($booking->dimentions) > 0 )
                                            @foreach($booking->dimentions as $key=>$dimention)
                                                <div class="col-md-12 booking_div">
                                                    <div class="form-group mainbookingdiv">
                                                        <div class="fieldbooking">
                                                            <input type="text" class="weightunits " name="length[]"
                                                                   value="{{$dimention->lenth}}" required>
                                                            <label class="mainlable">Length</label>
                                                            <label class="extralable">Cm</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                            <input type="text" class="weightunits " name="width[]"
                                                                   value="{{$dimention->width}}" required>
                                                            <label class="mainlable">Width</label>
                                                            <label class="extralable">Cm</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                            <input type="text" class="weightunits " name="height[]"
                                                                   value="{{$dimention->height}}" required>
                                                            <label class="mainlable">Height</label>
                                                            <label class="extralable">Cm</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                            <input type="text" class="weightunits " name="kg[]"
                                                                   value="{{$dimention->weight}}" required>
                                                            <label class="mainlable">Weight</label>
                                                            <label class="extralable kilolb">Kg</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                            <input type="text"
                                                                   class="weightunits consignment consignment_1"
                                                                   data-id="1" name="consignment[]"
                                                                   value="{{$dimention->consignment_amt}}">
                                                            <label class="mainlable">Consignment</label>
                                                            <label class="currency_amt">GBP &#163;</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                            <input type="checkbox" class="is_insure is_insure_1"
                                                                   name="is_insure[]"
                                                                   data-id="1"
                                                                   @if($dimention->consignment_amt) checked @endif>
                                                            <input type="text" class="weightunits insureamt insureamt_1"
                                                                   name="insureamt[]"
                                                                   value="{{$dimention->insure_amt}}">
                                                            <label class="mainlable">Insure AMT</label>
                                                            <label class="currency_amt">GBP &#163;</label>
                                                        </div>
                                                        <div class="fieldbooking">
                                                <textarea type="text" class="weightunitsdec"
                                                          name="description[]"
                                                          value="{{$dimention->description}}">{{$dimention->description}}</textarea>
                                                            <label class="mainlable">Description</label>

                                                        </div>
                                                        @if($key == 0)
                                                            <a class="add_button" title="Add shipment package">
                                                                <i class="fa fa-plus-circle addiconclass"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a class="remove_button" title="Add shipment package">
                                                                <i class="fa fa-minus-circle removeiconclass"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                        @endif
                                    @else
                                        <div class="col-md-12 booking_div" style="display: none">
                                            <div class="form-group mainbookingdiv">
                                                <div class="fieldbooking">
                                                    <input type="text" class="weightunits error" name="length[]"
                                                           required>
                                                    <label class="mainlable">Length</label>
                                                    <label class="extralable">Cm</label>
                                                </div>
                                                <div class="fieldbooking">
                                                    <input type="text" class="weightunits error" name="width[]"
                                                           required>
                                                    <label class="mainlable">Width</label>
                                                    <label class="extralable">Cm</label>
                                                </div>
                                                <div class="fieldbooking">
                                                    <input type="text" class="weightunits error" name="height[]"
                                                           required>
                                                    <label class="mainlable">Height</label>
                                                    <label class="extralable">Cm</label>
                                                </div>
                                                <div class="fieldbooking">
                                                    <input type="text" class="weightunits error" name="kg[]" required>
                                                    <label class="mainlable">Weight</label>
                                                    <label class="extralable kilolb">Kg</label>
                                                </div>
                                                <div class="fieldbooking">
                                                    <input type="text" class="weightunits consignment consignment_1"
                                                           data-id="1" name="consignment[]">
                                                    <label class="mainlable">Consignment</label>
                                                    <label class="currency_amt">GBP &#163;</label>
                                                </div>
                                                <div class="fieldbooking">
                                                    <input type="checkbox" class="is_insure is_insure_1"
                                                           name="is_insure[]" data-id="1">
                                                    <input type="text" class="weightunits insureamt insureamt_1"
                                                           name="insureamt[]">
                                                    <label class="mainlable">Insure AMT</label>
                                                    <label class="currency_amt">GBP &#163;</label>
                                                </div>
                                                <div class="fieldbooking">
                                                <textarea type="text" class="weightunitsdec"
                                                          name="description[]"></textarea>
                                                    <label class="mainlable">Description</label>

                                                </div>
                                                <a class="add_button" title="Add shipment package"><i
                                                        class="fa fa-plus-circle addiconclass"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row document_field_wrapper">

                                    <div class="col-md-4 col-lg-offset-5">

                                    </div>
                                    @if($booking->service_id == '3')
                                        <div class="col-md-12" id="document_div" style="display: {{$documentdisplay}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Package : </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Description : </label>
                                                </div>
                                            </div>
                                            <div class="maindocumentdiv">

                                                @if(count($booking->dimentions) > 0 )
                                                    @foreach($booking->dimentions as $key => $dimention)
                                                        <div class="row">
                                                            <div class="col-md-3 form-group">
                                                                <select name="document_package_type[]"
                                                                        class="form-control">
                                                                    <option value="0.5"
                                                                            @if($dimention->weight == '0.5')selected @endif>
                                                                        0.5Kg
                                                                    </option>
                                                                    <option value="1"
                                                                            @if($dimention->weight == '1')selected @endif>
                                                                        1Kg
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                            <textarea type="text" class="form-control"
                                                                      value="{{$dimention->description}}"
                                                                      name="document_description[]">{{$dimention->description}}</textarea>
                                                            </div>
                                                            @if($key == 0)
                                                                <a class="add_document cursor-pointer"
                                                                   title="Add shipment package">
                                                                    <i class="fa fa-plus-circle addiconclass"
                                                                       aria-hidden="true"></i>
                                                                </a>
                                                            @else
                                                                <a class="remove_document_button"
                                                                   title="Remove shipment package"><i
                                                                        class="fa fa-minus-circle removeiconclass"
                                                                        aria-hidden="true"></i></a>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @endif


                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success calculationclick"><i class="fa fa-calculator "></i>
                            Calculate <span class="calculatespin"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------Booking Detail ------------------------------------------------>
    </form>
</section>
@php
    /*if(Auth::user()->role == 'agent'){
        $finalprice = round($finalagentprice,2);
    }*/
$finalprice = round($booking->final_upx_price,2);
@endphp
@push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@push('script')
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">


        $(document).ready(function () {
            idtype();
            $('body').on('click', '.bookingbutton', function () {
                $('.booking_status').val(1);
            });
            $('body').on('click', '.calculationclick', function () {
                $('.booking_status').val(0);
            });

            $('body').on('change', '.id_type_s', function () {
                idtype();
            });
            function idtype() {
                var select = $(".id_type_s").val()
                if (select == 'Other') {
                    $('.otheridtype').html(`<div class="col-md-6" >
                                    <div class="form-group">
                                        <label>
                                            <i class="fa  fa-info-circle" aria-hidden="true"></i> Other ID Type
                                        </label>
                                        <input class="form-control id_type_other_s" type="text" name="id_type_other_s" id="id_type_other_s" placeholder="Type of other ID" value="{{ $booking->addressessender->id_type }}">
                                     
                                    </div>
                                </div>`);
                }else {
                    $('.otheridtype').html('');
                }
            }

            $(".bookingform").validate({

                rules: {
                    postal_code_r: {
                        required: true,
                    },
                    postal_code_s: {
                        required: true,
                    },
                    id_type_s: {
                        required: true,
                    },
                    service_type: {
                        required: function (element) {
                            return $("#service_id").val() != "";
                        }
                    }
                }

            });
            $('body').on('submit', '.bookingform', function (e) {
                e.preventDefault();

                var booking_status = $('.booking_status').val();

                $.ajax({
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        if (booking_status == 1) {
                            $('.bookingspin').html('<i class="fa fa-spinner fa-spin"></i>');
                            // $('.bookingbutton').prop("disabled", true);
                        }
                        if (booking_status == 0) {
                            $('.calculatespin').html('<i class="fa fa-spinner fa-spin"></i>')
                        }
                    },
                    success: function (data) {


                        //  $('.bookingbutton').prop("disabled", false);
                        PNotify.removeAll();
                        $('.calculatespin').html('');
                        $('.bookingspin').html('');
                        if (data.status == 400) {
                            new PNotify({
                                title: 'Oh No!',
                                text: data.msg,
                                type: 'error'
                            });
                        }
                        if (data.status == 200) {
                            /*new PNotify({
                                title: 'Success!',
                                text: data.msg,
                                type: 'success'
                            });
                            setTimeout(function() {
                                var role = "{{ auth()->user()->role }}";
                                console.log(role);
                                if(role == 'admin'){
                                    window.location.href = "{{ route('bookinghistory.index') }}";
                                }else{
                                    window.location.href = "{{ route('agentbookinghistory.index') }}";
                                }

                            }, 1500 );*/
                            if (booking_status == 1) {
                                $('.bookingform')[0].reset();
                                $('.successmessage').show();

                                $("html, body").animate({
                                    scrollTop: 0
                                }, 1000);

                                window.open("{{ url('upx/bookinghistory/invoice/view/')}}/" + data.bookingid, '_blank');

                                $.each(data.boxids.split('|'), function (index, value) {
                                    if (value != null && value != '') {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        window.open("{{ url('upx/bookinghistory/awb/view') }}" + '/' + data.bookingid + '/' + value, '_blank');
                                    }
                                });
                            }
                            if (booking_status == 0) {
                                $('.loadprice').html(data.result);
                                $('html, body').animate({
                                    scrollTop: $(".loadprice").offset().top
                                }, 1000);
                            }
                        }
                    },

                });
            });

            $('.weightunits').inputmask('decimal', {
                rightAlign: true
            });
            /****************************************** Receiver Save  ***************************/
            $('.save_receiver').click(function () {
                $.ajax({
                    url: "{{ route('price.receiver')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        name: $('.full_namer').val(),
                        email: $('.email_r').val(),
                        phone_number: $('.phone_r').val(),
                        company: $('.company_r').val(),
                        country_id: $('.receivercountry').val(),
                        state: $('.state_r').val(),
                        city: $('.city_r').val(),
                        address1: $('.address1_r').val(),
                        address2: $('.address2_r').val(),
                        address3: $('.address3_r').val(),
                        postalcode: $('.postal_code_r').val()
                    },
                    beforeSend: function () {
                        $('.receiverspinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function (data) {
                        $('.receiverspinner').html('');
                        PNotify.removeAll();
                        if (data.status == 400) {
                            $('.receiverspinner').html('');
                            new PNotify({
                                title: 'Oh No!',
                                text: data.msg,
                                type: 'error'
                            });
                        }
                        if (data.status == 200) {
                            $('.receiverspinner').html('');
                            new PNotify({
                                title: 'Success!',
                                text: 'Receiver Address Successfully saved.',
                                type: 'success'
                            });
                        }


                    },

                });
            });
            /****************************************** Receiver Save  ***************************/


            /****************************************** Sender Update  ***************************/
            $('.save_sender').click(function () {
                $.ajax({
                    url: "{{ route('price.sender')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        name: $('.first_name_s').val(),
                        lastname: $('.last_name_s').val(),
                        email: $('.email_s').val(),
                        phone: $('.phone_s').val(),
                        company: $('.company_s').val(),
                        country_id: $('.sendercountry').val(),
                        state: $('.state_s').val(),
                        city: $('.city_s').val(),
                        address1: $('.address1_s').val(),
                        address2: $('.address2_s').val(),
                        address3: $('.address3_s').val(),
                        postal_code: $('.postal_code_s').val()
                    },
                    beforeSend: function () {
                        $('.senderspinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function (data) {
                        $('.senderspinner').html('');
                        PNotify.removeAll();
                        if (data.status == 400) {
                            $('.receiverspinner').html('');
                            new PNotify({
                                title: 'Oh No!',
                                text: data.msg,
                                type: 'error'
                            });
                        }
                        if (data.status == 200) {
                            $('.senderspinner').html('');
                            new PNotify({
                                title: 'Success!',
                                text: 'Sender Address Successfully Updated.',
                                type: 'success'
                            });
                        }


                    },

                });
            });
            /****************************************** Receiver Save  ***************************/


            /****************************************** Autofill name  ***************************/
            $(".searchauto").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('addressbook.search') }}",
                        dataType: "json",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            search: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 1,
                select: function (event, ui) {
                    event.preventDefault();
                    $('.full_namer').val(ui.item.name);
                    $('.email_r').val(ui.item.email);
                    $('.company_r').val(ui.item.company);
                    $('.phone_r').val(ui.item.phone_number);
                    $('.address1_r').val(ui.item.address1);
                    $('.address2_r').val(ui.item.address2);
                    $('.address3_r').val(ui.item.address3);
                    $('.postal_code_r').val(ui.item.postalcode);
                    $('.state_r').val(ui.item.state);
                    $('.city_r').val(ui.item.city);
                    $(".receivercountry").find("option[value=" + ui.item.country_id + "]").attr('selected', true);
                    $('.receivercountry').select2()
                },
            });

            /****************************************** ADD Remove  ***************************/
            var maxField = 500; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var randomkey = Math.floor(1000 + Math.random() * 9000);
            var fieldHTML = `
            <div class="col-md-12 booking_div">
            <div class="form-group mainbookingdiv">
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="length[]" required>
                    <label class="mainlable">Length</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="width[]" required>
                    <label class="mainlable">Width</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="height[]" required>
                    <label class="mainlable">Height</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="kg[]" required>
                    <label class="mainlable">Weight</label>
                    <label class="extralable kilolb">Kg</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits consignment consignment_` + randomkey + `" data-id="` + randomkey + `" name="consignment[]">
                    <label class="mainlable">Consignment</label>
                    <label class="currency_amt">GBP &#163;</label>
                </div>
                <div class="fieldbooking">
                    <input type="checkbox" class="is_insure is_insure_` + randomkey + `" name="is_insure[]" data-id="` + randomkey + `">
                    <input type="text" class="weightunits insureamt insureamt_` + randomkey + `" name="insureamt[]">
                    <label class="mainlable">Insure AMT</label>
                    <label class="currency_amt">GBP &#163;</label>
                </div>
                <div class="fieldbooking">
                    <textarea type="text" class="weightunitsdec" name="description[]"></textarea>
                    <label class="mainlable">Description</label>

                </div>
                <a class="remove_button" title="Add shipment package"><i class="fa fa-minus-circle removeiconclass"
                                                                         aria-hidden="true"></i></a>
            </div>
        </div>`;
            //New input field html
            var x = 1; //Initial field counter is 1


            //Once add button is clicked
            $(addButton).click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                    $('.weightunits').inputmask('decimal', {
                        rightAlign: true
                    });
                }

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter

            });
            /****************************************** ADD Remove  ***************************/


            $('.checkreturn').click(function () {
                if ($(this).prop("checked") == true) {
                    $('.return_address').show()
                } else if ($(this).prop("checked") == false) {
                    $('.return_address').hide()
                }
            });
            $('.select2').select2();

        });
    </script>
    <script type="text/javascript">
        /******************* calculate insurence value **********************/
        function calculate_insurence(consignment_val) {
            var percent = 10;
            var insuren_val = ((consignment_val * percent) / 100);
            return insuren_val;
        }

        $(document).on('click', '.is_insure', function (e) {
            var randomkey = $(this).attr("data-id");

            if ($(this).is(':checked')) {
                var consignment_val = $('.consignment_' + randomkey).val();
                if (consignment_val != '') {
                    var insuren_val = calculate_insurence(consignment_val);
                    $('.insureamt_' + randomkey).val(insuren_val);
                }

            } else {
                $('.insureamt_' + randomkey).val('');
            }
        });

        /******************* calculate insurence value **********************/
        $('body').on('keyup', '.consignment', function (e) {
            var randomkey = $(this).attr("data-id");
            if ($(".is_insure_" + randomkey).prop('checked') == true) {
                var consignment_val = $(this).val();
                var insuren_val = calculate_insurence(consignment_val);
                $('.insureamt_' + randomkey).val(insuren_val);
            }
        });


    </script>
    <script type="text/javascript">
        $(document).on('change', '#service_id', function () {
            var service = $(this).val();
            $("#service_type_div").hide();
            $(".booking_div").show();
            $("#document_div").hide();
            if (service == 1) { // if door to door service
                $("#service_type_div").show();
            }
            if (service == 3) { //if document service
                $("#document_div").show();
                $(".booking_div").hide();
            }
        });

        /****************************************** ADD Remove Document***************************/
        var maxField = 500; //Input fields increment limitation
        var addDocumentButton = $('.add_document'); //Add button selector
        var documentwrapper = $('.maindocumentdiv'); //Input field wrapper
        var randomkey = Math.floor(1000 + Math.random() * 9000);
        var fieldHTML = `<div class="row">
                        <div class="col-md-3 form-group">
                            <select name="document_package_type[]" class="form-control">
                                <option value="0.5">0.5Kg</option>
                                <option value="1">1Kg</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <textarea type="text" class="form-control" name="document_description[]"></textarea>
                        </div>
                        <a class="remove_document_button" title="Remove shipment package"><i class="fa fa-minus-circle removeiconclass" aria-hidden="true"></i></a>
                    </div>`;
        //New input field html
        var x = 1; //Initial field counter is 1


        //Once add button is clicked
        $(addDocumentButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(documentwrapper).append(fieldHTML); //Add field html
            }

        });

        //Once remove button is clicked
        $(documentwrapper).on('click', '.remove_document_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter

        });
        /****************************************** ADD Remove document***************************/
    </script>

    <script type="text/javascript">
        /******************* calculate discout value **********************/
        var finalprice = "{{ round($finalprice,2) }}";
        var default_value = 0;

        $('body').on('keyup', '#discount_amt,#packing_charge_amt,#tax_amt', function () {
            if ($.isNumeric($(this).val()) || $(this).val().length === 0) {
                var discount_amt = $("#discount_amt").val();
                var packing_charge_amt = $("#packing_charge_amt").val();
                var tax_amt = $("#tax_amt").val();
                calculate_subtotal(discount_amt, packing_charge_amt, tax_amt);
            }
        });

        function calculate_subtotal(discount_amt, packing_charge_amt, tax_amt) {
            if (discount_amt == '') {
                discount_amt = 0;
            }
            if (packing_charge_amt == '') {
                packing_charge_amt = 0;
            }
            if (tax_amt == '') {
                tax_amt = 0;
            }

            var subtotal = (parseFloat(finalprice - discount_amt) + parseFloat(packing_charge_amt) + parseFloat(tax_amt)).toFixed(2);
            if (parseFloat(discount_amt) > parseFloat(finalprice)) {
                var discount_amt = $("#discount_amt").val();
                var $th = $("#discount_amt");
                $th.val(discount_amt.replace(discount_amt, ''));
                subtotal = finalprice;
            }
            $('#subtotal').text(subtotal);
        }
    </script>
@endpush
@endsection

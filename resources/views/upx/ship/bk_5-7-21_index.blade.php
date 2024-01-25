@extends('layouts.app')
@section('content')
@section('pageTitle', 'Booking')

@include('upx.includes.topbar')

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
    .is_insure{
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
    .custom-list-group .list-group-item{
        padding: 0px 15px !important;
    }
    .custom-list-group .list-group-item.sub-padding{
        padding: 7px 15px !important;
    }
</style>
<section class="content">
    <div class="strolltop">
        <div class="alert alert-success successmessage" role="alert" style="display: none;">
            <h4 class="alert-heading">Success!</h4>
            <p>Your booking is successfully done!! <a
                    href="@if(auth()->user()->role == 'admin'){{ route('bookinghistory.index') }}@else {{ route('agentbookinghistory.index') }}  @endif">Click
                    here</a> for redirect to booking history page.


        </div>
    </div>
    <form action="{{ route('bookingpro.store') }}" method="post" class="bookingform" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" class="booking_status" name="booking_status" value="0">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Make a booking</h3>
                        <button type="button" class="btn btn-sm btn-primary quotation_modal" style="float: right" id="quotation" data-toggle="modal" data-target=".quotation">Quick Quote</button>
                    </div>
                    <div class="box-body">
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Sender Detail -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 senderaddress">
                            <label>Sender </label>
                            <!-- <a style="margin-left: 5px; cursor: pointer;"   data-toggle="tooltip" class="save_sender" data-placement="right" title="Update your address"> <i class="fa fa-save" ></i></a><span class="senderspinner"></span> -->
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country <span
                                        style="color: red;">*</span></label>
                                <select class="form-control sendercountry select2" name="coutry_s" style="width: 100%;">
                                    @if(!empty($countries))
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->id }}" @if($country->id == 230) {{ 'selected' }} @endif>{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control first_name_s searchsenauto" name="first_name_s"
                                               placeholder="First Name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Last Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control last_name_s" name="last_name_s"
                                               placeholder="Last Name" value=""  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope"></i> Email <span
                                                style="color: red;">*</span></label>
                                        <input type="email" class="form-control email_s" name="email_s"
                                               placeholder="Email" value=""  required>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company </label>
                                        <input type="text" class="form-control company_s" name="company_s"
                                               placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control phone_s" name="phone_s"
                                               placeholder="Phone" value=""  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-address-card-o"></i> Address Line 1 <span style="color: red;">*</span></label>
                                        <textarea class="form-control address1_s" name="address1_s" placeholder="Address Line 1"
                                                  required value="" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <textarea type="text" class="form-control address2_s" name="address2_s"
                                                  placeholder="Address Line 2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" class="form-control address3_s" name="address3_s"
                                               placeholder="Address Line 3">
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-map-pin" aria-hidden="true"></i> Postal Code <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control postal_code_s" name="postal_code_s"
                                               placeholder="Postal Code" value=""  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control state_s" name="state_s"
                                               placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_s" value=""  name="city_s" placeholder="City"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-id-badge" aria-hidden="true"></i> VAT Number</label>
                                        <input type="text" class="form-control vat_number" name="vat_number"
                                               placeholder="VAT Number" value=""  maxlength="11">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4" >
                                    <div class="form-group">
                                        <label>
                                            <i class="fa  fa-info-circle" aria-hidden="true"></i> ID Type
                                        </label>
                                        <select class="form-control id_type_s" name="id_type_s" placeholder="Type of ID Number">
                                            <option value="">Select type</option>
                                            <option value="Driving License">Driving License</option>
                                            <option value="Social Security number">Social Security number</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Other">Other</option>
                                            {{-- <option value="Aadhar card">Aadhar card</option>
                                            <option value="Pan card">Pan card</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="otheridtype"></div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-book" aria-hidden="true"></i> ID Number </label>
                                        <input type="text" class="form-control id_number_s" name="id_number_s" placeholder="ID Number" >
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
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Sender Detail -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Receiver Detail -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 receiveraddress">
                            <label>Receiver </label>
                            <!--  <a style="margin-left: 5px; cursor: pointer;" class="save_receiver"  data-toggle="tooltip" data-placement="right" title="Save to Address Book"> <i class="fa fa-save" ></i></a> <span class="receiverspinner"></span> -->
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country</label>
                                <select class="form-control select2 receivercountry" name="country_r"
                                        style="width: 100%;">
                                    @if(!empty($receivecountries))
                                        @foreach($receivecountries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                        <input type="text" class="form-control searchauto full_namer" id="full_name_r" name="full_name_r"
                                               placeholder="Full Name" value=""  required>
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
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company</label>
                                        <input type="text" class="form-control company_r" name="company_r"
                                               placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone </label>
                                        <input type="text" class="form-control phone_r" name="phone_r"
                                               placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><i class="fa fa-address-card-o"></i> Address Line 1 <span style="color: red;">*</span></label>
                                <textarea class="form-control address1_r" name="address1_r" placeholder="Address Line 1"
                                          required value="" ></textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <input type="text" class="form-control address2_r" name="address2_r"
                                               placeholder="Address Line 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" class="form-control address3_r" name="address3_r"
                                               placeholder="Address Line 3">
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
                                               placeholder="Postal Code" value=""  required>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control state_r" name="state_r"
                                               placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_r" name="city_r" placeholder="City"
                                               required value="" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Receiver Detail -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Check box -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <div class="checkbox checkboxclass">
                            <div class="col-md-6">
                                <label style="margin-top: 15px;">
                                    <input type="checkbox" value="1" name="return_address" class="checkreturn"> Return
                                    address is different from sender address.
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label style="margin-top: 15px;">
                                    <input type="checkbox" value="1" name="mail_notify"> Send notification email to
                                    Sender and Receiver.
                                </label>
                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------------------------
                           ----------------------------------------------- Check box -------------------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Return address Detail ---------------------------------
                           ------------------------------------------------------------------------------------------------------->
                        <div class="col-md-6 return_address">
                            <label>Return Address</label>
                            <hr style="margin:5px 0px; border-top: 1px solid #3e3e3e;">
                            <div class="form-group">
                                <label><i class="fa fa-flag" aria-hidden="true"></i> Country</label>
                                <select class="form-control select2" name="country_d" style="width: 100%;">
                                    @if(!empty($countries))
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                               placeholder="First Name" required value="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Last Name <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control last_name_d" name="last_name_d"
                                               placeholder="Last Name" value=""  required>
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
                                               placeholder="Email" required value="" >
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label><i class="fa fa-building-o" aria-hidden="true"></i> Company <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control company_d" name="company_d"
                                               placeholder="Company" value=""  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone" aria-hidden="true"></i> Phone <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control phone_d" name="phone_d"
                                               placeholder="Phone" required value="" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><i class="fa fa-address-card-o"></i> Address Line 1 <span style="color: red;">*</span></label>
                                <textarea class="form-control address1_d" name="address1_d" placeholder="Address Line 1"
                                          required value="" ></textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> Address Line 2</label>
                                        <input type="text" class="form-control" name="address2_d"
                                               placeholder="Address Line 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address Line 3</label>
                                        <input type="text" class="form-control" name="address3_d"
                                               placeholder="Address Line 3">
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
                                               placeholder="Postal Code" required value="" >
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right: 0px;">
                                    <div class="form-group">
                                        <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                        <input type="text" class="form-control" name="state_d"
                                               placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><i class="fa fa-home" aria-hidden="true"></i> City <span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control city_d" name="city_d" placeholder="City"
                                               required value="" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!------------------------------------------------------------------------------------------------------
                           -----------------------------------------------Return address Detail ---------------------------------
                           ------------------------------------------------------------------------------------------------------->
                    </div>
                </div>
            </div>
            <div class="col-md-3 loadprice" style="padding-left: 0px;">

            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------
           -----------------------------------------------Booking Detail -----------------------------------------
           ------------------------------------------------------------------------------------------------------->
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
                                            <select name="service_id" class="form-control service_id" id="service_id" required>
                                               {{-- <option value="">Select Service</option>--}}
                                                @if(!empty($services))
                                                    @foreach($services as $service)
                                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="service_type_div" >
                                        <div class="form-group">
                                            <label for="">Service Type </label>
                                            <select name="service_type" class="form-control service_type" >
                                                <option value="">Service Type</option>
                                                <option value="economy">Economy</option>
                                                <option value="express">Express</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Type </label>
                                            <input type="text" class="form-control package_type" name="package_type" id="exampleInputEmail1" placeholder="Package type">
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="Payment_method_div" >
                                        <div class="form-group">
                                            <label for="">Payment method </label>
                                            <select name="Payment_method" class="form-control Payment_method" >
                                                <option value="">Payment Type</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Debit card">Debit card</option>
                                                <option value="Credit card">Credit card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Package Instruction </label>
                                            <textarea name="booking_instruction" style="width: 100%;" placeholder="Package Instruction"></textarea>
                                        </div>
                                    </div>

                                </div>


                                <div class="row field_wrapper">

                                    <div class="col-md-4 col-lg-offset-5">

                                    </div>
                                    <div class="col-md-12 booking_div">
                                        <div class="form-group mainbookingdiv">
                                            <div class="fieldbooking">
                                                <input type="text" class="weightunits error" name="length[]" required>
                                                <label class="mainlable">Length</label>
                                                <label class="extralable">Cm</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <input type="text" class="weightunits error" name="width[]" required>
                                                <label class="mainlable">Width</label>
                                                <label class="extralable">Cm</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <input type="text" class="weightunits error" name="height[]" required>
                                                <label class="mainlable">Height</label>
                                                <label class="extralable">Cm</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <input type="text" class="weightunits error" name="kg[]" required>
                                                <label class="mainlable">Weight</label>
                                                <label class="extralable kilolb">Kg</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <input type="text" class="weightunits consignment consignment_1" data-id="1" name="consignment[]">
                                                <label class="mainlable">Consignment</label>
                                                <label class="currency_amt">GBP &#163;</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <input type="checkbox" class="is_insure is_insure_1" name="is_insure[]" data-id="1" >
                                                <input type="text" class="weightunits insureamt insureamt_1" name="insureamt[]">
                                                <label class="mainlable">Insure AMT</label>
                                                <label class="currency_amt">GBP &#163;</label>
                                            </div>
                                            <div class="fieldbooking">
                                                <textarea type="text" class="weightunitsdec"
                                                          name="description[]"></textarea>
                                                <label class="mainlable">Description</label>

                                            </div>
                                            <a class="add_button" title="Add shipment package"><i
                                                    class="fa fa-plus-circle addiconclass" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="document_div" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Package : </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Description : </label>
                                            </div>
                                        </div>
                                        <div class="maindocumentdiv">
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <select name="document_package_type[]" class="form-control">
                                                        <option value="0.5">0.5Kg</option>
                                                        <option value="1">1Kg</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <textarea type="text" class="form-control" name="document_description[]"></textarea>
                                                </div>
                                                <a class="add_document cursor-pointer" title="Add shipment package"><i  class="fa fa-plus-circle addiconclass" aria-hidden="true"></i></a>
                                            </div>

                                        </div>
                                    </div>
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
    <div class="modal fade quotation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><b>Quotation</b></h5>
                  <button type="button" style="margin-top: -17px!important;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 
                </div>
              </div>
        </div>
      </div>
</section>

@push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@push('script')
    <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">

            $('body').on('submit', '.quotationcalculate', function (e) {
                var quotation_status = $('.quotation_status').val();
                e.preventDefault();
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
                        if (quotation_status == 0) {
                            $('.calculatorspin').html('<i class="fa fa-spinner fa-spin"></i>');
                        }
                        if (quotation_status == 1) {
                            $('.bookingspin1').html('<i class="fa fa-spinner fa-spin"></i>')
                        }
                            
                    },
                    success: function (data) {
                        console.log(data.result);
                        // if (data.status == 200 && data.quotation_status == 0) {
                        //     $('.calculatorspin').html('');
                        //     $('#quotation_result').html(`
                        //     <table class="table table-bordered">
                        //         <thead>
                        //             <tr>
                        //                 `+ (data.result.totalquantity ? `<th scope="col">Total Quantity</th>` : ``) +`
                        //                 `+ (data.result.volumnmetricweight ? `<th scope="col">Volumetric weight</th>` : ``) +`
                        //                 `+ (data.result.actualweight ? `<th scope="col">Actual Weight</th>` : ``) +`
                        //                 `+ (data.result.consignmentfinalamt ? `<th scope="col">Consignment AMT</th>` : ``) +`
                        //                 `+ (data.result.insurefinalamt ? ` <th scope="col">Insure AMT</th>` : ``) +`
                        //                 `+ (data.result.upxprice ? `<th scope="col">Package AMT</th>` : ``) +`
                        //                 `+ (data.result.handling_price ? ` <th scope="col">Handling Price</th>` : ``) +`
                        //                 `+ (data.result.finalprice ? ` <th scope="col">Total (GBP)</th>` : ``) +`
                        //             </tr>
                        //         </thead>
                        //         <tbody>
                        //             <tr>
                        //                 `+ (data.result.totalquantity ? `<td>`+data.result.totalquantity+`</td>` : ``) +`
                        //                 `+ (data.result.volumnmetricweight ? ` <td>`+data.result.volumnmetricweight+`kg</td>` : ``) +`
                        //                 `+ (data.result.actualweight ? ` <td>`+data.result.actualweight+`kg</td>` : ``) +`
                        //                 `+ (data.result.consignmentfinalamt ? `<td> &#163; `+data.result.consignmentfinalamt+`</td>` : ``) +`
                        //                 `+ (data.result.insurefinalamt ? `<td> &#163; `+data.result.insurefinalamt+`</td>` : ``) +`
                        //                 `+ (data.result.upxprice ? ` <td> &#163; `+data.result.upxprice.toFixed(2)+`</td>` : ``) +`
                        //                 `+ (data.result.handling_price ? `<td> &#163; `+data.result.handling_price+`</td>` : ``) +`
                        //                 `+ (data.result.finalprice ? `<td> &#163; `+data.result.finalprice.toFixed(2)+`</td>` : ``) +`
                        //             </tr>
                        //             `+ (data.result.error ? `<tr colspan="8"><h6 class="my-0" style="color: red">`+ data.result.msg +`</h6></tr>`: ``) +`
                                    
                        //         </tbody>
                        //         </table>
                        //     `);
                          
                        // }
                        // if (data.status == 200 && data.quotation_status == 1 && data.service_id == 1 || data.service_id == 2) {
                        //     // console.log(data.result);
                        //     $('.booking_div').html('');
                        //     $('.booking_div').html(data.result);
                        //     $(".booking_div").show();
                        //     $("#document_div").hide();
                        //     $(".service_id").find("option[value=" + data.service_id + "]").attr('selected', true);
                        //     $(".service_type").find("option[value=" + data.service_type + "]").attr('selected', true);
                        //     $('.package_type').val(data.package_type);
                        //     $('.quotation').modal('hide');
                        //     $(".receivercountry").find("option[value=" + data.country + "]").attr('selected', true);
                        //     $('.receivercountry').select2()
                        // }
                        // if (data.service_id == 3 && data.status == 200 && data.quotation_status == 1) {
                        //     $('.maindocumentdiv').html('');
                        //     $('.maindocumentdiv').html(data.result);
                        //     $(".booking_div").hide();
                        //     $("#service_type_div").hide();
                        //     $("#document_div").show();
                        //     $(".service_id").find("option[value=" + data.service_id + "]").attr('selected', true);
                        //     $('.package_type').val(data.package_type);
                        //     $('.quotation').modal('hide');
                        //     $(".receivercountry").find("option[value=" + data.country + "]").attr('selected', true);
                        //     $('.receivercountry').select2()
                        // }
                        // if (data.status == 400) {
                        //     new PNotify({
                        //         title: 'Oh No!',
                        //         text: data.msg,
                        //         type: 'error'
                        //     });
                        // }
                    },
                });
            });

        $(document).ready(function () {
            $('body').on('click', '.bookingbutton', function () {
                $('.booking_status').val(1);
            });
            $('body').on('click', '.calculationclick', function () {
                $('.booking_status').val(0);
            });

            $('body').on('change', '.id_type_s', function () {
                var select = $(".id_type_s").val()
                if (select == 'Other') {
                    $('.otheridtype').html(`<div class="col-md-6" >
                                    <div class="form-group">
                                        <label>
                                            <i class="fa  fa-info-circle" aria-hidden="true"></i> Other ID Type<span style="color: red;">*</span>
                                        </label>
                                        <input class="form-control id_type_other_s" type="text" name="id_type_other_s" id="id_type_other_s" placeholder="Type of other ID" required>
                                    </div>
                                </div>`);
                }else {
                    $('.otheridtype').html('');
                }
            });


            $(".bookingform").validate({
                rules: {
                    postal_code_r: {
                        required: true,
                    },
                    postal_code_s: {
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
                var booking_status = $('.booking_status').val();
                e.preventDefault();
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
                        // console.log(data)
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



                            if (booking_status == 1) {
                                $('.bookingform')[0].reset();
                                $('.loadprice').html('');
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
                                        var role = "{{ auth()->user()->role }}";
                                        if(role == 'admin'){
                                            window.open("{{ url('upx/bookinghistory/proforma/view') }}" + '/' + data.bookingid + '/' + value, '_blank');
                                        }


                                        //window.open("{{ url('upx/bookinghistory/awb/download') }}"+'/'+awbid+'/'+value, '_blank');
                                        //window.open("{{ url('upx/bookinghistory/awb/download') }}"+'/'+awbid+'/'+value, "_self");
                                    }

                                });


                            }

                            if (booking_status == 0) {
                                $('.loadprice').html(data.result);
                                $('html, body').animate({
                                    scrollTop: $(".loadprice").offset().top
                                }, 1000);
                            }
                        //     if(data.arrs.length > 0){

                        //     if(data.arrs.status = 401){
                        //         new PNotify({
                        //             title: 'Oh No!',
                        //              delay: 30000,
                        //             text: data.arrs.msga,
                        //             type: 'error'
                        //         });
                        //     }
                        // }


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
                            search: request.term,
                            name : 'fullname'
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

            $(".searchsenauto").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('addressbook.search') }}",
                        dataType: "json",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            search: request.term,
                            name : 'firstname'
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 1,
                select: function (event, ui) {
                    event.preventDefault();
                    $('.first_name_s').val(ui.item.name);
                    $('.last_name_s').val(ui.item.lastname);
                    $('.email_s').val(ui.item.email);
                    $('.company_s').val(ui.item.company);
                    $('.phone_s').val(ui.item.phone_number);
                    $('.address1_s').val(ui.item.address1);
                    $('.address2_s').val(ui.item.address2);
                    $('.address3_s').val(ui.item.address3);
                    $('.postal_code_s').val(ui.item.postalcode);
                    $('.state_s').val(ui.item.state);
                    $('.city_s').val(ui.item.city);
                    $(".sendercountry").find("option[value=" + ui.item.country_id + "]").attr('selected', true);
                    $('.sendercountry').select2()
                },
            });

            /****************************************** ADD Remove  ***************************/
            var maxField = 500; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper

            $('body').on('click', '.add_button', function(){ //Add button selector
                addBookingDetail() ;
            });
            //New input field html
            var x = 1; //Initial field counter is 1


            //Once add button is clicked
           function addBookingDetail() {
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
                    <input type="text" class="weightunits consignment consignment_`+randomkey+`" data-id="`+randomkey+`" name="consignment[]">
                    <label class="mainlable">Consignment</label>
                    <label class="currency_amt">GBP &#163;</label>
                </div>
                <div class="fieldbooking">
                    <input type="checkbox" class="is_insure is_insure_`+randomkey+`" name="is_insure[]" data-id="`+randomkey+`">
                    <input type="text" class="weightunits insureamt insureamt_`+randomkey+`" name="insureamt[]">
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
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                    $('.weightunits').inputmask('decimal', {
                        rightAlign: true
                    });
                }

            };

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

        /****************************************** quotation modal open ***************************/
        $(document).on('click', '.quotation_modal', function() {
            $.ajax({
                url: "{{ route('quotation.openform')}}",
                 type: 'POST',
                 headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                beforeSend: function() {
                    $('.modal-body').html('<div class="text-center">loading...</div>')
                },
                success: function(data) {
                    $('.modal-body').html(data);
                }
            });
        });
    </script>
    <script type="text/javascript">
        /******************* calculate insurence value **********************/
        function calculate_insurence(consignment_val){
            var percent = 10;
            var insuren_val = ((consignment_val * percent) / 100);
            return insuren_val;
        }
        $(document).on('click', '.is_insure', function (e) {
            var randomkey = $(this).attr("data-id");

            if($(this).is(':checked')){
                var consignment_val = $('.consignment_'+randomkey).val();
                if(consignment_val != ''){
                    var insuren_val = calculate_insurence(consignment_val);
                    $('.insureamt_'+randomkey).val(insuren_val);
                }

            }else{
                $('.insureamt_'+randomkey).val('');
            }
        });

        /******************* calculate insurence value **********************/
        $('body').on('keyup', '.consignment', function (e) {
            var randomkey = $(this).attr("data-id");
            if($(".is_insure_"+randomkey).prop('checked') == true){
                var consignment_val = $(this).val();
                var insuren_val = calculate_insurence(consignment_val);
               $('.insureamt_'+randomkey).val(insuren_val);
            }
        });


    </script>
    <script type="text/javascript">
        $(document).on('change', '#service_id', function() {
            var service =$(this).val();
            $("#service_type_div").hide();
            $(".booking_div").show();
            $("#document_div").hide();
            if(service == 1){ // if door to door service
                $("#service_type_div").show();
            }
            if(service == 3){ //if document service
                $("#document_div").show();
                $(".booking_div").hide();
            }
        });

        /****************************************** ADD Remove Document***************************/
        var maxField = 500; //Input fields increment limitation
        // var addDocumentButton = $('.add_document'); //Add button selector
        var documentwrapper = $('.maindocumentdiv'); //Input field wrapper
      
        //New input field html
        var x = 1; //Initial field counter is 1
        var randomkey = Math.floor(1000 + Math.random() * 9000);

        function addDocumentButton() {
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
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(documentwrapper).append(fieldHTML); //Add field html
            }

        }
        //Once add button is clicked
        $('body').on('click', '.add_document', function(){ //Add button selector
            addDocumentButton() ;
        });

        //Once remove button is clicked
        $(documentwrapper).on('click', '.remove_document_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter

        });
        /****************************************** ADD Remove document***************************/


    </script>
@endpush
@endsection

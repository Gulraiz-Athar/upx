<style>
    .form-control{
        font-weight: 400 !important;
        text-transform: inherit !important;
    }
    select.form-control {
        color: #000 !important;
    }
    input.form-control {
        color: #000 !important;
    }
</style>
<!-- Calculate Your Cost -->
<section class="calculate pt-100 rightRedStrip">
    <div class="theme-container container">
        <span class="bg-text right wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate </span>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ URL::asset('assets/img/block/Courier-Man.png') }}" alt=""
                     class="wow slideInLeft couriermanimage" data-wow-offset="50" data-wow-delay=".20s"/>
            </div>
            <div class="col-md-6">
                <div class="pad-10"></div>
                <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate your
                    door to door cost </h2>
                <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Please fill your requirements and we will provide you our best rates. 
                </p>
                <div class="calculate-form">
                    <form class="row quotefrm" id="quotefrm" action="{{ url('user/inquiry')}}" method="POST" name="quotefrm" enctype='multipart/form-data'>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"><label class="title-2"> Service: </label></div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control service" name="service"
                                            title="select service">
                                             <option value="">Select Service</option>
                                        @php $services = Getservices(); @endphp
                                        @if(!empty($services))
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp service_type_div" data-wow-offset="50"
                             data-wow-delay=".20s">
                            <div class="col-sm-3">
                                <label class="title-2"> Service Type : </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control service_type" id="service" name="service_type"
                                            title="select service">
                                        <option value="economy">Economy</option>
                                        <option value="express">Express</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group  document_type_div" data-wow-offset="50" data-wow-delay=".20s"
                             style="display: none;">
                            <div class="col-sm-3">
                                <label class="title-2"> Service Type : </label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control document_service_type" name="document_service_type"
                                            title="select service">

                                        <option value="0.5">0.5Kg</option>
                                        <option value="1">1Kg</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="dimensiondiv">
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> Length (cm): </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Length" name="length"
                                           class="form-control lengthvalue masknumber" maxlength="8">
                                </div>
                            </div>
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> width (cm): </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="width" name="width"
                                           class="form-control widthvalue masknumber" maxlength="8">
                                </div>
                            </div>
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> height (cm): </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="height" name="height"
                                           class="form-control heightvalue masknumber" maxlength="8">
                                </div>
                            </div>
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> weight (kg): </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="weight" name="weight"
                                           class="form-control weightvalue masknumber" maxlength="8">
                                </div>
                            </div>
                        </div>

                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-3"><label class="title-2"> country: </label></div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control countryvalue" name="country"
                                            title="select your Country">
                                        @php $countries = GetCountries(); @endphp

                                        @if(!empty($countries))
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class=" timeline_s" style="display: none;">
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2">  Transit time   </label>
                                </div>
                                <div class="col-sm-9 test">
                                    {{-- <input type="text" placeholder="Transit" 
                                           class="form-control test"  value="" disabled=""> --}}
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group booking-error-div" style="display: none;">
                            <div class="col-sm-12">
                                <span class="text-danger" id="booking-error"></span><b><a href="{{ route('contact') }}" style="color: darkcyan" target="_blank"> Click here </a></b> to reach us.
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="col-sm-9 col-xs-12 pull-right">
                                <div class="btnNew1" style="float: left">
                                    <div class="btn-1 " style="line-height: normal; height: auto">
                                        Chargeable Weight : <span class="totalweight"> 0 </span> Kg
                                    </div>
                                    <input type="hidden" value="" id="chargeable_weight" name="chargeable_weight">
                                </div>

                                <div class="btnNew2" style="float: right; margin-top:10px">
                                <span class="btn-1  totalpricequote" data-name="cost" style="line-height: normal">
                              <span class="pr-sign">Total: </span> &#163; <span class="pricecalculation">0.00</span>
                                    <input type="hidden" value="" id="total" name="total">
                              </span>

                                </div>

                            </div>
                        </div>
                        <div class="form-group wow fadeInUp bookbtndiv" data-wow-offset="50" data-wow-delay=".20s">
                            <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="col-sm-9 col-xs-12 pull-right">
                                    <button type="button" name="booknow" id="booknowbtn" value="Book Today"
                                            class="btn-1 booknowbtn"> Book Today
                                        <span class="spinner"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="inquiryfrmdiv" style="display: none;">
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> First Name: </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="First Name" name="firstname"
                                           class="form-control firstname ">
                                </div>
                            </div>
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> Last Name: </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Last Name" name="lastname"
                                           class="form-control lastname">
                                </div>
                            </div>
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> Contact No: </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Contact No" name="contactno"
                                           class="form-control contactno">
                                </div>
                            </div>
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> Email Address: </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Email Address" name="email"
                                           class="form-control email">
                                </div>
                            </div>
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="col-sm-3">
                                    <label class="title-2"> Shipper Address: </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Shipper Address" name="shipper_address"
                                           class="form-control shipper_address">
                                </div>
                            </div>
                            <div class="form-group " data-wow-offset="50" data-wow-delay=".20s">
                                <div class="form-group " data-wow-offset="50" data-wow-delay=".30s">
                                    <div class="col-sm-9 col-xs-12 pull-right">
                                        <button type="submit" name="confirmbtn" id="confirmbtn" value="Confirm"
                                                class="btn-1 confirmbtn"> Confirm
                                            <span class="spinner"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pt-80 hidden-lg"></div>
            </div>
        </div>
    </div>
</section>
<!-- /.Calculate Your Cost -->

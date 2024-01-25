<form action="{{ route('quotation.calculate') }}" class="quotationcalculate" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" class="quotation_status" name="quotation_status" value="0">
<div class="row">
    <div class="col-md-12">
        <div class="">
            
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Receiver's country </label>
                                    <select name="country" style="width: 100%;" class="form-control select2 sencountry" >
                                        @php $countries = GetCountries(); @endphp

                                        @if(!empty($countries))
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Service </label>
                                    <select name="service_id" class="form-control service_id-m" id="service_id-m" required>
                                       <option value="">Select Service</option>
                                        @if(!empty($services))
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="service_type_div1" >
                                <div class="form-group">
                                    <label for="">Service Type </label>
                                    <select name="service_type" class="form-control" >
                                        <option value="economy">Economy</option>
                                        <option value="express">Express</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Package Type </label>
                                    <select class="form-control" name="package_type" id="package_type">
                                        <option value="Customer Packaging">Customer Packaging</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" name="package_type" id="exampleInputEmail1" placeholder="Package type"> --}}
                                </div>
                            </div>
                            <div class="col-md-6 timeline_s"  style="display: none;">
                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Transit time <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control test" name=""
                                               placeholder="" value="" required disabled="">
                                    </div>
                            </div>
                        </div>
                        <div class="row field_wrapper1">

                            <div class="col-md-4 col-lg-offset-5">

                            </div>
                            <div class="col-md-12 booking_div1">
                                <div class="form-group mainbookingdiv">
                                    <div class="fieldbooking">
                                        <input type="text" class="weightunits error" name="length[]" >
                                        <label class="mainlable">Length</label>
                                        <label class="extralable">Cm</label>
                                    </div>
                                    <div class="fieldbooking">
                                        <input type="text" class="weightunits error" name="width[]" >
                                        <label class="mainlable">Width</label>
                                        <label class="extralable">Cm</label>
                                    </div>
                                    <div class="fieldbooking">
                                        <input type="text" class="weightunits error" name="height[]" >
                                        <label class="mainlable">Height</label>
                                        <label class="extralable">Cm</label>
                                    </div>
                                    <div class="fieldbooking">
                                        <input type="text" class="weightunits error" name="kg[]" >
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
                                    <a class="add_button1" title="Add shipment package"><i
                                            class="fa fa-plus-circle addiconclass" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="col-md-12" id="document_div1" style="display: none;">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Package : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Description : </label>
                                    </div>
                                </div>
                                <div class="maindocumentdiv1">
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
                                        <a class="add_document1 cursor-pointer" title="Add shipment package"><i  class="fa fa-plus-circle addiconclass" aria-hidden="true"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><br>
            <div id="quotation_result">
            </div>
            <br>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary quotation_calculate"><samp class="calculatorspin"></samp> <i class="fa fa-calculator "></i> Calculate</button>
                <button type="submit" class="btn btn-success calculate_book "><samp class="bookingspin1"></samp>  Booking</button>
              </div>
        </div>
    </div>
</div>
</form>
@push('links')
{{-- <link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css')}} "> --}}
@endpush
{{-- <script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script> --}}
<script type="text/javascript">
    function timeline(country_id,service_id)
         {
       
            // console.log(country_id)
            // console.log(service_id)
            if (country_id && service_id) {
                $.ajax({
                    url: "{{ route('booking.timeline')}}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        country_id : country_id ,
                        service_id : service_id ,
                    },
                    success: function(data) {
                        // console.log(data.timeline)
                        if(data.timeline == ''){
                            $(".timeline_s").hide();
                        }else{
                            $(".timeline_s").show();
                            $('.test').val(data.timeline);
                        }
                        
                    }
                });
            }
        }
    $(document).ready(function () {

        $('.sencountry').select2({
            dropdownParent: $('.quotation')
        });

        $('body').on('click', '.quotation_calculate', function () {
            $('.quotation_status').val(0);
        });
        $('body').on('click', '.calculate_book', function () {
            $('.quotation_status').val(1);
        });
    });
    $(document).on('change', '.sencountry', function(){
        var service_id =$('.service_id-m').val();
        var country_id =$('.sencountry').val();
        timeline(country_id,service_id)
    });
    $(document).on('change', '#service_id-m', function() {
        

        var service =$(this).val();
        var service_id =$('.service_id-m').val();
        var country_id =$('.sencountry').val();
        timeline(country_id,service_id)
        
        $("#service_type_div1").hide();
        $(".booking_div1").show();
        $("#document_div1").hide();
        if(service == 1){ // if door to door service
            $("#service_type_div1").show();
        }
        if(service == 3){ //if document service
            $("#document_div1").show();
            $(".booking_div1").hide();
        }
    });

       /****************************************** ADD Remove Document***************************/
       var maxField1 = 500; //Input fields increment limitation
        var addDocumentButton1 = $('.add_document1'); //Add button selector
        var documentwrapper1 = $('.maindocumentdiv1'); //Input field wrapper
        var randomkey1 = Math.floor(1000 + Math.random() * 9000);
        var fieldHTML1 = `<div class="row">
                        <div class="col-md-3 form-group">
                            <select name="document_package_type[]" class="form-control">
                                <option value="0.5">0.5Kg</option>
                                <option value="1">1Kg</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <textarea type="text" class="form-control" name="document_description[]"></textarea>
                        </div>
                        <a class="remove_document_button1" title="Remove shipment package"><i class="fa fa-minus-circle removeiconclass" aria-hidden="true"></i></a>
                    </div>`;
        //New input field html
        var x = 1; //Initial field counter is 1


        //Once add button is clicked
        $(addDocumentButton1).click(function () {
            //Check maximum number of input fields
            if (x < maxField1) {
                x++; //Increment field counter
                $(documentwrapper1).append(fieldHTML1); //Add field html
            }

        });

        //Once remove button is clicked
        $(documentwrapper1).on('click', '.remove_document_button1', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter

        });
        /****************************************** ADD Remove document***************************/

         /****************************************** ADD Remove  ***************************/
         var maxField = 500; //Input fields increment limitation
            var addButton = $('.add_button1'); //Add button selector
            var wrapper = $('.field_wrapper1'); //Input field wrapper

            //New input field html
            var x = 1; //Initial field counter is 1


            //Once add button is clicked
            $(addButton).click(function () {
                var randomkey = Math.floor(1000 + Math.random() * 9000);
            var fieldHTML = `
            <div class="col-md-12 booking_div1">
            <div class="form-group mainbookingdiv">
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="length[]" >
                    <label class="mainlable">Length</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="width[]" >
                    <label class="mainlable">Width</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="height[]" >
                    <label class="mainlable">Height</label>
                    <label class="extralable cemiin">Cm</label>
                </div>
                <div class="fieldbooking">
                    <input type="text" class="weightunits error" name="kg[]" >
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

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter

            });
            /****************************************** ADD Remove  ***************************/
</script>
<form class="form-some-up form-block formsubmit" enctype="multipart/form-data" role="form"
      action="{{ route('agent.store') }}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="agent_id" value="@if(!empty($agent)){{ $agent->id }}@endif">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-user"></i> First Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control classfocus" name="name" placeholder="First Name"
                       value="@if(!empty($agent)){{ $agent->name }}@endif" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-user"></i> Last Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                       value="@if(!empty($agent)){{ $agent->lastname }}@endif" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-envelope"></i> Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Email"
                       value="@if(!empty($agent)){{ $agent->email }}@endif" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-phone"></i> Phone </label>
                <input type="text" class="form-control" name="phone"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->phone }} @endif"
                       placeholder="Phone">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-building-o"></i> Company </label>
                <input type="text" class="form-control" name="company"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->company }} @endif"
                       placeholder="Company">

            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-address-card-o"></i> Address1 </label>
                <input class="form-control" name="address1" placeholder="Address1"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->address1 }} @endif">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-address-card-o"></i> Address2</label>
                <input type="text" class="form-control" name="address2"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->address2 }} @endif"
                       placeholder="Address2">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-address-card-o"></i> Address3</label>
                <input type="text" class="form-control" name="address3"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->address3 }} @endif"
                       placeholder="Address3">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-home"></i> City </label>
                <input type="text" class="form-control" name="city"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->city }} @endif" placeholder="City">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-map"></i> State/Province </label>
                <input type="text" class="form-control" name="state"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->state }} @endif"
                       placeholder="State/Province">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-flag"></i> Country </label>
                <select class="form-control" name="country_id" style="width: 100%;">
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option
                                value="{{ $country->id }}" @if($country->id) {{ 'selected' }} @endif>{{ $country->name }}</option>
                        @endforeach
                    @endif
                </select>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-map-pin"></i> Postal Code </label>
                <input type="text" class="form-control" name="postal_code"
                       value="@if(!empty($agent->userdetail)){{ $agent->userdetail->postal_code }} @endif"
                       placeholder="Postal code">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-info-circle"></i> Status</label>
                <select class="form-control" name="status">
                    <option value="Active" @if(isset($agent->status) && $agent->status == 'Active') selected @endif>
                        Active
                    </option>
                    <option value="Inactive" @if(isset($agent->status) && $agent->status == 'Inactive') selected @endif>
                        Inactive
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-hand-o-right"></i> Booking Amount Limit (&#163;) <span
                        style="color: red;">*</span></label>
                <input type="text" class="form-control booking_limit" style="text-align: left;" maxlength="8"
                       name="booking_limit" value="@if(!empty($agent)){{ $agent->booking_limit }} @endif"
                       placeholder="Limit" required>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-vcard-o"></i> Company Reg No <span style="color: red;">*</span></label>
                <input type="text" class="form-control company_no" style="text-align: left;" name="company_no"
                       value="@if(!empty($agent)){{ $agent->company_no }} @endif" placeholder="Company Reg No" required>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-id-card"></i> VAT Number <span style="color: red;">*</span></label>
                <input type="text" class="form-control vat_number" style="text-align: left;" name="vat_number"
                       value="@if(!empty($agent)){{ $agent->vat_number }} @endif" placeholder="VAT Number" required>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="fa fa-check-circle"></i> Code Number <span style="color: red;">*</span></label>
                <input type="text" class="form-control code_number" minlength="3" maxlength="3"
                       style="text-align: left;" name="code_number"
                       value="@if(!empty($agent)){{ $agent->code_number }} @endif" placeholder="Code Number" required>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    @php $image = url('public/images/users/default.png'); @endphp
                    @if(isset($agent) && !empty($agent->image) && $agent->image !== null)
                        @php $image = url('public/images/users/'.$agent->image); @endphp
                    @endif
                    <span style="width: 100%; text-align: center; float: left;"><img src="{{ $image }}"
                                                                                     class="image_preview"
                                                                                     width="auto"
                                                                                     height="100px"></span>
                    <label><i class="fa fa-file-image-o"></i> Profile Image </label>
                    <input type="file" class="form-control changeuserimage" accept="image/*" name="imageuser">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    @php $logoimage = url('public/images/users_logos/defaultlogo.png'); @endphp
                    @if(isset($agent) && !empty($agent->logo_image) && $agent->logo_image !== null)
                        @php $logoimage = url('public/images/users_logos/'.$agent->logo_image); @endphp
                    @endif
                    <span style="width: 100%; text-align: center; float: left;"><img class="logo_preview"
                                                                                     src="{{ $logoimage }}"
                                                                                     width="auto"
                                                                                     height="100px"></span>
                    <label><i class="fa fa-file-image-o"></i> Logo Image </label>
                    <input type="file" class="form-control logo_image" accept="image/*" name="logo_image_user">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right submitbutton">@if(!empty($agent)) Update @else
                        Add @endif <span class="spinner"></span></button>
            </div>
        </div>
    </div>
</form>

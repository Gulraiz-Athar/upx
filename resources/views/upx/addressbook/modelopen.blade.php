<style type="text/css">
    .formsubmit label.error {
        font-weight: 100 !important;
    }
</style>

<form class="form-some-up form-block formsubmit" role="form" action="{{ route('addressbook.store') }}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="addressbookid" value="@if(!empty($addressbook)){{ $addressbook->id }}@endif">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Name <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Name"
                       value="@if(!empty($addressbook)){{ $addressbook->name }}@endif" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Company</label>
                <input type="text" class="form-control" name="company" placeholder="Company"
                       value="@if(!empty($addressbook)){{ $addressbook->company }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Address Line 1 <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="address1" placeholder="Address1"
                       value="@if(!empty($addressbook)){{ $addressbook->address1 }}@endif" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Address Line 2</label>
                <input type="text" class="form-control" name="address2" placeholder="Address2"
                       value="@if(!empty($addressbook)){{ $addressbook->address2 }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Address Line 3</label>
                <input type="text" class="form-control" name="address3" placeholder="Address3"
                       value="@if(!empty($addressbook)){{ $addressbook->address3 }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>City <span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="city" placeholder="City"
                       value="@if(!empty($addressbook)){{ $addressbook->city }}@endif" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>State/Province</label>
                <input type="text" class="form-control" name="state" placeholder="State/Province"
                       value="@if(!empty($addressbook)){{ $addressbook->state }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Zip/Postal Code <span style="color: red;">*</span></label>
                <input type="text" class="form-control zipcode" name="postalcode" placeholder="Zip/Postal Code"
                       value="@if(!empty($addressbook)){{ $addressbook->postalcode }}@endif" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id">
                    @if(!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                                    @if(!empty($addressbook) && $addressbook->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email"
                       value="@if(!empty($addressbook)){{ $addressbook->email }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone_number" placeholder="Phone"
                       value="@if(!empty($addressbook)){{ $addressbook->phone_number }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary submitbutton">@if(!empty($addressbook)) Update @else
                        Add @endif <span class="spinner"></span></button>
            </div>
        </div>
    </div>


</form>

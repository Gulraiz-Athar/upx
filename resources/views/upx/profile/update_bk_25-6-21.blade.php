@extends('layouts.app')
@section('content')
@section('pageTitle', 'Weight')
<style type="text/css">
    .error {
        color: red;
        font-weight: 100;
    }
</style>


<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @include('upx.includes.message')
        <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" class="formsubmit" id="submitform" enctype="multipart/form-data"
                      action="{{ route('profile.store') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-user"></i> First Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ auth::user()->name }}"
                                           placeholder="First Name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('name') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-user"></i> Last Name <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="lastname"
                                           value="{{ auth::user()->lastname }}" placeholder="Last Name" required>
                                    @if ($errors->has('lastname'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('lastname') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-envelope"></i> Email <span
                                            style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                           value="{{ auth::user()->email }}" placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-phone" aria-hidden="true"></i> Phone <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="phone"
                                           value="{{ auth::user()->userdetail->phone }}" placeholder="Phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('phone') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-building-o" aria-hidden="true"></i> Company <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="company"
                                           value="{{ auth::user()->userdetail->company }}" placeholder="Company"
                                           required>
                                    @if ($errors->has('company'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('company') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-address-card-o"></i> Address1 <span
                                            style="color: red;">*</span></label>
                                    <input class="form-control" name="address1" placeholder="Address1"
                                           value="{{ auth::user()->userdetail->address1 }}" required>
                                    @if ($errors->has('address1'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('address1') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Address2</label>
                                    <input type="text" class="form-control" name="address2"
                                           value="{{ auth::user()->userdetail->address2 }}" placeholder="Address2">
                                    @if ($errors->has('address2'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('address2') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Address3</label>
                                    <input type="text" class="form-control" name="address3"
                                           value="{{ auth::user()->userdetail->address3 }}" placeholder="Address3">
                                    @if ($errors->has('address3'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('address3') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-home" aria-hidden="true"></i> City <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="city"
                                           value="{{ auth::user()->userdetail->city }}" placeholder="City" required>
                                    @if ($errors->has('city'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('city') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <i class="fa fa-map" aria-hidden="true"></i> State/Province </label>
                                    <input type="text" class="form-control" name="state"
                                           value="{{ auth::user()->userdetail->state }}" placeholder="State/Province">
                                    @if ($errors->has('state'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('state') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-flag" aria-hidden="true"></i> Country <span
                                            style="color: red;">*</span></label>
                                    <select class="form-control" name="country_id" style="width: 100%;">
                                        @if(!empty($countries))
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{ $country->id }}" @if($country->id == auth::user()->userdetail->country_id) {{ 'selected' }} @endif>{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><i class="fa fa-map-pin" aria-hidden="true"></i> Postal code <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="postal_code"
                                           value="{{ auth::user()->userdetail->postal_code }}" placeholder="Postal code"
                                           required>
                                    @if ($errors->has('postal_code'))
                                        <span class="help-block" style="color:red;">
                           <strong>{{ $errors->first('postal_code') }}</strong>
                           </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        @php $image = url('public/images/users/default.png'); @endphp
                        @if(!empty(auth()->user()->image) && auth()->user()->image !== null)
                            @php $image = url('public/images/users/'.auth()->user()->image); @endphp
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <span style="width: 100%;  text-align: center; float: left;"><img
                                                    src="{{ $image }}" style="max-width: 150px;" class="image_preview"
                                                    width="auto" height="100px"></span>
                                        <label> Profile Image </label>

                                        <input type="file" class="form-control changeuserimage" accept="image/*"
                                               name="imageuser">
                                        @if ($errors->has('imageuser'))
                                            <span class="help-block" style="color:red;">
                                 <strong>{{ $errors->first('imageuser') }}</strong>
                                 </span>
                                        @endif
                                    </div>
                                </div>
                                @if(auth()->user()->role == 'agent')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $logoimage = url('public/images/users_logos/defaultlogo.png'); @endphp
                                            @if(!empty(auth()->user()->logo_image) && auth()->user()->logo_image !== null)
                                                @php $logoimage = url('public/images/users_logos/'.auth()->user()->logo_image); @endphp
                                            @endif
                                            <span style="width: 100%; text-align: center; float: left;"><img
                                                    class="logo_preview" style="max-width: 150px;"
                                                    src="{{ $logoimage }}" width="auto" height="100px"></span>
                                            <label> Logo Image </label>
                                            <input type="file" class="form-control logo_image" accept="image/*"
                                                   name="logo_image_user">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary submitbutton">Update <span class="spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@push('script')

    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript"
            src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
    <script type="text/javascript">
        function readURL(input, classes) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.' + classes).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('body').on('change', '.logo_image', function () {
                readURL(this, 'logo_preview');
            });
            $('body').on('change', '.changeuserimage', function () {
                readURL(this, 'image_preview');
            });
            $(".formsubmit").validate({
                rules: {
                    imageuser: {accept: "image/jpg,image/jpeg,image/png,image/gif"},
                    logo_image_user: {accept: "image/jpg,image/jpeg,image/png,image/gif"},
                },
                messages: {
                    imageuser: {accept: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed.'},
                    logo_image_user: {accept: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed.'}
                }

            });
        });
    </script>
@endpush
@endsection

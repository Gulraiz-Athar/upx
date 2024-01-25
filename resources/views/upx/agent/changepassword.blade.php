<form action="{{ route('agent.updatepassword') }}" method="post" class="form-horizontalupdatepass agentpassword">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="hidden" name="agentid"
                       value="@if(!empty($agent)){{ $agent->id }}@endif">
                <label class="pull-left"> Password</label>
                <input type="password" id="mainpassword" class="form-control" name="password"
                       placeholder="Password"
                       value="" required>
            </div>
            <div class="form-group">
                <label class="pull-left">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation"
                       placeholder="Confirm Password"
                       value="" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right">
                Update <span class="spinner"></span>
            </button>
        </div>
    </div>
</form>

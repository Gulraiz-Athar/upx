
<form class="form-some-up form-block formsubmit" role="form" action="{{ route('weight.update',['id'=>$weight->id]) }}" method="post" >
  {{csrf_field()}}
  {{ method_field('PATCH') }}

<div class="row">
  <div class="col-md-12">
      <div class="form-group">
        <label>Weight</label>
        <input type="text" class="form-control"  name="weight" placeholder="Weight" value="@if(!empty($weight)){{ $weight->weight }}@endif"  required>
      </div>
  </div>

   
</div>

<div class="form-group">
   <button type="submit" class="btn btn-primary">Update<span class="spinner"></span></button>
</div>
</form>
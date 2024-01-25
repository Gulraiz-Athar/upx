@extends('layouts.app')
@section('content')
@section('pageTitle', 'Price Slab')


@include('upx.includes.topbar')
<style>
.textprice {
    width: 60px;
    border-radius: 5px;
    border: 1px solid #9a9a9a;
    padding-left: 5px;
    display: none;
  }
.tableload table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}


.tableload th, td {
  padding: 5px;
  text-align: center;
}
.upx {
  background: #757575;
    color: #fff;
    font-weight: 600;
    width: 90px;
}
.agent {
  background: #adadad;
    color: #fff;
    font-weight: 600;
    width: 90px;
}
.tableload tr:hover{
  background-color: #ccecff;
}
.pricetype{

  width: 90%;
    border: 1px solid #aaa;
    line-height: 26px;
    background-color: #fff;
    border-radius: 4px;
    height: 26px;
    color: #999;
}
.weightwidth{
  width: 90px;
}
</style>
<section class="content">
   <div class="box">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="row">


                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Services</label>
                        <select class="form-control serviceselect" >
                           @if(!empty($services))
                           @foreach($services as $service)
                           <option value="{{ $service->id }}">{{ $service->name }}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <!-- <div class="col-md-3">
                     <div class="form-group">
                        <label>Zone : </label>
                        <select class="zonemultiple" multiple="multiple" data-placeholder="Select a Zone"
                           style="width: 90%;">
                           @if(!empty($zones))
                           @foreach($zones as $zone)
                           <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div> -->
                  <!-- <div class="col-md-3">
                     <div class="form-group">
                        <label>Weight : </label>
                        <select class="weightmultiple" multiple="multiple" data-placeholder="Select a Weight"
                           style="width: 90%;">
                           @if(!empty($weights))
                           @foreach($weights as $weight)
                           <option value="{{ $weight->id }}">{{ $weight->weight }}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div> -->
                 <!--  <div class="col-md-3">
                     <div class="form-group">
                        <label>Price Type : </label>
                        <select class="user_type pricetype" style="width: 100%;">
                           <option value="">Both</option>
                           <option value="upx">UPX Price</option>
                           <option value="agent">Agent Price</option>
                        </select>
                     </div>
                  </div> -->
                  <div class="col-md-3">
                     <div class="form-group">
                        <label>Agents</label>
                        <select class="agentmultiple pricetype agenttype" data-placeholder="Select a agent"  multiple="multiple" style="width: 90%;" >
                           @if(!empty($agents))
                           @foreach($agents as $agent)
                           <option value="{{ $agent->id }}">{{ $agent->name }} {{ $agent->lastname }}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3" style="margin-top: 23px;">
                     <div class="form-group">
                        <button  class="btn btn-primary btn-sm searchdata"><i class="fa fa-search" aria-hidden="true"></i> Search <span class="spinner"></span></button>
                        <a href="{{ url('upx/price') }}" class="btn btn-sm btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 tableload">
      </div>
   </div>
</section>
@push('links')
  <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">
@endpush
 @push('script')
<script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
      searchdata();


      $('.searchdata').click(function(){
        searchdata();
      });
      $('body').on('click','.priceclick',function(){

        var zoneid = $(this).data('zoneid');
        var weightid =  $(this).data('weightid');
        var type =  $(this).data('type');
        var agentid =  $(this).data('agentid');
        var service_type =  $(this).data('service_type');
        var pricetype =  $(this).data('pricetype');

        
        $('.finalvalue'+zoneid+weightid+type+agentid+service_type+pricetype).hide()
        $('.pricetab'+zoneid+weightid+type+agentid+service_type+pricetype).show();
        $('.pricetab'+zoneid+weightid+type+agentid+service_type+pricetype).focus();

        $('.pricetab'+zoneid+weightid+type+agentid+service_type+pricetype).inputmask('decimal', {
            rightAlign: true
          });

      });

      $('body').on('blur','.textprice',function(){

        var zoneid = $(this).data('zoneid');
        var weightid =  $(this).data('weightid');
        var type =  $(this).data('type');
        var price = $(this).val();
        var agentid = $(this).data('agentid');
        var service_type =  $(this).data('service_type');
        var pricetype =  $(this).data('pricetype');
        
        //$('.finalvalue'+zoneid+weightid+type).html('<b>&#163; </b> '+$(this).val());
        savedata(zoneid,weightid,type,price,agentid,service_type,pricetype);

      });

      $('body').on('keypress','.textprice',function(e) {
          if(e.which == 13) {
              var zoneid = $(this).data('zoneid');
          var weightid =  $(this).data('weightid');
          var type =  $(this).data('type');
          var price = $(this).val();
          var agentid = $(this).data('agentid')
          var service_type =  $(this).data('service_type');
          var pricetype =  $(this).data('pricetype');
         
          //$('.finalvalue'+zoneid+weightid+type).html('<b>&#163; </b> '+$(this).val());
          savedata(zoneid,weightid,type,price,agentid,service_type,pricetype);
          }
      });
    });

    function savedata(zoneid,weightid,type,price,agentid=0,service_type,pricetype){

      $('.finalvalue'+zoneid+weightid+type+agentid+service_type+pricetype).show();
        $('.pricetab'+zoneid+weightid+type+agentid+service_type+pricetype).hide();
        var service_type_main = $('.service_type_main').val();
        $.ajax({
                  url : "{{ route('price.change') }}",
                  data : {zoneid:zoneid,weightid:weightid,type:type,price:price,agentid:agentid,service_type:service_type,pricetype:pricetype,service_type_main:service_type_main},
                  type: 'POST',
                  async:false,
                  headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  success:function(data){
                    $('.finalvalue'+zoneid+weightid+type+agentid+service_type+pricetype).html('<b>&#163; </b> '+Math.abs(price));
                  },
                  beforeSend: function() {
                    $('.finalvalue'+zoneid+weightid+type+agentid+service_type+pricetype).html('<i class="fa fa-spinner fa-spin"></i>');
                     // $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                  },
                  error: function(){
                     // $('.spinner').html('');
                      new PNotify({
                          title: 'Oh No!',
                          text: 'Something went wrong!',
                          type:'error'
                      });

                  }
              });
    }

    function searchdata(){
      $.ajax({
                url : "{{ route('table.load') }}",
                data : {agentids:$('.agenttype').val(),weightids:$('.weightmultiple').val(),user_type:$('.user_type').val(),serviceselect:$('.serviceselect').val()},
                type: 'POST',
                headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
                success:function(data){
                  $('.spinner').html('');
                    $('.tableload').html(data);
                    $('body').tooltip({
              selector: '.tooltipshow'
          });

                },
                beforeSend: function() {
                    $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                },
                error: function(){
                    $('.spinner').html('');
                    new PNotify({
                        title: 'Oh No!',
                        text: 'Something went wrong!',
                        type:'error'
                    });

                }
            });
    }

   $(function () {
        $('.zonemultiple').multipleSelect();
        $('.weightmultiple').multipleSelect();
        $('.agentmultiple').multipleSelect();
      })

</script>
<script type="text/javascript">
    /*document price on click */
    $('body').on('click','.documentpriceclick',function(){

        var zoneid = $(this).data('zoneid');
        var weightid =  $(this).data('weightid');
        var type =  $(this).data('type');
        var agentid =  $(this).data('agentid');
        var service_type =  $(this).data('service_type');
        var pricetype =  $(this).data('pricetype');

        $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).hide()
        $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).show();
        $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).focus();

        $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).inputmask('decimal', {
            rightAlign: true
        });

    });
    $('body').on('blur','.documenttextprice',function(){
        var zoneid = $(this).data('zoneid');
        var weightid =  $(this).data('weightid');
        var type =  $(this).data('type');
        var price = $(this).val();
        var agentid = $(this).data('agentid');
        var service_type =  $(this).data('service_type');
        var pricetype =  $(this).data('pricetype');
        //$('.finalvalue'+zoneid+weightid+type).html('<b>&#163; </b> '+$(this).val());

        //if(price > 0){
            documentsavedata(zoneid,weightid,type,price,agentid,service_type,pricetype);
       // }
        $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).show();
        $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).hide();

    });

    $('body').on('keypress','.documenttextprice',function(e) {
        if(e.which == 13) {

            var zoneid = $(this).data('zoneid');
            var weightid =  $(this).data('weightid');
            var type =  $(this).data('type');
            var price = $(this).val();
            var agentid = $(this).data('agentid')
            var service_type =  $(this).data('service_type');
            var pricetype =  $(this).data('pricetype');
            //$('.finalvalue'+zoneid+weightid+type).html('<b>&#163; </b> '+$(this).val());
            //if(price > 0){
                documentsavedata(zoneid,weightid,type,price,agentid,service_type,pricetype);
           // }
            $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).show();
            $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).hide();
        }
    });

    function documentsavedata(zoneid,weightid,type,price,agentid=0,service_type,pricetype){
        $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).show();
        $('.documentpricetab'+zoneid+type+agentid+service_type+pricetype).hide();
        $.ajax({
            url : "{{ route('price.documentchange') }}",
            data : {zoneid:zoneid,weightid:weightid,type:type,price:price,agentid:agentid,service_type:service_type,pricetype:pricetype},
            async:false,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                price = parseFloat(price).toFixed(2);
                $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).html('<b>&#163; </b> '+Math.abs(price));
            },
            beforeSend: function() {

                $('.documentfinalvalue'+zoneid+type+agentid+service_type+pricetype).html('<i class="fa fa-spinner fa-spin"></i>');
                // $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
            },
            error: function(){
                // $('.spinner').html('');
                new PNotify({
                    title: 'Oh No!',
                    text: 'Something went wrong!',
                    type:'error'
                });

            }
        });
    }
</script>
@endpush
@endsection

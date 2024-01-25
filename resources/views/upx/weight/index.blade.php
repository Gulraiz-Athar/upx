@extends('layouts.app')
@section('content')
@section('pageTitle', 'Weight')


@include('upx.includes.topbar')

@push('links')
<style type="text/css">

 
  .country_tag{
      background-color: #3c8dbc;
      font-weight:100; 
      font-size:14px;
      margin-right: 5px; 
      color: #fff; 
      padding: 5px 15px;    
  }

  
</style>
@endpush
<!-- Main content -->

    <section class="content">
      <div class="row">

      	<div class="col-md-12">
		
		<a  href="{{ route('weight.create')}}"  class="btn btn-success btn-sm pull-right" class="pull-right btn btn-circle btn-default btn-sm" style="margin-bottom: 15px;">
			<i class="fa fa-plus"></i> Add 
		</a>
    <a class="btn btn-danger btn-sm pull-right deleteweights"  style="margin:0px 10px 15px 0px;">
      <i class="fa fa-trash"></i> Delete <span class="deletespinner"></span>
    </a>
		</div>
        <div class="col-xs-12">
          @include('upx.includes.message')
          <!-- /.box -->

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="agents" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Weight</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

 <div class="modal fade modal_edit_list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" style="width:300px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Weight Detail</h4>
            </div>
           

                <div class="modal-body">


                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                </div>

            
        </div>
    </div>

</div>

@push('script')
<script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script>
  $(function () {
    
    var table = $('#agents').DataTable({
  			processing: true,
  			serverSide: true,
        orderable: false,
        columnDefs: [
           {
              'targets': 0,
              'checkboxes': {
                 'selectRow': true
              }
           }
        ],
         select: {
           'style': 'multi'
        },
        order: [[1, 'asc']],
  			ajax: {
  				'url': "{{ route('weight.getall') }}",
  				'type': 'POST',
  				'data': function ( d ) {
            			d._token = "{{ csrf_token() }}";
            
          		},
  			},
  			columns: [
  			{ data: 'id'},
  			{ data: 'weight'},
  			{ data: 'action',"orderable": false},
  			
  			]
  	});

    $('.deleteweights').click(function(){
         var rows_selected = table.column(0).checkboxes.selected();
          var weightids = [];
          i = 0;
          $.each(rows_selected, function(index, rowId){
             // Create a hidden element
            weightids[i++] = rowId;
            
          });
          if(weightids.length){
                    (new PNotify({
                title: 'Confirmation Needed',
                text: 'Are you sure you want to delete selected weight?',
                icon: 'glyphicon glyphicon-question-sign',
                hide: false,
                confirm: {
                  confirm: true
                },
                buttons: {
                  closer: false,
                  sticker: false
                },
                history: {
                  history: false
                },
                addclass: 'stack-modal',
                stack: {
                  'dir1': 'down',
                  'dir2': 'right',
                  'modal': true
                }
              })).get().on('pnotify.confirm', function() {
                $.ajax({
                  url : '{{ route("weight.multidelete") }}',
                  type: 'POST',
                  data:{weightids:weightids},
                  headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  beforeSend: function(){
                     $('.deletespinner').html('<i class="fa fa-spinner fa-spin"></i>'); 
                  },
                  success:function(data){
                    $('.deletespinner').html(''); 
                    PNotify.removeAll();
                    if(data.status == 400)
                    {
                      new PNotify({
                        title: 'Oh No!',
                        text: data.msg,
                        type:'error'
                      });
                    }
                    if(data.status == 200)
                    {

                      new PNotify({
                        title: 'Success!',
                        text: 'Weight deleted successfully.',
                        type:'success'
                      });
                      $("#agents").DataTable().ajax.reload();
                    }

                  },
                  error: function(){
                    PNotify.removeAll();
                    $('.deletespinner').html(''); 
                    new PNotify({
                      title: 'Oh No!',
                      text: 'Something went wrong!',
                      type:'error'
                    });
                  }
                });
              });
          }else{
            PNotify.removeAll();
            new PNotify({
                      title: 'Oh No!',
                      text: 'Please select at least one weight to delete.',
                      type:'error'
                    });
          }   
    })

    $('body').on('click','.openform',function(){
                var id = $(this).data('wight_id');
                $.ajax({
                    url : "{{ route('weight.getmodel')}}",
                    type: 'POST',
                    headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data : {wight_id:id},
                    beforeSend: function(){
                      $('.modal-body').html('<h5>loading..</h5>')
                    },
                    success:function(data){
                      $('.modal-body').html(data);
                      
                       
                    },
                    
                  });
    });

    $('body').on('submit','.formsubmit',function(e){
                e.preventDefault();
                $.ajax({
                    url : $(this).attr('action'),
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,       
                    cache: false,             
                    processData:false, 
                    beforeSend: function(){
                      $('.spinner').html('<i class="fa fa-spinner fa-spin"></i>')
                    },
                    success:function(data){
                    PNotify.removeAll();
                     if(data.status == 400){
                        $('.spinner').html('');
                       	new PNotify({
            							title: 'Oh No!',
            							text: data.msg,
            							type:'error'
            						});
                     }
                      if(data.status == 200){
                        $('.spinner').html('');
                         $('.modal_edit_list').modal('hide');
                         $('#agents').DataTable().ajax.reload();
                         $.notify(data.msg,'success');
                      }

                    },
                    
                });
    });

  	$('body').on('click','.delete_weight',function(){
  		var id = $(this).data('id');
  		(new PNotify({
  			title: 'Confirmation Needed',
  			text: 'Are you sure?',
  			icon: 'glyphicon glyphicon-question-sign',
  			hide: false,
  			confirm: {
  				confirm: true
  			},
  			buttons: {
  				closer: false,
  				sticker: false
  			},
  			history: {
  				history: false
  			},
  			addclass: 'stack-modal',
  			stack: {
  				'dir1': 'down',
  				'dir2': 'right',
  				'modal': true
  			}
  		})).get().on('pnotify.confirm', function() {
  			$.ajax({
  				url : '{{ url("upx/weight") }}/' + id,
  				type: 'DELETE',
  				headers: {
  					'X-CSRF-TOKEN': '{{ csrf_token() }}'
  				},
  				beforeSend: function(){
  				},
  				success:function(data){
  					if(data.status == 400)
  					{
  						new PNotify({
  							title: 'Oh No!',
  							text: data.msg,
  							type:'error'
  						});
  					}
  					if(data.status == 200)
  					{
  						$("#agents").DataTable().ajax.reload();
  					}

  				},
  				error: function(){
  					new PNotify({
  						title: 'Oh No!',
  						text: 'Something went wrong!',
  						type:'error'
  					});
  				}
  			});
  		});
  	});
    
  });
</script>
@endpush
@endsection
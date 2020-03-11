@include('layout.header')
@include('layout.navinner')
@include('layout.leftmenu')
<div class="content-wrapper">
<section class="content-header">
 <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Individual List</h3>
          <div class="floatright">
          <span>
          <a class="btn btn-info btn-sm" target="_self" href="/playerlist?excel" download="playerlist.csv">Export Players</a>
          </span>
          <span><i class="fa fa-user-plus"></i><a href="registration">Add Player</a></span>
          </div>                   
        </div>
        <!-- /.box-header -->
        <div class="box-body">        
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
            <div class="col-sm-12"> 
                  <ul class="tags"> 
                  <li class="filter-title">Filter: </li>
                  <li class="morefilter bt-cursor"><a data-toggle="modal" data-target="#filterModal">More filter</a></li>
                  @foreach($filters as $key => $filter)
                 <li> <b>{{ $key }} : </b>
                 @if($key=='status')
                  @if($filter ==1)
                  Approved
                  @else 
                  UnApproved
                  @endIf
                  @else
                 {{ $filter }} 
                 @endIf
                 
                 </li>
                  @endforeach
                </ul>          
                </div>
              <div class="col-sm-12">
                <div class="box player">
                  @if(session()->has('success'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('success') }} .
                  </div>
                  @endIf
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                            <th class="sorting_asc" rowspan="1" colspan="1" >ID Number</th>                        
                            <th class="sorting" rowspan="1" colspan="1">Given Name</th>
                            <th class="sorting" rowspan="1" colspan="1">Surname</th> 
                            <th class="sorting" rowspan="1" colspan="1">Session</th>
                            <th class="sorting" rowspan="1" colspan="1" >Start Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >End Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >Status</th>
                            @if(Auth::user()->client_admin==1)
                            <th class="sorting" rowspan="1" colspan="1" style="min-width: 100px;" >Operation</th>
                            @endIf
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $player)
                            <tr>
                            <td><a href="playerprofile/{{$player->player->id}}"> {{$player->player->child_idno}}</a></td>
                            <td>{{$player->player->child_givenname}}</td>
                            <td>{{$player->player->child_surname}}</td>
                            <td>{{$player->session->name}}</td>
                            <td>{{$player->start_date}}</td>
                            <td>{{$player->end_date}}</td>
                            <td>
                            @if($player->status==1) Approved @else UnApproved @endIf
                            </td>
                            @if(Auth::user()->client_admin==1)
                            <td>
                            <button type="button" class="btn btn-info btn-sm btndelete" data-widget="remove" data-toggle="tooltip" data-sessionplayer="{{$player->id}}" title="Remove">
                          <i class="fa fa-trash-o"></i></button>
                          <button type="button" class="btn btn-info btn-sm btnedit" data-widget="search" title="quick Approve" data-playerid="{{$player->id}}">
                          <i class="fa fa-check"></i></button>
                            </td>
                            @endIf
                            </tr>
                        @endforeach                        
                        </tbody>         
                    </table>
                    {{ $players->links() }}
                    </div>        
                  </div>
                </div>
              </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Player Details</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" action="status_update">
          <input type="hidden" id="player_id" name="player_id" value=""/>
                <div class="col-sm-12">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Start Date<span class="required-feild">*</span></label>
                        <div class="col-md-8 inputGroupContainer">
                          <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input class="form-control" id="date" name="start_date" placeholder="DD-MM-YYY" type="text" autocomplete="off"/>
                          </div> 
                        </div>
                    </div>                  
                  <div class="form-group">
										<label class="col-md-4 control-label">End Date<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
											<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="date2" name="end_date" placeholder="DD-MM-YYY" type="text" autocomplete="off"/>
											</div> 
											</div>
									</div>
                  <div class="form-group">
										<label class="col-md-4 control-label">Status<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="status" id="status" class="form-control selectpicker" required>
													<option value="1">Approved</option>
													<option value="0">UnApproved</option>
												</select>
											</div>
										</div>
									</div>
                </div><!-- col-sm-12 -->
                <div class="form-group">
									<label class="col-md-4 control-label"></label>
										<div class="col-md-8">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary btn-save">Save</button>
										</div>
								</div>
          </form>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filters</h4>
        </div>
        <div class="modal-body">
                <div class="col-sm-12">
                <div class="form-group">
										<label class="col-md-4 control-label">Session End Date</label>
											<div class="col-md-8 inputGroupContainer">
                        <div id="reportrange" class="form-control" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                        </div> 
											</div>
                  </div>
                  <br>
                  <br>                  
									<div class="form-group">
										<label class="col-md-4 control-label">Nationality</label>  
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">								
											<select name="nationality" id="nationality" class="form-control selectpicker">
												<option value="">Select</option>
												@foreach($countries as $nation)
												<option value="{{$nation->nationality_id}}">{{$nation->nationality_name}}</option>
												@endforeach
											</select>
											</div>
										</div>
									</div>
                  <br>
                  <br>
                  <div class="form-group">
										<label class="col-md-4 control-label">Status</label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="status" id="flstatus" class="form-control selectpicker">
                        <option value="">All</option>
													<option value="1">Approved</option>
													<option value="0">UnApproved</option>
												</select>
											</div>
										</div>
									</div>
                  <br>
                  <br>
                </div><!-- col-sm-12 -->                
                <div class="form-group">
									<label class="col-md-4 control-label"></label>
										<div class="col-md-8">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" id="get_player" class="btn btn-primary btn-save">Filter</button>
										</div>
								</div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </section>
</div>

@include('layout.footer')
<script>
	$(document).ready(function () {
		$('.sidebar-menu').tree()
		var h = window.innerHeight+600;  
  $('.content-wrapper').css('min-height', h);
  $('.main-sidebar').css('min-height', h);
$(".btndelete").click(function(){
  var result = confirm("Do you want to delete ?");
  if (result) {
    var plsession = $(this).data("sessionplayer");
    var url = window.location.origin+'/playerdelete/'+plsession
    location.assign(url);
  }
});
  $(".btnedit").click(function () {
            //get data from table row
            
            var d1 = $(this).parent().prev().prev().prev().text();
            var d2 = $(this).parent().prev().prev().text();
            var p2 = $(this).parent().prev().text();
            var pl = $(this).data("playerid");
            var stat = p2.trim();
console.log('item',p2.trim());

            //assign to value for input box inside modal
            $("#date2").val(d2);
            $("#date").val(d1);
            $("#player_id").val(pl);
            $("#txt_Price2").val(p2);
            if(stat == 'Approved'){
              $("#status").val(1);
            }else{
              $("#status").val(0);
            }

            //open modal
            $("#myModal").modal();

            $("#btnsave").click(function () {
                //make ajax request to update data

                //and in ajax success callback function 
                //hide modal
                //$("#myModal").modal("hide")              
            })
        })

	})

   var date_input=$('input[name="start_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    var date_input2=$('input[name="end_date"]'); //our date input has the name "date"
      var container2=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container2,
        todayHighlight: true,
        autoclose: true,
      };
      date_input2.datepicker(options);  
   setTimeout(function(){ var h = window.innerHeight;
  $('.main-sidebar').css('min-height', h); }, 300);  

$(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + '-' + end.format('DD/MM/YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'This Week': [moment().startOf('isoWeek'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

   // cb(start, end);

});
$('#get_player').click(function() {
  var st = $('#flstatus').val();
  var dat = $('#reportrange span').text();
  var nation = $('#nationality').val();
  var base_url = window.location.origin+ window.location.pathname;
  var st = $('#flstatus').val();
  var urlParams = new URLSearchParams(window.location.search);
  var par_fl = false;
  var page_det = ''; 
      if(st&&dat&&nation){
        page_det = '?status='+st+'&date_range='+dat+'&country='+nation;
        par_fl = true;
      }else if(st&&dat){
          page_det = '?status='+st+'&date_range='+dat; 
          par_fl = true;
        }else if(st&&nation){
          page_det = '?status='+st+'&country='+nation;
          par_fl = true;
        }else if(dat&&nation){
          page_det = '?date_range='+dat+'&country='+nation;
          par_fl = true;
        } else{
         if(st){
          page_det = '?status='+st; 
          par_fl = true;
         } 
         if(dat){
          page_det = '?date_range='+dat; 
          par_fl = true;
         }
         if(nation){
          page_det = '?country='+nation; 
          par_fl = true;
         }
      }
      // if(urlParams.has('page')){
      //   if(par_fl){
      //     page_det=page_det+'&page='+urlParams.get('page');
      //   }else{
      //     page_det = '?page='+urlParams.get('page');
      //   }
      // }
      var url = base_url+page_det;
      location.assign(url);
    });
</script>
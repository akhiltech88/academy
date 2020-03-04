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
          <h3 class="box-title">Team List</h3>
          <div class="floatright">
          <span>
          <span><i class="fa fa-user-plus"></i><a href="teamregistration">Add Team</a></span>
          </div>                   
        </div>
        <!-- /.box-header -->
        <div class="box-body">        
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-12">
                <div class="box player">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                            <th class="sorting_asc" rowspan="1" colspan="1" >Team Name</th>  
                            <th class="sorting" rowspan="1" colspan="1">Contact Mobile</th>
                            <th class="sorting" rowspan="1" colspan="1" >No Of Players</th>
                            <th class="sorting" rowspan="1" colspan="1">Session</th>
                            <th class="sorting" rowspan="1" colspan="1" >Start Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >End Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->contact}}</td>
                            <td>{{$team->total_players}}</td>
                            @if(isset($team->team_session))
                            <td>{{$team->team_session->session->name}}</td>
                            <td>{{$team->team_session->start_date}}</td>
                            <td>{{$team->team_session->end_date}}</td>
                            <td>
                            @if($team->team_session->status==1) Approved @else Un Approved @endIf
                            </td>
                            @else
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            @endIf
                            </tr>
                        @endforeach                        
                        </tbody>         
                    </table>
                    {{ $teams->links() }}
                    </div>        
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
	})
   //Date picker
   $('#datepicker').datepicker({
   	dateFormat: 'dd-mm-yy',
   	autoclose: true
   });
   $('#datepicker1').datepicker({
   	dateFormat: 'dd-mm-yy',
   	autoclose: true
   });
   $('#datepicker2').datepicker({
   	dateFormat: 'dd-mm-yy',
   	autoclose: true
   });  
   setTimeout(function(){ var h = window.innerHeight;
  $('.main-sidebar').css('min-height', h); }, 300);
  
</script>
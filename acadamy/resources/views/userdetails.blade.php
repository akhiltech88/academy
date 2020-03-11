@include('layout.header')
@include('layout.navinner')
@include('layout.leftmenu')
<div class="content-wrapper">
<section class="content-header">
 <section class="content">
  <div class="row">
  <div class="col-md-4">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">

						<h3 class="profile-username text-center">{{$user->name}}</h3>             
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item" ng-if="letter">
								<b>Email: </b> <a class="pull-right">{{$user->email}}</a>
							</li>
						</ul>						

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->          
			</div>
			<!-- /.col -->

    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Player List</h3>
          <div class="floatright">
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
                            <th class="sorting_asc" rowspan="1" colspan="1" >ID Number</th>                        
                            <th class="sorting" rowspan="1" colspan="1">Given Name</th>
                            <th class="sorting" rowspan="1" colspan="1">Surname</th> 
                            <th class="sorting" rowspan="1" colspan="1">Session</th>
                            <th class="sorting" rowspan="1" colspan="1" >Start Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >End Date</th>
                            <th class="sorting" rowspan="1" colspan="1" >Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $player)
                            <tr>
                            <td>{{$player->child_idno}}</td>
                            <td>{{$player->child_givenname}}</td>
                            <td>{{$player->child_surname}}</td>
                            @if(isset($player->player_session))
                            <td>{{$player->player_session->session->name}}</td>
                            <td>{{$player->player_session->start_date}}</td>
                            <td>{{$player->player_session->end_date}}</td>
                            <td>
                            @if($player->player_session->status==1) Approved @else UnApproved @endIf
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
                    {{ $players->links() }}
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
   setTimeout(function(){ var h = window.innerHeight;
  $('.main-sidebar').css('min-height', h); }, 300);
  
</script>
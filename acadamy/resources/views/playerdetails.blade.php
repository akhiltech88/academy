@include('layout.header')
@include('layout.navinner')
@include('layout.leftmenu')
<div class="content-wrapper" id="box">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Player Profile
		</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Home</li>
			<li><a href="/playerlist">Player List</a></li>
			<li class="active">Player profile</li>
		</ol>
	</section>
    <!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
					
						<h3 class="profile-username text-center">{{$players->child_givenname}}</h3>             
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Player Given Name </b> <a class="pull-right">{{$players->child_givenname}}</a>
							</li>
                            <li class="list-group-item">
								<b>Player SurName </b> <a class="pull-right">{{$players->child_surname}}</a>
							</li>
                            <li class="list-group-item">
								<b>Player Id Number </b> <a class="pull-right">{{$players->child_idno}}</a>
							</li>
                            <li class="list-group-item">
								<b>Player Date of birth</b> <a class="pull-right">{{$players->dob}}</a>
							</li>
							<li class="list-group-item">
								<b>Id Copy </b> <a class="pull-right" target="_self" href="{{$players->player_idcopy}}" download="{{$players->child_givenname}}.pdf">Download</a>
							</li>
                            <!-- <li class="list-group-item">
								<b>Medical Condition </b> <a class="pull-right">{{$players->medical}}</a>
							</li> -->
							<li class="list-group-item">
 								<b>Status</b> <a class="pull-right">
 								<span>@if($players->player_session->status==1) Approved @else UnApproved @endIf</span>								
 								</a>
 							</li>
						</ul>
						<!-- <div class="bottom-bar">

							<div class="col-md-12 nopadding">
								
								<div ng-if="superAdmin == 'true'">
									<button ng-if="profileLists.admin_approved != 1" type="button" ng-click="approveTeam(profileLists.team_id);" class="btn btn-primary btn-save">Approve</button>
									<button ng-if="profileLists.admin_approved == 1" type="button" ng-click="rejectTeam(profileLists.team_id)" class="btn btn-primary btn-pre">Un Approve</button>
								</div>
							</div>
						</div>							 -->

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->          
			</div>
			<!-- /.col -->
			<div class="col-md-8">
				<div class="box">
					<div class="about-section">
						<div class="box-header with-border">
							<h3 class="box-title">About</h3>
							<div class="floatright"> 		
 								<!-- <a target="_blank" class="btn btn-info btn-sm">Pdf</a> -->
 							</div>
						</div>
						<div class="box-body">

							<div class="col-sm-12">	
								<table id="example2" class="table dataTable" role="grid" aria-describedby="example1_info">								
									<tbody>									
										<tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Parent SurName</td>
											<td>{{$players->parent_surname}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Parent Given Name</td>
											<td>{{$players->parent_givenname}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Parent Id Number</td>
											<td>{{$players->parent_idno}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
 											<td class="title-bold">ID Copy</td>
 											<td><a target="_self" href="{{$players->parentid_copy}}" download="{{$players->parent_givenname}}.pdf">Download</a></td>									 
 										</tr>
                                         <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Postal Address</td>
											<td>{{$players->postal_addr}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Code</td>
											<td>{{$players->postal_code}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Email</td>
											<td>{{$players->parent_email}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Cell</td>
											<td>{{$players->parent_cell}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Fax No.</td>
											<td>{{$players->parent_fax}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Tel(W)</td>
											<td>{{$players->parent_telw}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Home Address</td>
											<td>{{$players->home_addr}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Code</td>
											<td>{{$players->home_code}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Tel(H)</td>
											<td>{{$players->parent_telh}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Employer</td>
											<td>{{$players->employer}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Other Contact Name</td>
											<td>{{$players->other_name}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Cell</td>
											<td>{{$players->other_cell}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Tel(W)</td>
											<td>{{$players->other_telh}}</td>									 
										</tr>
                                        <tr role="row" class="odd">									 
											<td class="title-bold" style="width: 300px;">Tel(H)</td>
											<td>{{$players->other_telw}}</td>									 
										</tr>

									</tbody>									
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
</div>
@include('layout.footer')
<script>
	$(document).ready(function () {
		$('.sidebar-menu').tree()
		var h = window.innerHeight+317;  
  $('.content-wrapper').css('min-height', h);
  $('.main-sidebar').css('min-height', h);
	}) 
//    setTimeout(function(){
//     var elmnt = document.getElementById("box");
// 	var h = elmnt.offsetHeight+170;
//         var h = window.innerHeight;
//   $('.main-sidebar').css('min-height', h); }, 300);
  
</script>
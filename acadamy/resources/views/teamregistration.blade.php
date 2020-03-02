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
							<h3 class="box-title">Team Registration</h3>			  
						</div>
						<div class="box-body">
							<form class="form-horizontal" method="post" action="team">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-md-4 control-label">Team Name<span class="required-feild">*</span></label>
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
											<input name="team_name" placeholder="Team Name" class="form-control" type="text" required>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Contact Person<span class="required-feild">*</span></label>
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
											<input name="contact_person" placeholder="Contact Person" class="form-control" type="text" required>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Email<span class="required-feild">*</span></label>
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
											<input name="email" placeholder="Email" class="form-control" type="email" required>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Mobile No:<span class="required-feild">*</span></label>
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
											<input name="mobile" placeholder="Mobile No" class="form-control" type="text" required>
											</div>
										</div>
								</div>
								<div class="form-group">
										<label class="col-md-4 control-label">No: Of Players<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="total_players" class="form-control selectpicker" required>
												@for ($i = 1; $i <= 15; $i++)
													<option value="{{ $i }}">{{ $i }}</option>
												@endfor
												</select>
											</div>
										</div>
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-4 control-label"></label>
										<div class="col-md-8">
										<a type="button" href="/team" class="btn btn-primary btn-pre">Cancel</a>
										<button type="submit" id="btn-submit" class="btn btn-primary btn-save">Save</button>
										</div>
								</div>
							</form>
						</div><!-- Box body -->
					</div>
				</div>
			</div>
		</section>
	</section>
</div>

@include('layout.footer')
<script>
	$(document).ready(function () {
		$('.sidebar-menu').tree()
		var h = window.innerHeight;  
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
  
</script>
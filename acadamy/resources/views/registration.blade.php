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
							<h3 class="box-title">Create Individual Registration</h3>			  
						</div>
						<div class="box-body">
							<form class="form-horizontal" method="post" action="player">
							<div class="col-sm-12">
								<h3 style="text-align:center; margin-top:5px;">CHILD INFORMATION</h3>
								<hr>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Title<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="title" class="form-control selectpicker" required>
													<option value="1">Mr.</option>
													<option value="2">Mrs.</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Sur Name<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="child_surname" placeholder="Sur Name" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Date Of Birth<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
											<div class="input-group date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input type="text" class="form-control pull-right" id="datepicker2" name="child_dob">
											</div>
											</div>
									</div>
								</div><!-- col-sm-6 -->
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Given Name<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="child_name" placeholder="Given Name" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">ID Number<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="child_idnumber" placeholder="ID Number" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Special Medical Condition<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<textarea rows="4" style="overflow:hidden;" class="form-control" name="medical" placeholder="Special Medical Condition" required >
													
												</textarea>
												</div>
											</div>
									</div>
								</div><!-- col-sm-6 -->
							</div> <!-- col-sm-12 -->
							<div class="col-sm-12">
								<hr>
								<h3 style="text-align:center;">PARENT/CONTACT PERSON DETAILS</h3>
								<hr>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Title<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="parent_title" class="form-control selectpicker" required>
													<option value="1">Mr.</option>
													<option value="2">Mrs.</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Sur Name<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_surname" placeholder="Sur Name" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Postal Address<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<textarea rows="4" style="overflow:hidden;" class="form-control" name="postal" placeholder="Postal Address" required >
													
												</textarea>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Code<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="postal_code" placeholder="Code" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Email<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="email" placeholder="Email" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Cell<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_cell" placeholder="Cell" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Fax No:<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_fax" placeholder="Fax No" class="form-control" type="text" required>
												</div>
											</div>
									</div>
								</div><!-- col-sm-6 -->
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Given Name<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_name" placeholder="Given Name" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">ID Number<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_idnumber" placeholder="ID Number" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Home Address<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<textarea rows="4" style="overflow:hidden;" class="form-control" name="home" placeholder="Home Address" required >
													
												</textarea>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Code<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="home_code" placeholder="Code" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Tel(H)<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_telh" placeholder="Tel(H)" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Tel(W)<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="parent_telw" placeholder="Tel(W)" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Employer :<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="employer" placeholder="Employer" class="form-control" type="text" required>
												</div>
											</div>
									</div>
								</div><!-- col-sm-6 -->
							</div> <!-- col-sm-12 -->
							<div class="col-sm-12">
								<hr>
								<h3 style="text-align:center;">Other contact person/next of kin</h3>
								<hr>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-6">									
									<div class="form-group">
										<label class="col-md-4 control-label">Name<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="other_contact" placeholder="Other contact" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Tel(H)<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="other_telh" placeholder="Tel(H)" class="form-control" type="text" required>
												</div>
											</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-md-4 control-label">Cell<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="other_cell" placeholder="Cell" class="form-control" type="text" required>
												</div>
											</div>
									</div>									
									<div class="form-group">
										<label class="col-md-4 control-label">Tel(W)<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="other_telw" placeholder="Tel(W)" class="form-control" type="text" required>
												</div>
											</div>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-4 control-label"></label>
										<div class="col-md-8">
										<a type="button" href="#!/players" class="btn btn-primary btn-pre">Cancel</a>
										<button type="submit" class="btn btn-primary btn-save">Save</button>
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
   setTimeout(function(){ var h = window.innerHeight+633;
  $('.main-sidebar').css('min-height', h); }, 300);
  
</script>
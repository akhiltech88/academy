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
							<h3 class="box-title">Session Registration</h3>			  
						</div>
						<div class="box-body">
							<form class="form-horizontal" method="post">
                            <div class="col-sm-12">
                                <!-- <div class="form-group">
										<label class="col-md-4 control-label">Select Individual/Team<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="total_players" class="form-control selectpicker" required>
													<option value="1">Individual</option>
                                                    <option value="2">Team</option>
												</select>
											</div>
										</div>
                                </div> -->
                                <!-- <div class="form-group"> 
										<label class="col-md-4 control-label">Session Team<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="total_players" class="form-control selectpicker" required>
													<option value="1">Team1</option>
                                                    <option value="2">Team2</option>
												</select>
											</div>
										</div>
								</div> -->
                                <div class="form-group"> <!-- Show only if individual select -->
										<label class="col-md-4 control-label">Select Player<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="total_players" class="form-control selectpicker" required>
													<option value="1">player1</option>
                                                    <option value="2">player2</option>
												</select>
											</div>
										</div>
                                </div>
                                <div class="form-group">
										<label class="col-md-4 control-label">Session Type<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="total_players" class="form-control selectpicker" required>
													<option value="1">Individual Session – 1 Session</option>
                                                    <option value="2">Individual Session – 1 Month</option>
													<option>U9 Group Session – 1 Month</option>
													<option value="">U9 Group Session – 3 Months</option>
													<option value="">U9 Group Session – 6 Months</option>
													<option value="">U9 Group Session – 12 Months</option>
													<option value="">U11 Group Session – 1 Month</option>
													<option value="">U11 Group Session – 3 Months</option>
													<option value="">U11 Group Session – 6 Months</option>
													<option value="">U11 Group Session – 12 Months</option>
													<option value="">U13 Group Session – 1 Month</option>
													<option value="">U13 Group Session – 3 Months</option>
													<option value="">U13 Group Session – 6 Months</option>
													<option value="">U13 Group Session – 12 Months</option>
													<option value="">U16 Group Session – 1 Month</option>
                                                </select>
                                                <div class="description">
												OMR 15 , 1 Session, 45 Min
										        </div>
											</div>
										</div>
								</div>
                            </div>
                            <div class="form-group">
									<label class="col-md-4 control-label"></label>
										<div class="col-md-8">
										<a type="button" href="/session" class="btn btn-primary btn-pre">Cancel</a>
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
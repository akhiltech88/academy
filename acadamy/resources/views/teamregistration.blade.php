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
							<form class="form-horizontal" method="post" action="team_register" enctype="multipart/form-data">
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
										<label class="col-md-4 control-label">ID Number<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
												<input name="idnumber" placeholder="ID Number" class="form-control" type="text" required>
												</div>
											</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Id Copy<span class="required-feild">*</span></label>
											<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
													<input id="id_copy" name="id_copy" placeholder="ID Copy" class="form-control" type="file" accept="application/pdf" required>
													<div id="" class="description">
														One file only.<br>500 KB limit.<br>Allowed types: pdf.
													</div>	
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
										<a type="button" href="/teamlist" class="btn btn-primary btn-pre">Cancel</a>
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
		var h = window.innerHeight+30;  
  $('.content-wrapper').css('min-height', h);
  $('.main-sidebar').css('min-height', h);
	})

	var uploadField = document.getElementById("id_copy");

uploadField.onchange = function() {
	if(this.files[0].size>500001){
        alert('Id Copy morethan 500Kb');
		this.value = "";
      }
}; 
  
</script>
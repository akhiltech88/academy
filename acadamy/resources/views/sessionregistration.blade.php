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
							<h3 class="box-title">Session Individual Registration</h3>			  
						</div>
						<div class="box-body">
							<form class="form-horizontal" method="post" id="myForm" name="session">
                            <div class="col-sm-12">
                                <div class="form-group"> <!-- Show only if individual select -->
										<label class="col-md-4 control-label">Select Player<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="player" class="form-control selectpicker" required>
													<option value="">Select Player</option>
													@foreach($players as $player)
													<option value="{{ $player->id }}">{{ $player->child_surname }} {{ $player->child_givenname }}</option>
													@endforeach
												</select>
											</div>
										</div>
                                </div>
                                <div class="form-group">
										<label class="col-md-4 control-label">Session Type<span class="required-feild">*</span></label> 
										<div class="col-md-8 inputGroupContainer">
											<div class="input-group">
												<select name="session" class="form-control selectpicker" required>
													@foreach($sessions as $session)
													<option value="{{ $session->id }}">{{ $session->name }}</option>
													@endforeach
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

<script>
    $(function() {
        $('select[name=player]').change(function() {

            var url = '{{ url('player') }}/' + $(this).val() + '/session';

            $.get(url, function(data) {
                var select = $('form select[name= session]');

                select.empty();

                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            });
        });
    });

	var el = document.getElementById('myForm');

el.addEventListener('submit', function(){
    if(confirm('Session registration confirmation is subject to payment.'))
	return true;
	else
	event.preventDefault();
}, false);
</script>
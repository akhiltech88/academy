@include('layout/header')
@include('layout/navinner')
@include('layout/leftmenu')
<!-- content -->
<div class="content-wrapper">
    <section class="content-header">
		<h1>
        Welcome to Oman Cricket Academy
		</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-dashboard"></i> Home</li>
			<li><a href="/session">Session</a></li>
			<li class="active">Payment Options</li>
		</ol>
	</section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <h3>Option1</h3>
                    <p>Deposit / transfer fee to the following bank account and email proof of deposit / transfer to <a href="mailto:academy@omancricket.org">academy@omancricket.org</a></p>
                    <div class="col-md-6">
                    <h3>Bank account details</h3>
                    <ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Beneficiary Name </b> <a class="pull-right">Oman Cricket Club</a>
							</li>
                            <li class="list-group-item">
								<b>Bank </b> <a class="pull-right">Bank Muscat</a>
							</li>
                            <li class="list-group-item">
								<b>Account Number </b> <a class="pull-right">0333005821100018</a>
							</li>
						</ul>
                        </div>
                  </p>
                  <!-- /.progress-group -->
                </div>
                <div class="col-md-12">                

                <p class="text-center">
                    <h3>Option 2</h3>
                    <strong>Visit OmanCricket office to make cash payment.</strong></br>
                  </p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->

</div>

@include('layout.footer')
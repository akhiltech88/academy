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
          <h3 class="box-title">User List</h3>
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
                            <th class="sorting_asc" rowspan="1" colspan="1" >Name</th>  
                            <th class="sorting" rowspan="1" colspan="1">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                            <td><a href="userdetails/{{$user->id}}"> {{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            </tr>
                        @endforeach                        
                        </tbody>         
                    </table>
                    {{ $users->links() }}
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
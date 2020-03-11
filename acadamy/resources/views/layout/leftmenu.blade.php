<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('dist/img/oclogo.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><b>Oman </b> Cricket</p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>        
        </li>     
        <li class="treeviewn">
          <a>
            <i class="fa fa-group"></i> <span>Registration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li onclick="individual()">
              <a href="/registration"><i class="fa fa-circle-o"></i>Individuals</a>
            </li>
            <li onclick="team()">
              <a href="/team"><i class="fa fa-circle-o"></i>Team</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="/session">
            <i class="fa fa-cubes"></i> <span>Session Registration</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/payments">
            <i class="fa fa-clock-o"></i> <span>Payment Options</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        @if(Auth::user()->client_admin==1)
        <li>
          <a href="/userlist">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        @endIf
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>
    var baseUrl = window.location.origin;
    function individual(){
      window.location.href = baseUrl+'/playerlist';
    }
    function team(){
      window.location.href = baseUrl+'/teamlist';
    }
  </script>
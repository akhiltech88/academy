@include('layout.header')
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <span class="logo-lg"><b>OMAN CRICKET Academy</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">      
         <li class="auth"><a href="/login">Login</a> | <a href="/register">Register</a></li>        
        </ul>
      </div>
    </nav>
  </header>
  <div class="content-wrapper1 home-main">
    <div class="banner-image">
        <div id="site-logo" class="site-logo-tag">
            <a title="Home" rel="home" class="site-branding__logo">
                <img src="http://online.omancricket.org/sites/default/files/oclogo.png" alt="Home">
            </a>
        <div class="site-branding__text">
                <div class="site-branding__name">
                    <a href="/" title="Home" rel="home">Oman Cricket Academy</a>
                </div>
                <div class="site-branding__slogan">Oman Cricket Academy Registrations - 2020</div>
         </div>
</div>
    </div>

       <div class="container">
  <div class="site-content">
    <div class="content spacing">
      <div class="box box-primary box-reg">
        <div class="box-header1 with-border">
         <h1 class="page-title">Registration</h1>
       </div>    

        <form role="form" name="signup_form" method="post" action="register">
        <div class="box-body">
        <div class="form-group has-feedback">
            <label for="User Name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>   
          <div class="form-group has-feedback">
            <label for="User Email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>          
          <div class="form-group has-feedback">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>
    
        <div class="box-footer">
          <button type="submit" class="btn btn-primary login">Submit</button>
          <div class="etc-login-form">
            <p> <a href="/login">Back to Login</a></p>       
          </div>
        </div>              
      </form> 
    </div>
  </div>
</div> 
</div>

  </div>
  <div class='clearfix'></div>
  <footer class="main-footer">
   <div class="footer-bottom">
    <strong>Copyright © 2020 <a href="#">Oman Cricket Academy</a>.</strong> All rights
    reserved. 
</div>
<div class="control-sidebar-bg"></div>
</footer>
</div>
<!-- ./wrapper -->
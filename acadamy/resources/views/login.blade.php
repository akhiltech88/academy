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
            <div class="box box-primary box-main">
            <div class="box-header1 with-border">
              <h1 class="page-title">Sign in</h1>
            </div>
            <form role="form" name="login_form" method="post" action="login">
               {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group has-feedback">
                <label for="User Email">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email address" required />
                @if ($errors->has('email'))
                  <span class="error">{{ $errors->first('email') }}</span>
                  @endif
              </div>
              <div class="form-group has-feedback">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
                @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">              
              <button type="submit" class="btn btn-primary login" id="btn-submit">Submit</button>
              <div class="etc-login-form">
                <p>Forgot your password? <a href="/forgot_password">Click here</a></p>
                <p>New user? <a href="/register">Create new account</a></p>
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



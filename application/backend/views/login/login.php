<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Go Search</b>Travel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form account-form" id="formLogin " method="POST" action="<?php echo BASEURL; ?>/login">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Username" tabindex="1" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" tabindex="2"  name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" tabindex="3"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" tabindex="4">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links --> 

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
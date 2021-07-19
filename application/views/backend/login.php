<?php include('css.php'); ?>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <?= form_open(base_url().'login/validate_login', array('id' => 'loginform')); ?>
        <a href="javascript:void(0)" class="text-center db"><img src="../plugins/images/eliteadmin-logo-dark.png" alt="Home" /><br/><img src="../plugins/images/eliteadmin-text-dark.png" alt="Home" /></a> 

        <!-- check for successfull flash messages and display them -->

         <?php if($this->session->flashdata('flash_message') != "") : ?>
            <div class="alert alert-success hide_message_notification"><?=$this->session->flashdata('flash_message')?></div>
            <?php endif; 
         ?>
         <?php if($this->session->flashdata('error_message') != "") : ?>
            <div class="alert alert-danger hide_message_notification"><?=$this->session->flashdata('error_message')?></div>
            <?php endif; 
         ?>
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" name="email" type="email" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="<?= base_url(); ?>register/index" class="text-primary m-l-5"><b>Sign Up</b></a></p>
          </div>
        </div>
      <?= form_close(); ?>
      <form class="form-horizontal" id="recoverform" action="index.html">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- jQuery -->
   <?php include('js.php'); ?>

   <script type="text/javascript">
        $( document ).ready(function(){

            $('.hide_message_notification').delay(3000).slideUp();

        });
    </script>
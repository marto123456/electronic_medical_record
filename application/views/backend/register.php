
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Elite Hospital Admin Template - Hospital admin dashboard web app kit</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>bend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>bend/css/animate.css" rel="stylesheet">
<!-- Wizard CSS -->
<link href="<?php echo base_url(); ?>bend/plugins/bower_components/register-steps/steps.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>bend/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>bend/css/colors/megna.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19175540-9', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
 
<section id="wrapper" class="step-register">
  <div class="register-box">
    <div class="">
       <a href="javascript:void(0)" class="text-center db m-b-40"><img src="<?php echo base_url(); ?>bend/plugins/images/eliteadmin-logo-dark.png" alt="Home" /></a>
      
      <!-- multistep form -->
      <?php echo form_open(base_url(). 'register/store', array('id' => 'msform')); ?>
      
        
        <!-- fieldsets -->
        <fieldset>
        <h2 class="fs-title">Create your account</h2>
         <!-- check for successfull flash messages and display them -->

         <?php if($this->session->flashdata('error_message') != "") : ?>
            <div class="alert alert-danger hide_message_notification"><?=$this->session->flashdata('error_message')?></div>
            <?php endif; 
         ?>
         <?php if(validation_errors()){ ?>
            <div class="alert alert-danger hide_message_notification" role="alert">
              <?php echo validation_errors(); ?> 
            </div>
         <?php } ?>
       
        <input type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?> " />
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="confirm_password" placeholder="Confirm Password" />
        <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
       
        <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <div class="row">
        	<div class="col-md-6">
        		 <input type="text" name="fname" placeholder="First Name" value="<?php echo set_value('fname'); ?> " />
        	</div>
        	<div class="col-md-6">
        		 <input type="text" name="lname" placeholder="Surname" value="<?php echo set_value('lname'); ?> " />
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-4">
        		<input type="number" name="height" placeholder="Height" />
        	</div>
        	<div class="col-md-4">
        		<input type="number" name="weight" placeholder="Weight" />
        	</div>
        	<div class="col-md-4">
        		<input type="number" name="bmi" placeholder="bmi" />
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<input type="text" name="age" placeholder="Age" />
        	</div>
        	<div class="col-md-6">
        		 <select class="form-control" name="gender">
		        	<option value="male">Male</option>
		        	<option value="female">Female</option>
		         </select>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<input type="text" name="ward" placeholder="ward" />
        	</div>
        	<div class="col-md-6">
        		<input type="text" name="lga" placeholder="lga" />
        	</div>
        </div>
         <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="" value="Submit" />
        </fieldset>
        <?php echo form_close(); ?>
        <div class="clear"></div>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>bend/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>bend/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/register-steps/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/register-steps/register-init.js"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>bend/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>bend/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>bend/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>bend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
 <script type="text/javascript">
        $( document ).ready(function(){

            $('.hide_message_notification').delay(3000).slideUp();

        });
    </script>
</body>
</html>

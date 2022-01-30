<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>

    <link href="<?php echo base_url()?>assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="<?php echo base_url()?>assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="<?php echo base_url()?>assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="<?php echo base_url()?>assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="<?php echo base_url()?>assets/img/favicon.png" rel="icon" type="image/png">
    <link href="<?php echo base_url()?>assets/img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
</head>
<body style="background-image:url(<?php echo base_url()?>assets/images/camera.jpg)">

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="POST"> 
                    <?php if (isset($_SESSION['success'])) {?>
                        <div class="alert alert-sucess"><?php echo $_SESSION['success']; ?></div>
                    <?php
                    }?>
					
  
                    
					
					 <?php echo form_open('VerifyLogin'); ?>
                    <div class="sign-avatar">
                       <img src="<?php echo base_url()?>assets/img/logos.png" alt="" width="100" height="100">
                    </div>
                    <header class="sign-title">Sign In</header>					
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username (Email Id)" required>
                    </div>                    
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
					<div class="form-group">
						<label for="signed-in">Select your role:</label><br>
                        <input type="radio" name="role" value="admin" required> Admin<br>
						<input type="radio" name="role" value="employee"> Employee<br>
						<input type="radio" name="role" value="client"> Client
                    </div>
                    <!--<div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div>-->
					<span style="color:red;"><?php echo $this->session->flashdata('error'); ?></span>
                    <button  name="login" class="btn btn-rounded">Sign in</button>
                    <!--<p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p>-->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/lib/tether/tether.min.js"></script>
<script src="<?php echo base_url()?>assets/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="<?php echo base_url()?>assets/js/app.js"></script>
</body>
</html>
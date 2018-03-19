<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Admin</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Bootstrap Core CSS -->
	<link rel="icon" href="<?=base_url()?>images/isp-fi-small.png" type="image/x-icon" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<meta property="og:type" content="website">

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/dist/css/AdminLTE.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url()?>admin_assets/admin_css/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<br />
		<div class="login-logo" style="background:#FFFFFF ">
			<a href="<?=base_url()?>"><img  src="<?=base_url()?>admin_assets/admin_images/user-logo.png"></a>
			<div style="margin-top: 15px">
				<h2 class="text-center" style="background:#FBFBFB; color:#336fce; padding-top:0px; margin-top:0px;"> LOGIN</h2>
			</div>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">

			<p class="login-box-msg">Sign in to start your session</p>
			<?php if(isset($msg) && $msg != ""){echo "<h5><font color=EE0000>".$msg."</font></h5>";} ?>

			<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
			<h5><font color=EE0000><?php echo $this->session->flashdata('msg'); ?></font></h5><?php } ?>
			<form action="<?=site_url("login/signin")?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Email"  name="email">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" name="signin"  class="btn btn-success btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->        
				</div>      
			</form>
			<div class="row">
				<div class="col-xs-12">
					<div class="text text-left col-sm-4" >
						<p><font color="green"><a href="<?=base_url('login/signup')?>">Create Account</a></font></p>
					</div>

					<div class="text text-right col-sm-8" >
						<p><font color="red">Forget Password ?</font> <?=anchor('login/forgot_pass','Click Here') ?></p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src=".<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
						increaseArea: '20%' // optional
					});
		});
	</script>
</body>
</html>
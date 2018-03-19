<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once('top_global_header.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">
			<?php include_once('header.php'); ?>
			<!-- Header Navbar -->
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<?php include_once('admin_left.php'); ?>

		</aside>

		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">

				<div class="row">

					<div class="col-xs-12">
						<div class="box box-info">
							<div class="box-header with-border">
								<h4 class="box-name">My Profile</h4>
							</div>
							<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
							<div class="col-sm-10 col-sm-offset-4">
								<p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
							</div>          
							<?php } ?>
							<div class="box-body box-profile">
								<div class="col-sm-6 col-sm-offset-2">
									<div class="col-sm-12">
										<?php
											if ($this->session->userdata('image_thumb')) {
												$image = base_url().'assets/profile/'.$this->session->userdata('image_thumb');
											} else {
												$image = base_url().'admin_assets/admin_css/dist/img/avatar5.png';
											}
											
										?>
										<img class="profile-user-img img-responsive img-circle" src="<?=$image?>" alt="User profile picture">

										<h3 class="profile-username text-center"><?=$result->full_name?></h3>

										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Email</b> <a class="pull-right"><?=$result->user_email?></a>
											</li>
											<li class="list-group-item">
												<b>Registration Date</b> <a class="pull-right"><?=$result->user_registration_time?></a>
											</li>
										</ul>
									</div>

									<div class="col-sm-4 pull-right">
										<a href="<?=site_url('home/update_profile')?>" class="btn btn-primary btn-block"><b>Update Profile</b></a>
									</div>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>

			</section>
			<!-- /.content -->
		</div>
		<?php include('admin_footer.php'); ?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>

</body>
</HTML>
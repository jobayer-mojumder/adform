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

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">

				<div class="row">
					<div class="col-xs-12">
						<div class="box box-info">
							<div class="box-header with-border">
								<h4 class="box-name">Admin ADD</h4>
							</div>
							<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
							<div class="col-sm-10 col-sm-offset-4">
								<p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
							</div>			
							<?php } ?>

							<?php if( validation_errors() != false ){ ?>
							<div class="col-sm-10 col-sm-offset-4">
								<p style="color: red"><?php echo validation_errors(); ?></p>
							</div>			
							<?php } ?>
							<form class="form-horizontal" method="post" action="<?=base_url('admin/adminlist_add')?>" enctype="multipart/form-data">
								<div class="box-body">

									<div class="form-group">
										<label for="name" class="col-sm-2 control-label">Full Name</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="name" name="name" placeholder="Name Here" required value="">
										</div>
									</div>

									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email</label>
										<div class="col-sm-6">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email Here" value="">
										</div>
									</div>

									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-6">
											<input type="password" class="form-control" id="password" name="password" placeholder="Password Here" value="">
										</div>
									</div>

									<div class="form-group">
										<label for="re_password" class="col-sm-2 control-label">Re-enter Password</label>
										<div class="col-sm-6">
											<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Password Here" value="">
										</div>
									</div>

									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Group</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="group" id="group">
												<option value="super_admin">Super Admin</option>
												<option value="admin">Admin</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="status" class="col-sm-2 control-label">Active</label>
										<div class="col-sm-2">
											<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status" id="status">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>

								</div>

								<div class="box-footer">
									<div class="col-sm-12"> 
										<div class="col-sm-4 col-md-offset-2">
											<button type="submit" name="submit" class="btn btn-info"> Save </button>
										</div>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
				</div>

			</section>
			<!-- /.content -->
		</div>


<?php include('admin_footer.php'); ?>
	<div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>


</body>
</HTML>
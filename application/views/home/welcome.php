<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once('top_global_header.php'); ?>
	<style type="text/css">
		.completed{
			margin-top: 0px;
		}
	</style>
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
					<div class="col-xs-9">
						<div class="box">
							<div class="box-body" style="border: 1px solid; padding: 20px;">
								<div class="col-sm-8 col-md-offset-2">
									<table class="table">
										<thead>
											<tr style="text-align: center;">
												<th><a href="<?=base_url('home/billofsale')?>">Bill of Sale</a></th>
												<th><a href="#">Address Change</a></th>
												<th><a href="#">Lost Title</a></th>
												<th><a href="#">Lost Registration or Tag</a></th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="completed col-sm-10 col-md-offset-1">
									<h4 style="text-align: left;">Current Forms Completed</h4>
									<div class="col-sm-6 col-md-offset-1">
										<table class="table">
										<thead>
											<tr>
												<th>SL</th>
												<th>Date</th>
												<th>File name</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>10/12/2018</td>
												<td>123456.pdf</td>
											</tr>
											<tr>
												<td>2</td>
												<td>10/12/2018</td>
												<td>123456.pdf</td>
											</tr>
											<tr>
												<td>3</td>
												<td>10/12/2018</td>
												<td>123456.pdf</td>
											</tr>
											<tr>
												<td>4</td>
												<td>10/12/2018</td>
												<td>123456.pdf</td>
											</tr>
											<tr>
												<td>5</td>
												<td>10/12/2018</td>
												<td>123456.pdf</td>
											</tr>
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include('admin_footer.php'); ?>

		<div class="control-sidebar-bg"></div>
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url()?>admin_assets/admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url()?>admin_assets/admin_css/bootstrap/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>admin_assets/admin_css/dist/js/app.min.js"></script>

</body>
</HTML>
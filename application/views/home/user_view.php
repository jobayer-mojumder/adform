<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once('top_global_header.php'); ?>
	<script language="JavaScript">
		function del(id)
		{
			if(confirm("Are you sure to delete the entry?")==1)
				document.location = "<?=site_url('create_user/user_del');?>/" + id;
		}
	</script>
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
			<!-- Content Header (Page header) -->


			<!-- Main content -->
			<section class="content ">
				<div class="panel-heading">
					<span style="font-size:18px; font-family:Trebuchet MS, Tahoma,Arial; color:#333333; font-weight:bold">User  List </span>   </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0  WIDTH=100% class="table table-striped">

								<?php if(isset($msg) && $msg != ""){ ?>
									<tr><td colspan=2 align=center valign=middle bgcolor=ffffff height=20><font face=verdana color=red size=2><?php echo $msg; ?></font></td></tr>
									<TR><TD height=5></TD></TR>
									<?php } ?>

									<?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
									<tr><td colspan=2 align=center valign=middle bgcolor=ffffff height=20><font face=verdana color=red size=2><?php echo $this->session->flashdata('msg'); ?></font></td></tr>
									<TR><TD height=5></TD></TR>
									<?php } ?>
									<tr>
										<td  align=right><a style="float:right; border:2px solid #005bab; padding:3px; border-radius:5px;"  class="add" href="<?=site_url('create_user/user_add');?>">Add New</a></td>
									</tr>

									<tr><td height=5></td></tr>
									<TR>
										<TD valign=top>
											<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=center WIDTH=100%>
												<TR>
													<TD height=20 class=bodytext width=40><font color="#333333"><b>SL.</b></font></TD>
													<TD height=20 class=bodytext width=100><font color="333333"><b>username </b></font></TD>
													<TD height=20 class=bodytext width=100><font color="333333"><b>Password </b></font></TD>
													<TD height=20 class=bodytext width=200><font color="333333"><b>email </b></font></TD>
													<TD height=20 class=bodytext width=100><font color="333333"><b>Group </b></font></TD>
													<TD height=20 class=bodytext width=40 align="center"><font color="333333"><b>Status</b></font></TD>
													<TD height=20 class=bodytext width=40 align="center"><font color="333333"><b>Edit</b></font></TD>
													<TD height=20 class=bodytext width=40 align="center"><font color="333333"><b>Delete</b></font></TD>
												</TR>
												<TR><TD height=3 colspan=11></TD></TR>
												<TR><TD height=2 bgcolor=#005bab colspan=11></TD></TR>
												<TR><TD height=3 colspan=11></TD></TR>
												<?php
												foreach ($user as $user_data):
													?>
													<TR>
														<TD height=20 class=bodytext><font size=1 color="#333333"><?php echo $x++;?>.</font></TD>
														<TD height=20 class=bodytext><font size=2 color="#FF0000"><?php echo $user_data->username;?></font></TD>
														<TD height=20 class=bodytext><font size=2 color="#FF0000"><?php echo $this->encrypt->decode($user_data->password);?></font></TD>
														<TD height=20 class=bodytext><font size=2 color="#333333"><?php echo $user_data->email;?></font></TD>
														<TD height=20 class=bodytext><font size=2 color="#333333"><?php echo $user_data->group;?></font></TD>


														<TD height=20 class=bodytext align="center"><?php if($user_data->status){?><img src="<?=base_url();?>admin_assets/admin_images/yes.gif" border=0><?php } else { ?><img src="<?=base_url();?>admin_assets/admin_images/no.gif" border=0 /><?php } ?></TD>
														<TD height=20 class=bodytext align="center"><a class=menu href="<?=site_url('create_user/user_edit/'.$user_data->ad_id);?>"><img src="<?=base_url();?>admin_assets/admin_images/edit.gif" border=0 /></a></TD>
														<TD height=20 class=bodytext align="center"><a class=menu href="JavaScript:del(<?=$user_data->ad_id?>)"><img src="<?=base_url();?>admin_assets/admin_images/del.gif" border=0 /></a></TD>
													</TR>
													<TR><TD height=3 colspan=11></TD></TR>
													<TR><TD height=1 bgcolor=e4e4e4 colspan=11></TD></TR>
													<TR><TD height=3 colspan=11></TD></TR>
												<?php endforeach;?>

												<TR><TD height=10></TD></TR>
												<tr >
													<td align=center class=pagination colspan=11>
														<?php echo $this->pagination->create_links();?>
													</td>
												</tr>
											</TABLE>
										</TD>
									</TR>
									<TR><TD height=10></TD></TR>
								</TABLE>
							</div>
						</div>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
 <!----------------FOOTER------------------->
	<?php include('admin_footer.php'); ?>
	<!----------------END FOOTER------------------->

	<!-- Control Sidebar -->

	<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
 </body>
</HTML>
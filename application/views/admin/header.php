 <!-- Logo -->
 <a href="<?=base_url('admin')?>" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><img src="<?=base_url()?>admin_assets/admin_images/uni-fi-small.png"></span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><img src="<?=base_url()?>admin_assets/admin_images/uni_logo_l.png"></span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<!-- Navbar Right Menu -->
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			
			<!-- /.messages-menu -->

			<!-- Notifications Menu -->
			
			<!-- User Account Menu -->
			<li class="dropdown user user-menu">
				<!-- Menu Toggle Button -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php
					if ($this->session->userdata('image_thumb')) {
						$image = base_url().'assets/admin/'.$this->session->userdata('thumb');
					} else {
						$image = base_url().'admin_assets/admin_css/dist/img/avatar5.png';
					}
					
					?>
					<!-- The user image in the navbar-->
					<img src="<?=$image?>" class="user-image" alt="User Image">
					<!-- hidden-xs hides the username on small devices so only the image appears. -->
					<span class="hidden-xs"><?=$this->session->userdata('fullname')?></span>
				</a>
				<ul class="dropdown-menu">
					<!-- The user image in the menu -->
					<li class="user-header">
						<img src="<?=$image?>" class="img-circle" alt="User Image">

						<p style="color: blue;"><?=$this->session->userdata('fullname')?></p>
					</li>
					<!-- Menu Body -->
					<li class="user-body">
						<div class="row">
							<div class="col-xs-6 text-left">
							<?php
							if ($this->session->userdata('group')=='super_admin') { ?>
								<a class=topmenu href="<?=site_url('admin/adminlist');?>">Admin List</a>
							<?php } ?>
						 </div>
						 
							<div class="col-xs-6 text-right">
							 <a class=topmenu href="<?=site_url('admin/change_pass');?>">Change Password</a>
						 </div>
						 
					 </div>
					 <!-- /.row -->
				 </li>
				 <!-- Menu Footer-->
				 <li class="user-footer">
					<div class="pull-left">
					 
						<a  class="btn btn-default btn-flat" href="<?=site_url('admin/profile')?>">My Profile</a>
					</div>
					<div class="pull-right">

						<a  class="btn btn-default btn-flat" href="<?=site_url('admin/logout')?>">Sign out</a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</div>
</nav>
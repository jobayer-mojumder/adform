<section class="sidebar">
	<ul class="sidebar-menu">
		<li class="header"> CONTROL PANEL</li>
		<li class="treeview <?php if(substr($this->uri->segment(1),0,10) == 'home_admin') { ?>  active <?php } ?>">
			<a href="#"><i class="fa fa-home"></i> <span>Home</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li <?php if(substr($this->uri->segment(2),0,6) == ''){?> class="active" <?php }?>><a href="<?=site_url('admin');?>"> <i class="fa fa-angle-right text-blue" style="width:5px"></i> Home</a>
				</li>

			</ul>
		</li>

		<li class="treeview <?php if(substr($this->uri->segment(2),0,8) == '') { ?>  active <?php } ?>">
			<a href="<?=site_url('user_admin/user');?>"><i class="fa fa-briefcase"></i> <span>User Account</span>
			</a>
		</li>
	</ul>
</section>


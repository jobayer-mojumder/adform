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
                                <h4 class="box-name">Change Password</h4>
                            </div>
                            <?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
                            <div class="col-sm-10 col-sm-offset-4">
                                <p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
                            </div>          
                            <?php } ?>
                            <form class="form-horizontal" method="post" action="<?=base_url('home/change_pass')?>" >
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Current Password</label>
                                        <div class="col-sm-6">
                                            <input type="Password" class="form-control" id="password" name="password" placeholder="current password" required value="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="new_password" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-6">
                                            <input type="Password" class="form-control" id="new_password" name="new_password" placeholder="new password" required value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="re_password" class="col-sm-3 control-label">Confirm New Password</label>
                                        <div class="col-sm-6">
                                            <input type="Password" class="form-control" id="re_password" name="re_password" placeholder="confirm new password" required value="">
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <div class="col-sm-12"> 
                                        <div class="col-sm-4 col-md-offset-8">
                                            <button type="submit" name="submit" class="btn btn-info"> Change </button>
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
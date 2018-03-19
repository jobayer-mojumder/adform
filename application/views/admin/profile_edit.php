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
                                <h4 class="box-name">Update Profile</h4>
                            </div>
                            <?php if($this->session->flashdata('msg') && $this->session->flashdata('msg') != ""){ ?>
                            <div class="col-sm-10 col-sm-offset-4">
                                <p style="color: blue"><?php echo ucwords($this->session->flashdata('msg')); ?></p>
                            </div>          
                            <?php } ?>
                            <form class="form-horizontal" method="post" action="<?=base_url('admin/update_profile')?>" enctype="multipart/form-data">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="fullname" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full name Here" required value="<?=$result->fullname?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Profile Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="image" name="image" >
                                            <?php if($result->image){?>
                                            
                                            <input type="text" class="col-sm-7" style="display: none; margin-right: 10px;" name="old_image" value="<?=$result->image?>" readonly>
                                            <input type="checkbox" class="flat-blue"  name="image_del" value="1"> Delete Old File
                                            <?php } ?>
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
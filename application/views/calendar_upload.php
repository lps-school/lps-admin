<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lions Public School | Ashok Vihar</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
    <?php include('includes/header.php'); ?>
	<!-- /main navbar -->


	<!-- Page header -->
    <?php include('includes/page_header.php'); ?>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
                    <?php include('includes/navigation.php'); ?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
                <?php if($this->session->flashdata('update_success') != ''){ ?>
                    <div id="success_msg" class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
                        </button>
                        <span class="text-semibold">Well done!</span> You successfully Updated the Table.
                    </div>
                <?php }elseif($this->session->flashdata('update_filed') != ''){ ?>

                    <div class="alert alert-danger alert-styled-left alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
                        </button>
                        <span class="text-semibold">Oh snap!</span> Change a few things up and try submitting again.
                    </div>
                <?php  } ?>
				<!-- Bootstrap file input -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Monthly Calendar Edit/Update</h5>
                        <?php //print_r($sliders);

                        //echo $sliders[0]['slider_image'];?>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
						<p class="content-group"><code>important! =></code> Image Size must be <code>800 x 600</code> for better visualization. and image extension should be <code>.jpg OR .png</code> format </p>

						<form id="add_slider" name="add_slider" class="form-horizontal"
                              action="<?php echo site_url('admin/calendar_update'); ?>"
                              method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-lg-2 control-label text-semibold">First Slider:</label>
								<div class="col-lg-10">
									<input type="file" name="userfile" id="userfile" class="file-input-custom" accept="image/*" required="required">
									<span class="help-block"><img src="<?php echo base_url();?>assets/uploads/calendar/<?php echo $calendar_image[0]['image']; ?> "width=365" height="250"> </span>
								</div>
							</div>

                            </form>

					</div>
				</div>
				<!-- /bootstrap file input -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
        <?php include('includes/footer_login-signup.php'); ?>
		<!-- /footer -->

	</div>
	<!-- /page container -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lions Public School | Ashok Vihar</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
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
    <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_layouts.js"></script>

    <!-- /theme JS files -->

    <!--Validation JS Files-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/editor_ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <!--/Validation JS Files-->

    <!--Current User Form Validaation-->

    <!--/ Current User Form Validaation-->

    <script>
        jQuery(function ($) {

            $("#phone").mask("(999) 999-9999");
            $("#RGPhone").mask("(999) 999-9999");
            $("#userFunDate").mask("9999-99-99");
            $("#notes_date").mask("9999-99-99");

        });
    </script>
    <style>


        #current_user .error {
            color: red;
        }

        #recent_user .error {
            color: red;
        }

    </style>


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

            <!-- Fieldset legend -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Basic legend -->
                    <form id="add_new_blog" name="add_new_blog" class="form-horizontal"
                          action="<?php echo site_url('admin/update_gallery'); ?>"
                          method="post" enctype="multipart/form-data">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Edit Gallery</h5>
                                <?php //print_r($page_content); ?>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <fieldset>
                                    <legend class="text-semibold">Edit/Update Gallery</legend>

                                    <input type="hidden" name="gallery_id" value="<?php echo $gallery_content->gallery_id; ?>"/>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Title:</label>

                                        <div class="col-lg-9">
                                            <input type="text" name="gallery_title" id="gallery_title"
                                                   value="<?php echo $gallery_content->gallery_title; ?>"
                                                   class="form-control"
                                                   class="keyup-phone text-input" placeholder="Blog Title" required="required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Image:</label>

                                        <div class="col-lg-9">
                                            <input type="file" name="userfile" id="userfile"
                                                   value=""
                                                   class="form-control"
                                                   class="keyup-phone text-input" required="required"><?php if(!empty($gallery_content->gallery_image)){  ?>
                                                <br>
                                                <img src="<?php echo base_url();?>assets/uploads/gallery/<?php echo $gallery_content->gallery_image; ?>" width="250" height="150" />
                                            <?php  }?>
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="content-group">

                                </div>

                                <div class="text-right">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">
                                        Save Change <i class="icon-arrow-right14 position-right"></i></button>
                                </div>


                            </div>
                        </div>
                    </form>
                    <!-- /basic legend -->

                </div>

            </div>
            <!-- /fieldset legend -->

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

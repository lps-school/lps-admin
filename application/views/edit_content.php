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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_layouts.js"></script>

<!-- /theme JS files -->

<!--Validation JS Files-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/editor_ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<!--/Validation JS Files-->

<!--Current User Form Validaation-->
<script>
    /*$.validator.setDefaults({
     submitHandler: function() {
     alert("submitted!");
     }
     });*/

    $().ready(function () {
        //alert('ghfghg');
        // validate signup form on keyup and submit
        $("#current_user").validate({
            rules: {
                editor_full: "required",
                lastname: "required",
                company: "required",
                address: {
                    required: true,
                    minlength: 2
                },
                state: "required",
                city: "required",
                zip: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                phone: "required",
                birthday1: "required",
                birthday2: "required",
                userFunDate: "required",
                user_status: "required",
                notes_date: "required",
                notes_comment: "required",
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
            }
        });

    });
</script>
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

<!--user Search Box-->


    <!--<div id="success_msg" class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <span class="text-semibold">Well done!</span> You successfully Updated Table.
    </div>-->


    <!--<div class="alert alert-danger alert-styled-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <span class="text-semibold">Oh snap!</span> Change a few things up and try submitting again.
    </div>-->

<!-- Fieldset legend -->
<div class="row">
<div class="col-md-12">

<!-- Basic legend -->
<form id="edit_content" name="edit_content" class="form-horizontal" action="<?php echo site_url('admin/insert_content')."/".$page_name; ?>"
      method="post">
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Edit Content</h5>

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
            <legend class="text-semibold">Edit Your Page Content</legend>



<?php //print_r($page_content); ?>








            <div class="form-group">
                <label class="col-lg-3 control-label">Page Name:</label>

                <div class="col-lg-9">
                    <input type="text" name="page_name" id="page_name"
                           value="<?php if (isset($page_name)) echo $page_name; ?>" class="form-control"
                           class="keyup-phone text-input" placeholder="Index" disabled>
                </div>
            </div>



            <div class="form-group">
                <label class="col-lg-3 control-label">Page Content:</label>

                <div class="col-lg-12">
                    <textarea name="editor-full" id="editor-full" rows="4" cols="4" required>
                    <?php
                    foreach($page_content as $row){
                        echo $row;
                    }
                    ?>
                    </textarea>
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

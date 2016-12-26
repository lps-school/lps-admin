<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/login.js"></script>
    <!-- /theme JS files -->
    <!--<script type="text/javascript" src="assets/js/login_ajax.js"></script>-->
    <!--Validation JS Files-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
    <!--/Validation JS Files-->
    <script>
        /*$.validator.setDefaults({
            submitHandler: function () {
                alert("submitted!");
            }
        });*/

        $().ready(function () {
            // validate the comment form when it is submitted
            $("#commentForm").validate();

            // validate signup form on keyup and submit
            $("#loginForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    address: {
                        required: true,
                        minlength: 2
                    },
                    user: "required",
                    enterprise: "required",
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
                    nmls: {
                        required: true,
                        minlength: 2
                    },
                    confirm_nmls: {
                        required: true,
                        minlength: 2,
                        equalTo: "#nmls"
                    },
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
    <style>


        #loginForm .error {
            color: red;
        }

    </style>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.png">

</head>

<body>

<!-- Main navbar -->
<?php include_once('includes/header_login-signup.php'); ?>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Advanced login -->
            <form id="loginForm" action="<?php echo site_url('login/ajax_login'); ?>" method="post">
                <div class="login-form">
                    <div class="text-center">
                        <div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
                        <h5 class="content-group-lg">Login to your account
                            <small class="display-block">Enter your credentials</small>
                        </h5>
                    </div>
                    <?php if($this->session->flashdata('login_failed') != ''){ ?>

                    <div id="error_msg" class="alert alert-danger alert-styled-left alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                class="sr-only">Close</span></button>
                        <span class="text-semibold">Username or Password Incorrect.</span>
                    </div>
                    <?php } ?>
                    <!--<div id="loader" class="pace-demo">
                        <div class="theme_xbox">
                            <div class="pace_progress" data-progress-text="60%" data-progress="60"></div>
                            <div class="pace_activity"></div>
                        </div>
                    </div>-->

                    <div class="form-group has-feedback has-feedback-left">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                        <input type="text" name="email" id="email"
                               value=""
                               class="form-control input-lg" placeholder="Email">

                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input-lg"
                               placeholder="Password">

                    </div>


                    <div class="form-group login-options">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="styled" checked="checked">
                                    Remember me
                                </label>
                            </div>

                            <!--<div class="col-sm-6 text-right">
                                <a href="login_password_recover.php">Forgot password?</a>
                            </div>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" id="submit" class="btn bg-blue btn-block btn-lg">Login <i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>
            </form>
            <!-- /advanced login -->

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

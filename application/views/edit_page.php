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
    <!--/Validation JS Files-->

    <!--Current User Form Validaation-->
    <script>
        /*$.validator.setDefaults({
         submitHandler: function() {
         alert("submitted!");
         }
         });*/

        $().ready(function () {
            // validate signup form on keyup and submit
            $("#current_user").validate({
                rules: {
                    firstname: "required",
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
    <script>
        // alert('fhahahah');
        $(document).ready(function () {
            //alert('fha');
            $('#search_error_msg').hide();
            $('#loader').hide();

            $("#search_button").click(function () {
                //alert('fha');
                $('#loader').show();
                var keyword = $("#search_box").val();
                // Returns successful data submission message when the entered information is stored in database.
                if (keyword == '') {
                    $('#loader').hide();
                    $('#search_error_msg').show();

                } else {
                    var dataString = 'title=' + keyword + '&NMLSCode=' + NMLSCode;
                    //alert(dataString);
                    $.ajax({
                        type: "POST",
                        url: "search_individual_mlo_user.php",
                        data: dataString,
                        success: function (result) {
                            //if(result == 'success')
                            $('#loader').hide();
                            //$("#success_msg").show();
                            $('#user_result').html(result);

                        }
                    });
                }
                //AJAX code to submit form.
                return false;
            });
        });
    </script>


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
            <!-- Fieldset legend -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Basic legend -->
                    <form id="current_user" name="current_user" class="form-horizontal"
                          action="manage_individual_mlo_user.php"
                          method="post">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Edit Your Content</h5>

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
                                    <legend class="text-semibold">Please Select Page For Edit in Drop Down</legend>


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Page Links:</label>

                                        <div class="col-lg-9">
                                            <select name="state" id="state" class="select"
                                                    onchange="location = this.options[this.selectedIndex].value;">
                                                <option value="">Select Page</option>
                                                <?php

                                                $query = $this->db->query('SELECT page_name FROM content');
                                                if ($query->num_rows() > 0) {
                                                    foreach ($query->result() as $row) {
                                                        ?>
                                                        <option
                                                            value="<?php echo site_url('admin/edit_content') . "/" . $row->page_name; ?>"><?php echo $row->page_name; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                <!--<option value="<?php /*echo site_url('admin/edit_content')*/ ?>">Index Page</option>
                        <option value="Computer">Computer Lab</option>-->
                                            </select>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group">
                                         <label class="col-lg-3 control-label">Notes Date:</label>

                                         <div class="col-lg-9">
                                             <input type="text" name="notes_date" id="notes_date"
                                                    value="" class="form-control"
                                                    class="keyup-phone text-input" placeholder="YYYY-MM-DD">
                                         </div>
                                     </div>


                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Notes Comment:</label>

                                         <div class="col-lg-9">
                                             <textarea rows="5" cols="5" name="notes_comment" id="notes_comment" class="form-control"
                                                       placeholder="Enter your message here"></textarea>
                                         </div>
                                     </div>-->
                                </fieldset>


                                <!--<div class="text-right">
                                    <button type="submit" id="current_user_submit" name="current_user_submit" class="btn btn-primary">
                                        Save Change <i class="icon-arrow-right14 position-right"></i></button>
                                    <a type="submit" class="btn btn-primary text-left">Print Notes<i
                                            class="icon-arrow-right14 position-right"></i></a>
                                </div>-->


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

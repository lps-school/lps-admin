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
            src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_advanced.js"></script>
    <!-- /theme JS files -->
<script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        $('#success_msg').hide();
        $("#error_msg").hide();
    });

    function deleteFunction(id) {
       // alert('delete');
        if (confirm("Are you sure want to delete ?")) {
            //alert(id);
            var dataString = 'id=' + id;
            //alert(dataString);
            $.ajax({
                url: '<?php echo base_url(); ?>admin/ajax_delete_notice',
                type: 'post',
                data: dataString,
                success: function(response) {
                    //$('#sent_result'+id).html(response);
                    //$('#success_msg').show();
                   // alert(response);
                    //if(response == 'error') alert('error');
                    $("#success_msg").fadeIn(2000);
                    setTimeout(function() {
                        //$('input[type=submit]').attr('disabled', false);
                        window.location.href = "<?php echo base_url(); ?>admin/manage_notice";
                    }, 5000 );
                },
                error: function() {
                    $("#error_msg").fadeIn(2000);
                }
            });
        }
    }

    function notice_ajax_active_inactive(id,string){
        if(confirm('Are you Sure want to '+string+' this blog')){

            var dataString = 'string=' + string + '&id=' + id;

            //alert(dataString);
            $.ajax({
                url: '<?php echo base_url(); ?>admin/notice_ajax_active_inactive',
                type: 'post',
                data: dataString,
                success: function(response) {
                    //$('#edit_user_result').html(response);
                    //alert(response);
                    //$('#sent_result'+id).html(response);
                    //$('#success_msg').show();
                    $("#success_msg").fadeIn(2000);
                    setTimeout(function() {
                        //$('input[type=submit]').attr('disabled', false);
                        window.location.href = "<?php echo base_url(); ?>admin/manage_notice";
                    }, 5000 );
                },
                error: function() {
                    $("#error_msg").fadeIn(2000);
                }
            });
        }
    }
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
    <div id="success_msg" class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <span class="text-semibold">Well done!</span> You are successfully Update the News & Events. for updation Page will redirect in 5 seconds!
    </div>

    <div id="error_msg" class="alert alert-danger alert-styled-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <span class="text-semibold">Oh snap!</span> Change a few things up and try  again.
    </div>

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
<!-- Page length options -->
<div class="panel panel-flat">
<div class="panel-heading">
    <h5 class="panel-title">

    </h5>

    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
            <li><a data-action="close"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <a href="<?php echo site_url('admin/add_notice') ?>" type="button" class="btn bg-teal">Add New Notice</a>
</div>
<?php //print_r($blog_content);
//echo $blog_category_name;
?>
<table class="table datatable-show-all">
<thead>
<tr>
    <th>ID</th>
    <th>Notice Title</th>
    <th>Notice Content</th>
    <th>Created At</th>
    <th>Status</th>
    <th class="text-center">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($notice_content as  $row){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo substr($row['title'],0,25) ."...."; ?></td>
    <td><?php echo substr($row['notice'],0,40) . "...."; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td><span class="label <?php if($row['status'] == 'Inactive') echo "label-danger"; else echo "label-success"; ?>"><?php echo $row['status']; ?></span></td>
    <td class="text-center">
        <ul class="icons-list">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li onclick="notice_ajax_active_inactive(<?php echo $row['id']; ?>,'Active');"><a href="#"><i class="icon-add"></i>Active</a></li>
                    <li onclick="notice_ajax_active_inactive(<?php echo $row['id']; ?>,'Inactive');"><a href="#"><i class="icon-lock"></i>Inactive</a></li>
                    <li onclick="deleteFunction(<?php echo $row['id']; ?>);"><a href="#"><i class="icon-cross2"></i>Delete</a></li>
                    <li><a href="<?php echo site_url('admin/edit_notice'."/".$row['id']); ?>"><i class="icon-database-edit2"></i>Edit</a></li>
                </ul>
            </li>
        </ul>
    </td>
</tr>
<?php  } ?>
</tbody>
</table>
</div>
<!-- /page length options -->

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

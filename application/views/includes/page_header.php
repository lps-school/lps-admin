<div class="page-header">
    <!--<div class="breadcrumb-line breadcrumb-line-wide">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="form_checkboxes_radios.html">Forms</a></li>
            <li class="active">Checkboxes &amp; radios</li>
        </ul>

        <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
    </div>-->

    <div class="page-header-content">
        <div class="page-title">

            <h4><i class="icon-arrow-left52 position-left"></i>You are logged in as <span class="text-semibold">Admin </span> </h4>


        </div>

        <div class="heading-elements">
            <strong>Welcome:</strong>  <button type="button" class="btn bg-pink"><?php echo $this->session->userdata('name'); ?></button>

        </div>
    </div>
</div>
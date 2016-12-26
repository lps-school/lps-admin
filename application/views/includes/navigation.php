<div class="sidebar-category sidebar-category-visible">
    <div class="category-title h6">
        <span>Main navigation</span>
        <ul class="icons-list">
            <li><a href="#" data-action="collapse"></a></li>
        </ul>
    </div>

    <!--<div class="category-content sidebar-user">
        <div class="media">
            <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
            <div class="media-body">
                <span class="media-heading text-semibold">Victoria Baker</span>
                <div class="text-size-mini text-muted">
                    <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                </div>
            </div>

            <div class="media-right media-middle">
                <ul class="icons-list">
                    <li>
                        <a href="#"><i class="icon-cog3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>-->

    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <!--<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>-->
            <li><a href="<?php echo site_url('admin') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo site_url('admin/add_new_blog') ?>"><i class="icon-blog"></i>
                    <span>Add New Blog</span></a></li>
            <li><a href="#"><i class="icon-blogger"></i> <span>Manage Blogs</span></a>
                <ul>
                    <li><a href="<?php echo site_url('admin/manage_blog/kindergarten_blog') ?>">Kindergarten Blog</a>
                    </li>
                    <li><a href="<?php echo site_url('admin/manage_blog/class_2_3_blogs') ?>">Class II & III Blogs</a>
                    </li>
                    <li><a href="<?php echo site_url('admin/manage_blog/class_4_5_6_blogs') ?>">Class IV, V & VI
                            Blogs</a></li>
                    <li><a href="<?php echo site_url('admin/manage_blog/lead_on_blog') ?>">Lead On Blog</a></li>
                    <li><a href="<?php echo site_url('admin/manage_blog/library_blog') ?>">Library Blog</a></li>
                </ul>
            </li>

            <!--<li><a href="<?php /*echo site_url('admin/add_news_events') */?>"><i class="icon-newspaper"></i> <span>Add News and Events</span></a>
            </li>
            <li><a href="<?php /*echo site_url('admin/manage_news_events') */?>"><i class="icon-newspaper2"></i>
                    <span>Manage News & Events</span></a></li>-->
            <li><a href="<?php echo site_url('admin/slider_upload') ?>"><i class="icon-images2"></i>
                    <span>Update Slider</span></a></li>
            <li><a href="<?php echo site_url('admin/result_upload') ?>"><i class="icon-magazine"></i>
                    <span>Update Result</span></a></li>
            <li><a href="<?php echo site_url('admin/gallery_upload') ?>"><i class="icon-gallery"></i>
                    <span>Update Gallery</span></a></li>
            <li><a href="<?php echo site_url('admin/manage_gallery') ?>"><i class="icon-image3"></i>
                    <span>Manage Gallery</span></a></li>
            <li><a href="<?php echo site_url('admin/add_notice') ?>"><i class="icon-list-unordered"></i> <span>Add New Notice</span></a></li>
            <li><a href="<?php echo site_url('admin/manage_notice') ?>"><i class="icon-pencil5"></i> <span>Manage Notice</span></a></li>
            <li><a href="<?php echo site_url('admin/calendar_upload') ?>"><i class="icon-calendar3"></i> <span>Update Calender</span></a></li>
            <li><a href="<?php echo site_url('admin/add_new_link') ?>"><i class="icon-gallery"></i>
                    <span>Add New Link</span></a></li>
            <li><a href="<?php echo site_url('admin/manage_links') ?>"><i class="icon-pencil5"></i> <span>Manage Links</span></a></li>
            <li><a href="<?php echo site_url('login/logout') ?>"><i class="icon-switch2"></i><span>Logout</span></a>
            </li>
            <!-- /main -->
        </ul>
    </div>
</div>
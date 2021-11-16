<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
            <?php 
                if($this->session->userdata('user_logged')->role == 0){
            ?>
            <li><a><i class="fa fa-gears"></i> Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('religion') ?>"><i class="fa fa-book pull-left"></i> Religion</a></li>
                    <li><a href="<?php echo site_url('position') ?>"><i class="fa fa-user-md pull-left"></i> Position</a></li>
                    <li><a href="<?php echo site_url('division') ?>"><i class="fa fa-sitemap pull-left"></i> Division</a></li>
                    <li><a href="<?php echo site_url('bank') ?>"><i class="fa fa-bank pull-left"></i> Bank</a></li>
                </ul>
            </li>
            <li><a href="<?php echo site_url('employee') ?>"><i class="fa fa-users"></i> Employees</a></li>
            <li><a href="<?php echo site_url('vacancies') ?>"><i class="fa fa-briefcase"></i> Vacancies</a></li>
            <li><a href="<?php echo site_url('salary') ?>"><i class="fa fa-money"></i> Salary</a></li>
            <li><a href="<?php echo site_url('paid_leave') ?>"><i class="fa fa-book"></i> Paid Leave</a></li>
            <li><a href="<?php echo site_url('permit_application') ?>"><i class="fa fa-sticky-note"></i> Permit Application</a></li>
            <li><a href="<?php echo site_url('absence') ?>"><i class="fa fa-clock-o"></i> Absence</a></li>
            <!-- <li><a><i class="fa fa-ellipsis-h"></i> Import <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('absence') ?>">Absen</a></li>
                </ul>
            </li> -->
            <li><a><i class="fa fa-print"></i> Report <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('absence/report') ?>"><i class="fa fa-book pull-left"></i> Absence</a></li>
                    <li><a href="<?php echo site_url('paid_leave/report') ?>"><i class="fa fa-bed pull-left"></i> Paid Leave</a></li>
                    <li><a href="<?php echo site_url('permit_application/report') ?>"><i class="fa fa-sticky-note pull-left"></i> Permit Application</a></li>
                    <li><a href="<?php echo site_url('salary/report') ?>"><i class="fa fa-money pull-left"></i> Salary</a></li>
                </ul>
            </li>

            <?php }elseif($this->session->userdata('user_logged')->role == 1){?>
                <li><a href="<?php echo site_url('user/paid_leave') ?>"><i class="fa fa-book"></i> Paid Leave</a></li>
                <li><a href="<?php echo site_url('user/permit_application') ?>"><i class="fa fa-sticky-note"></i> Permit Application</a></li>
                <li><a href="<?php echo site_url('user/salary') ?>"><i class="fa fa-money"></i> Salary</a></li>
                <li><a href="<?php echo site_url('user/report_absence') ?>"><i class="fa fa-clock-o"></i> Absence</a></li>
            <?php }?>
            <li><a href="<?php echo site_url('message') ?>"><i class="fa fa-envelope"></i> Message</a></li>
        </ul>
    </div>
</div>

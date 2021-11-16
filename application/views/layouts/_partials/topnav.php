<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php if($this->session->userdata('user_logged')->photo !== Null){
                        $foto = $this->session->userdata('user_logged')->photo;
                    }else{
                        $foto = "default.png";
                    }
                    ?>
                        <img src="<?=base_url('upload/images/'.$foto)?>" alt=""><?=$this->session->userdata('user_logged')->name?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="<?=site_url('user/profile')?>"><i class="fa fa-user pull-right"></i> Profile</a>
                        <a class="dropdown-item"  href="<?=site_url('login/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

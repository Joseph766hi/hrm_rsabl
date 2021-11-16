<div class="col-md-3">
        <div class="x_panel tile">
            <div class="x_content">
                <div class="profile_pic">
                    <img src="<?=base_url('upload/images/'.$user->photo)?>" alt="..." class="img-rounded" width="200">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="x_panel tile">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Username</th>
                            <th>:</th>
                            <th><?=$user->username?></th>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <th>:</th>
                            <th><?=$user->nik?></th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>:</th>
                            <th><?=$user->employee?></th>
                        </tr>
                        <tr>
                            <th>E-Mail</th>
                            <th>:</th>
                            <th><?=$user->email?></th>
                        </tr>
                        <tr>
                            <th>No Tlpn</th>
                            <th>:</th>
                            <th><?=$user->no_telp?></th>
                        </tr>
                        <tr>
                            <th>Joined At</th>
                            <th>:</th>
                            <th><?=$user->tanggal_bergabung?></th>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <th>:</th>
                            <th><?=$user->position?></th>
                        </tr>
                        <tr>
                            <th>Division</th>
                            <th>:</th>
                            <th><?=$user->division?></th>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <th>:</th>
                            <th><?php
                                if ($user->gender == "L") {
                                    echo "Male";
                                }else {
                                    echo "Female";
                                }
                            ?></th>
                        </tr>
                        <tr>
                            <th>Place Of Birth</th>
                            <th>:</th>
                            <th><?=$user->place_of_birth?></th>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <th>:</th>
                            <th><?=date('d F Y',strtotime($user->date_of_birth))?></th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th>:</th>
                            <th><?=$user->address?></th>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <th>:</th>
                            <th><?=$user->account_number?></th>
                        </tr>
                        <tr>
                            <th>Bank Name</th>
                            <th>:</th>
                            <th><?=$user->bank?></th>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

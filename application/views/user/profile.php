<div class="col-md-6">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Your Profile</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo $this->session->flashdata('message') ?>
                <form action="<?php echo site_url('user/profile') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$userlogged->id?>">
                    <input type="hidden" name="role" value="<?=$userlogged->role?>">
                    <div class="form-group">
                        <label for="nama">Picture</label>
                        <input class="form-control <?php echo form_error('picture') ? 'is-invalid':'' ?>" type="file" name="picture"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('picture') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" value="<?=$userlogged->username?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password"/>
                        <small class="text-muted">Kosongkan jika tidak ingin merubah password</small>
                        <div class="invalid-feedback">
                            <?php echo form_error('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input class="form-control  <?php echo form_error('nik') ? 'is-invalid':'' ?>" readonly type="text" name="nik" value="<?=$userlogged->nik?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('nik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">E-Mail</label>
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" name="email" value="<?=$userlogged->email?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Phone No.</label>
                        <input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>" type="text" name="no_telp" value="<?=$userlogged->no_telp?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('no_telp') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name" value="<?=$userlogged->employee?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Religion</label>
                        <select name="religion_id" id="" class="form-control" required>
                            <?php 
                                foreach($religion as $rel):
                            ?>
                            <option value="<?=$rel->id?>" <?=$userlogged->religion_id == $rel->id ? 'selected' : '' ?>><?php echo $rel->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('division_id') ?>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
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
                    <div class="form-group">
                        <label for="nama">Gender</label>
                        <select name="gender" id="" class="form-control" required>
                            <option value="L" <?=$userlogged->gender == 'L' ? 'selected' : '' ?>>Male</option>
                            <option value="P" <?=$userlogged->gender == 'P' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Place Of Birth</label>
                        <input class="form-control <?php echo form_error('place_of_birth') ? 'is-invalid':'' ?>" type="text" name="place_of_birth" value="<?=$userlogged->place_of_birth?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('place_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Date Of Birth</label>
                        <input class="form-control <?php echo form_error('date_of_birth') ? 'is-invalid':'' ?>" type="date" name="date_of_birth" value="<?=$userlogged->date_of_birth?>"  />
                        <div class="invalid-feedback">
                            <?php echo form_error('date_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Address</label>
                        <textarea name="address" required class="form-control" id="" cols="2" rows="2"><?=$userlogged->address?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Joined At</label>
                        <input class="form-control <?php echo form_error('tanggal_bergabung') ? 'is-invalid':'' ?>" type="date" name="tanggal_bergabung" value="<?=$userlogged->tanggal_bergabung?>"  readonly/>
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_bergabung') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Account Number</label>
                        <input class="form-control <?php echo form_error('account_number') ? 'is-invalid':'' ?>" type="text" name="account_number" value="<?=$userlogged->account_number?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('account_number') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Bank Name</label>
                        <select name="bank_name" id="" class="form-control" required>
                            <?php 
                                foreach($bank as $bnk):
                            ?>
                            <option value="<?=$bnk->id?>" <?=$userlogged->bank_id == $bnk->id ? 'selected' : '' ?>><?php echo $bnk->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('bank_name') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Save</button>
				</form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<div class="col-md-6">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-pencil-square-o pull-left"></i> Employee Form</h2>
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
                <form action="<?php echo site_url('employee/edit/'.$user->id) ?>" method="post">
                    <input type="hidden" name="employee_id" value="<?=$user->employee_id?>">
                    <input type="hidden" name="user_id" value="<?=$user->id?>">
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" value="<?=$user->username?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password"/>
                        <small class="text-muted">Leave it blank if you don't want to change your password!</small>
                        <div class="invalid-feedback">
                            <?php echo form_error('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Role</label>
                        <select name="role" id="" class="form-control" required>
                            <option value="0" <?=$user->role == 0 ? 'selected' : '' ?>>Admin</option>
                            <option value="1" <?=$user->role == 1 ? 'selected' : '' ?>>Employee</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('role') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>" type="text" name="nik" value="<?=$user->nik?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('nik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name" value="<?=$user->employee?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">E-Mail</label>
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" name="email" value="<?=$user->email?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Phone No.</label>
                        <input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>" type="text" name="no_telp" value="<?=$user->no_telp?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('no_telp') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Position</label>
                        <select name="position_id" id="" class="form-control" required>
                            <?php 
                                foreach($position as $pos):
                            ?>
                            <option value="<?=$pos->id?>" <?=$user->position_id == $pos->id ? 'selected' : '' ?>><?php echo $pos->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Division</label>
                        <select name="division_id" id="" class="form-control" required>
                            <?php 
                                foreach($division as $div):
                            ?>
                            <option value="<?=$div->id?>" <?=$user->division_id == $div->id ? 'selected' : '' ?>><?php echo $div->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('division_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Religion</label>
                        <select name="religion_id" id="" class="form-control" required>
                            <?php 
                                foreach($religion as $rel):
                            ?>
                            <option value="<?=$rel->id?>" <?=$user->religion_id == $rel->id ? 'selected' : '' ?>><?php echo $rel->name ?></option>
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
                            <option value="L" <?=$user->gender == 'L' ? 'selected' : '' ?>>Male</option>
                            <option value="P" <?=$user->gender == 'P' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Place Of Birth</label>
                        <input class="form-control <?php echo form_error('place_of_birth') ? 'is-invalid':'' ?>" type="text" name="place_of_birth" value="<?=$user->place_of_birth?>"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('place_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Date Of Birth</label>
                        <input class="form-control <?php echo form_error('date_of_birth') ? 'is-invalid':'' ?>" type="date" name="date_of_birth" value="<?=$user->date_of_birth?>"  />
                        <div class="invalid-feedback">
                            <?php echo form_error('date_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Address</label>
                        <textarea name="address" required class="form-control" id="" cols="5" rows="5"><?=$user->address?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Joined At</label>
                        <input class="form-control <?php echo form_error('tanggal_bergabung') ? 'is-invalid':'' ?>" type="date" name="tanggal_bergabung" value="<?=$user->tanggal_bergabung?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="nama">Account Number</label>
                        <input class="form-control <?php echo form_error('account_number') ? 'is-invalid':'' ?>" type="text" name="account_number" value="<?=$user->account_number?>"/>
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
                            <option value="<?=$bnk->id?>" <?=$user->bank_id == $bnk->id ? 'selected' : '' ?>><?php echo $bnk->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('bank') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Save</button>
                    <a href="<?=site_url('employee')?>" class="btn btn-danger btn-sm">Cancel</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

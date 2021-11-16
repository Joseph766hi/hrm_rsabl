    <div class="col-md-6">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-user-plus pull-left"></i>Employee Form</h2>
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
                <form action="<?php echo site_url('employee/add') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('username') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Role</label>
                        <select name="role" id="" class="form-control" required>
                            <option value="0">Admin</option>
                            <option value="1">Employee</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('role') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>" type="text" name="nik"/>
                        <div class="invalid-feedback" max="16" min="16">
                            <?php echo form_error('nik') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">E-Mail</label>
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" name="email"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Phone No.</label>
                        <input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>" type="text" name="no_telp"/>
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
                            <option value="<?=$pos->id?>"><?php echo $pos->name ?></option>
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
                            <option value="<?=$div->id?>"><?php echo $div->name ?></option>
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
                            <option value="<?=$rel->id?>"><?php echo $rel->name ?></option>
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
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Place Of Birth</label>
                        <input class="form-control <?php echo form_error('place_of_birth') ? 'is-invalid':'' ?>" type="text" name="place_of_birth"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('place_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Date Of Birth</label>
                        <input class="form-control <?php echo form_error('date_of_birth') ? 'is-invalid':'' ?>" type="date" name="date_of_birth" />
                        <div class="invalid-feedback">
                            <?php echo form_error('date_of_birth') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Address</label>
                        <textarea name="address" required class="form-control" id="" cols="5" rows="5"></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Joined At</label>
                        <input class="form-control <?php echo form_error('tanggal_bergabung') ? 'is-invalid':'' ?>" type="date" name="tanggal_bergabung" required/>
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_bergabung') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label">Account Number</label>
                        <input class="form-control <?php echo form_error('account_number') ? 'is-invalid':'' ?>" type="text" name="account_number"/>
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
                            <option value="<?=$bnk->id?>"><?php echo $bnk->name ?></option>
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

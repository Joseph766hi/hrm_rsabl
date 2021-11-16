<div class="col-md-6">
    <div class="x_panel tile">
        <div class="x_title">
            <h2>Salary Form</h2>
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
            <form action="<?php echo site_url('salary/add') ?>" method="post">
                <div class="form-group">
                    <label for="employee_id">Karyawan</label>
                    <select name="employee_id" id="" class="form-control" required>
                        <?php 
                            foreach($employees as $employee):
                        ?>
                        <option value="<?=$employee->employee_id?>"><?php echo $employee->employee ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo form_error('position_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="salary">Gaji Pokok</label>
                    <input class="form-control <?php echo form_error('salary') ? 'is-invalid':'' ?>" type="number" name="salary" value="0"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('salary') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="allowance">Tunjangan</label>
                    <input class="form-control <?php echo form_error('allowance') ? 'is-invalid':'' ?>" type="number" name="allowance" value="0"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('allowance') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="overtime">Lembur</label>
                    <input class="form-control <?php echo form_error('overtime') ? 'is-invalid':'' ?>" type="number" name="overtime" value="0"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('overtime') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="month">Bulan</label>
                    <select name="month" id="" class="form-control" required>
                        <?php 
                            foreach($month as $key => $m):
                        ?>
                        <option value="<?=$key+1?>"><?php echo $m ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo form_error('position_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="year">Tahun</label>
                    <select name="year" id="" class="form-control">
                        <?php 
                            $year = date('Y');
                            // $year = (int) $year;
                            for ($i=$year; $i > 2005; $i--) { 
                        ?>
                        <option><?=$i?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button class="btn btn-primary btn-sm">Save</button>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
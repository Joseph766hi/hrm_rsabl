<div class="col-md-12">
    <?php echo $this->session->flashdata('message') ?>
</div>

<div class="col-md-6">
    <div class="x_panel tile fixed_height_420">
        <div class="x_title">
            <h2><i class="fa fa-file-excel-o pull-left"></i> Import Absence</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="<?php echo site_url('absence') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="excel">* Gunakan file dengan extensi .xlsx</label>
                    <input class="form-control" required type="file" name="excel" />
                    <small>
                        <a href="<?= base_url('assets/format_import.xlsx') ?>">
                            format_import.xlsx
                        </a>
                    </small>
                </div>
                <button class="btn btn-primary btn-sm" type="submit" value="upload" name="submit">Import</button>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="x_panel tile fixed_height_420">
        <div class="x_title">
            <h2><i class="fa fa-calendar-o pull-left"></i> Manual Input</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="<?php echo site_url('absence/store') ?>" method="post">
                <div class="form-group">
                    <label for="excel">Pilih Karyawan</label>
                    <select name="nik" class="form-control" required>
                        <option value="" style="display: none"></option>
                        <?php foreach ($list_karyawan as $karyawan) { ?>
                            <option value="<?= $karyawan->nik ?>"><?= $karyawan->nik ?> - <?= $karyawan->employee ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="excel">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="form-group">
                    <label for="excel">Jam Masuk</label>
                    <input type="time" name="masuk" id="masuk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="excel">Jam Keluar</label>
                    <input type="time" name="keluar" id="keluar" class="form-control" required>
                </div>
                <button class="btn btn-primary btn-sm" type="submit" value="upload" name="submit">Submit</button>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-calendar pull-left"></i> Absence</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?php echo site_url('absence') ?>" method="get" >
                    <div class="form-group">
                        <label for="excel">Employee</label>
                        <select name="employee_id" id="" class="form-control" required>
                            <option value="all_employee">All Employee</option>
                            <?php 
                                foreach ($employees as $employee):
                            ?>
                            <option value="<?=$employee->nik?>"><?=$employee->employee?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="overtime">From</label>
                        <input class="form-control <?php echo form_error('from') ? 'is-invalid':'' ?>"
                        value="<?= $default_from ?>" type="date" name="from"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('from') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="overtime">To</label>
                        <input class="form-control <?php echo form_error('to') ? 'is-invalid':'' ?>"
                        value="<?= $default_to ?>" type="date" name="to"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('to') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Show</button>
                </form>
                <div class="clearfix"></div>
                <?php   
                    if ($absence !== null):
                        $no = 1;
                ?>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover"  id="datatable-buttons" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($absence as $val): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=date('d-m-Y',strtotime($val->tanggal))?></td>
                                <td><?=$val->nik?></td>
                                <td><?=$val->name?></td>
                                <td><?=$val->position?></td>
                                <td><?=$val->masuk?></td>
                                <td><?=$val->keluar?></td>
                            </tr>
                            <?php
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
    

<script>
    document.getElementById("masuk").defaultValue = "08:00";
    document.getElementById("keluar").defaultValue = "17:00";
</script>

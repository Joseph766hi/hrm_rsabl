    <div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Absence Report</h2>
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
                <form action="<?php echo site_url('absence/report') ?>" method="get" >
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
    
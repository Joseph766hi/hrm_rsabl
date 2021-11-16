<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Salary Report</h2>
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
                <form action="<?php echo site_url('salary/report') ?>" method="get" >
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
                    <button class="btn btn-primary btn-sm">Show</button>
                </form>
                <div class="clearfix"></div>
                <?php   
                    if ($salary !== null):
                        $no = 1;
                ?>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatable-buttons" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Total Gaji</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($salary as $val): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?php
                                    foreach($month as $key =>$m):
                                        if ( $key+1 == $val->month) {
                                            echo $m;
                                        }
                                    endforeach;
                                ?></td>
                                <td><?=$val->year?></td>
                                <td><?=$val->nik?></td>
                                <td><?=$val->name?></td>
                                <td>Rp.<?=number_format($val->total,2)?></td>
                                <td>
                                    <a href="<?=site_url('salary/reportDetail/'.$val->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                </td>
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
    
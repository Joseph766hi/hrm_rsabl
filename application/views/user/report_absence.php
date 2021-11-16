<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-calendar pull-left"></i> Absence Report</h2>
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
                <form action="<?php echo site_url('user/report_absence') ?>" method="get" >
                    <div class="form-group">
                        <label for="excel">NIK</label>
                        <input type="text" readonly name="employee_id" class="form-control" value="<?=$userlogged->nik?>">
                    </div>
                    <div class="form-group">
                        <label for="excel">Name</label>
                        <input type="text" readonly class="form-control" value="<?=$userlogged->employee?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="overtime">From</label>
                        <input class="form-control <?php echo form_error('from') ? 'is-invalid':'' ?>" type="date" name="from"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('from') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="overtime">To</label>
                        <input class="form-control <?php echo form_error('to') ? 'is-invalid':'' ?>" type="date" name="to"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('to') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Show</button>
                </form>
                <div class="clearfix"></div>
                <?php   
                    if ($absence != null):
                        $no = 1;
                ?>
                <br><br>
                <?php 
                    if (isset($_GET)) {?>
                    <div style="float: right;">
                    <form action="<?php echo site_url('user/exportReport') ?>" method="get">
                        <input type="hidden" name="employee_id" value="<?=$_GET['employee_id']?>"/>
                        <input type="hidden" name="id" value="<?=$userlogged->id?>"/>
                        <input type="hidden" name="from" value="<?=$_GET['from']?>"/>
                        <input type="hidden" name="to" value="<?=$_GET['to']?>"/>
                        <button class="btn btn-success btn-sm">Export</button>
                    </form>
                    </div>
                <?php
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover"  id="datatable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
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
    
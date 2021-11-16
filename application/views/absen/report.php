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
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="month">Bulan</label>
                            <select name="month" id="" class="form-control" required>
                                <?php 
                                    foreach($bulan as $key => $m):
                                ?>
                                <option value="<?=$key+1?>" <?= (($key+1)==$month)?'selected':'' ?>><?php echo $m ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('position_id') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                    </div>
                    <button class="btn btn-primary btn-sm">Show</button>
                </form>
                <div class="clearfix"></div>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Division</th>
                                <th>Status</th>
                                <th width="100">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $year = isset($_GET['year']) ? $_GET['year'] : $year;
                                foreach($re as $item):
                            ?>
                            <tr>
                                <th><?=$no++;?></th>
                                <th><?=isset($item['nama']) ? $item['nama'] : '-';?></th>
                                <th><?=isset($item['posisi']) ? $item['posisi'] : '-';?></th>
                                <th><?=isset($item['divisi']) ? $item['divisi'] : '';?></th>
                                <th>(<b>H:</b> <?=isset($item['hadir']) ? $item['hadir'] : '-'  ?>, <b>C:</b> <?=isset($item['cuti']) ? $item['cuti'] : '-' ?>, <b>S:</b> <?=isset($item['sakit']) ? $item['sakit']: '' ?> <b>I:</b> <?=isset($item['izin']) ? $item['izin']: '' ?>)</th>
                                <th>
                                    <a href="<?=site_url('absence/detail_report?month='.$month.'&year='.$year.'&nik='.$item['nik'])?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                </th>
                            </tr>
                            <?php 
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
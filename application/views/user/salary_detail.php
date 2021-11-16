<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Salary Report Detail</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <a href="<?=site_url('user/exportSalary/'.$salary->id)?>" class="btn btn-success btn-sm">Export</a>
            <br><br>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">NIK</th>
                        <td width="5">:</td>
                        <td><?=$salary->nik?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td><?=$salary->nama?></td>
                    </tr>
                </table>
                <div class="clearfix"></div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatable" width="100%">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Gaji Pokok</th>
                                <th>Total Lembur</th>
                                <th>Total Tunjangan</th>
                                <th>Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?php
                                    foreach($month as $key =>$m):
                                        if ( $key+1 == $salary->month) {
                                            echo $m;
                                        }
                                    endforeach;
                                ?>
                                </td>
                                <td><?=$salary->year?></td>
                                <td>Rp.<?=number_format($salary->salary,2)?></td>
                                <td>Rp.<?=number_format($salary->overtime,2)?></td>
                                <td>Rp.<?=number_format($salary->allowance,2)?></td>
                                <td>Rp.<?=number_format($salary->total,2)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
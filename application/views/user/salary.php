<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-money pull-left"></i>Salary</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Total Gaji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($salary as $item):
                            ?>
                            <tr>
                                <th><?=$no++;?></th>
                                <th><?php
                                    foreach($month as $key =>$m):
                                        if ( $key+1 == $item->month) {
                                            echo $m;
                                        }
                                    endforeach;
                                ?></th>
                                <th><?=$item->year;?></th>
                                <th>Rp.<?=number_format($item->total);?></th>
                                <td>
                                    <a href="<?=site_url('user/salaryDetail/'.$item->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                </td>
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

<div class="col-md-4">
        <div class="x_panel tile">
            <div class="x_content">
                <div class="profile_pic">
                <img src="<?=base_url('upload/images/'.$user->photo)?>" alt="..." class="img-rounded" width="300">
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_panel tile">
            <div class="x_content">
                
            <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                
            <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                <h4 class="text-center"><?=$user->employee?></h4>
                <h4 class="text-center"><?=$user->nik?></h4>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="datatable-buttons" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $a = array_unique($absensi,SORT_REGULAR);
                                foreach($a as $item):
                            ?>
                            <tr>
                                <th><?=$no++;?></th>
                                <th><?=$item['tgl'];?></th>
                                <th>
                                <?php 
                                    if ($item['type'] == 1) {
                                        echo "Cuti Melahirkan";
                                    } elseif($item['type'] == 2 ) {
                                        echo "Cuti Tahunan";
                                    }elseif($item['type'] == 3 ) {
                                        echo "Sakit";
                                    }elseif($item['type'] == 4 ) {
                                        echo "Izin";
                                    }else{
                                        echo "Hadir";
                                    }
                                ?>
                                </th>
                            </tr>
                            <?php 
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
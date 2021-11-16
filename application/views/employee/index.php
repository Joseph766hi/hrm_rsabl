<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Employees Data <a href="<?=site_url("employee/add")?>" class="fa fa-user-plus"></a> </h2>
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Division</th>
                                <th>Gender</th>
                                <th width="100">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach($employees as $item):
                            ?>
                            <tr>
                                <th><?=$no++;?></th>
                                <th><?=$item->employee;?></th>
                                <th><?=$item->position;?></th>
                                <th><?=$item->division;?></th>
                                <th><?php
                                    if ($item->gender == "L") {
                                        echo "Male";
                                    }else {
                                        echo "Female";
                                    }
                                ?></th>
                                <th>
                                    <a href="<?=site_url('employee/view/'.$item->id)?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="<?=site_url('employee/edit/'.$item->id)?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?=site_url('employee/delete/'.$item->id)?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a>
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

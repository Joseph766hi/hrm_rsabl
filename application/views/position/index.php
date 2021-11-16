<div class="col-md-4">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title">
                <h2><i class="fa fa-pencil pull-left"></i> Position Form</h2>
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
                <form action="<?php echo site_url('position') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name" placeholder="Position Name" />
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Save</button>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-user-md pull-left"></i> Position Data</h2>
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
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>Name</th>
                                <th width="70">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach($position as $item):
                            ?>
                            <tr>
                                <th><?=$no++;?></th>
                                <th><?=$item->name;?></th>
                                <th>
                                    <a href="<?=site_url('position/edit/'.$item->id)?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?=site_url('position/delete/'.$item->id)?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a>
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

<div class="x_panel tile">
    <div class="x_title">
        <h2><i class="fa fa-sticky-note pull-left"></i>Permit Application Form</h2>
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
        <form action="<?php echo site_url('user/permit_application') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="nik" value="<?= $userlogged->nik ?>">
            <div class="row">
                <div class="col-md-2 form-group">
                    <label for="nama">From</label>
                    <input class="form-control <?php echo form_error('from_') ? 'is-invalid':'' ?>" type="date" name="from_"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('from_') ?>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <label for="nama">To</label>
                    <input class="form-control <?php echo form_error('to_') ? 'is-invalid':'' ?>" type="date" name="to_"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('to_') ?>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <label for="type">Type</label>
                    <select name="type" required class="form-control">
                        <option value="3">Sakit</option>
                        <option value="4">Izin</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label for="nama">Cause</label>
                    <input class="form-control <?php echo form_error('cause') ? 'is-invalid':'' ?>" type="text" name="cause"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('cause') ?>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="nama">Proof</label>
                    <input class="form-control" required type="file" name="file"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('file') ?>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm pull-right">Save</button>
        </form>
        <div class="clearfix"></div>
    </div>
</div>

<div class="x_panel tile">
    <div class="x_title">
        <h2><i class="fa fa-list pull-left"></i>List</h2>
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
                        <th>From</th>
                        <th>To</th>
                        <th>Type</th>
                        <th>Cause</th>
                        <th>Proof</th>
                        <th width="70">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        $status = ["<span style='color: red'>Rejected</span>", "<span style='color: green'>Approved</span>"];
                        foreach($permit_application as $item):
                    ?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$item->from_;?></td>
                        <td><?=$item->to_;?></td>
                        <td>
                        <?php 
                        if ($item->type == 3) {
                            echo "Sakit";
                        } elseif($item->type == 4) {
                            echo "Izin";
                        }
                        ?>
                        </td>
                        <td><?=$item->cause;?></td>
                        <td><a target="_blank" class="btn btn-primary btn-sm" href="<?=base_url('upload/proof/'.$item->file)?>"><i class="fa fa-eye"></i></a></td>
                        <td><?php 
                        if ($item->status !== NULL) {
                            echo $status[$item->status];
                        } else {
                            echo "Pending";
                        }
                        ?></td>
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

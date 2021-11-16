<div class="x_panel tile">
    <div class="x_title">
        <h2><i class="fa fa-book pull-left"></i> Paid Leave</h2>
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
        <form action="<?php echo site_url('paid_leave') ?>" method="get" >
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
        <br><br>
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Type</th>
                        <th>Cause</th>
                        <th>Proof</th>
                        <th>Status</th>
                        <th width="100">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        $status = ["<span style='color: red'>Rejected</span>", "<span style='color: green'>Approved</span>"];
                        foreach($paid_leave as $item):
                    ?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?= $item->nik." - ".$item->name; ?></td>
                        <td><?=$item->from_;?></td>
                        <td><?=$item->to_;?></td>
                        <td>
                        <?php 
                        if ($item->type == 1) {
                            echo "Cuti Melahirkan";
                        } elseif($item->type == 2 ) {
                            echo "Cuti Tahunan";
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
                        <td>
                            <a href="#" class="btn btn-sm btn-success" title="Approve"
                                data-toggle="modal" data-target="#approve_<?= $item->paid_leave_id ?>">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger" title="Reject"
                                data-toggle="modal" data-target="#reject_<?= $item->paid_leave_id ?>">
                                <i class="fa fa-times"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-empty" title="Delete"
                                data-toggle="modal" data-target="#delete_<?= $item->paid_leave_id ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
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

<?php foreach($paid_leave as $item) {
    $data['item'] = $item;
    $this->load->view('paid_leave/modal', $data);
} ?>

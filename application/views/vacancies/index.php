<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2><i class="fa fa-briefcase pull-left"></i> Vacancies Form</h2>
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
                <form action="<?php echo site_url('vacancies') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Title</label>
                        <input class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>" type="text" name="title"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('title') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Position</label>
                        <select name="position_id" class="form-control <?php echo form_error('position_id') ? 'is-invalid':'' ?>">
                            <option value="" style="display: none;">-- Pick one --</option>
                            <?php foreach($array_position as $id => $nama) { ?>
                                <option value="<?= $id ?>"><?= $nama ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Description</label>
                        <textarea name="description" id="" cols="5" rows="5" required class="form-control"></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('description') ?>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm">Save</button>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>List</h2>
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
                                <th>Title</th>
                                <th>Position</th>
                                <th>Description</th>
                                <th width="70">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach($vacancies as $item):
                            ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$item->title;?></td>
                                <td>
                                    <?php if(isset($array_position[$item->position_id])) {
                                        echo $array_position[$item->position_id];
                                    } else {
                                        echo "not set";
                                    } ?>
                                </td>
                                <td><?=$item->description;?></td>
                                <td>
                                    <a href="<?=site_url('vacancies/edit/'.$item->id)?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?=site_url('vacancies/delete/'.$item->id)?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a>
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
    </div>

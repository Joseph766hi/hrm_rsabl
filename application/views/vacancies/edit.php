<div class="col-md-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Vacancies Form Edit</h2>
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
                <form action="<?php echo site_url('vacancies/edit/'.$vacancies->id) ?>" method="post">
                    <input type="hidden" name="id" value="<?=$vacancies->id?>">
                    <div class="form-group">
                        <label for="nama">Title</label>
                        <input class="form-control <?php echo form_error('title') ? 'is-invalid':'' ?>" type="text" name="title"  value="<?=$vacancies->title?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('title') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Position</label>
                        <select name="position_id" class="form-control <?php echo form_error('position_id') ? 'is-invalid':'' ?>">
                            <option value="" style="display: none;">-- Pick one --</option>
                            <?php foreach($array_position as $id => $nama) { ?>
                                <option value="<?= $id ?>" <?= $id == $vacancies->position_id ? 'selected' : '' ?>><?= $nama ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo form_error('position_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Description</label>
                        <textarea name="description" id="" cols="5" rows="5" required class="form-control"><?=$vacancies->description?></textarea>
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
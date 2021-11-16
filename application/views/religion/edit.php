    <div class="col-md-4">
        <div class="x_panel tile fixed_height_320">
            <div class="x_title">
                <h2><i class="fa fa-pencil-square-o pull-left"></i> Religion Form Edit</h2>
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
                <form action="<?php echo site_url('religion/edit/'.$religion->id) ?>" method="post">
                    <input type="hidden" name="id" value="<?=$religion->id?>">
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="name" placeholder="Religion Name" value="<?=$religion->name?>" />
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


<div class="x_panel tile">
    <div class="x_content">
        <h1>Welcome to </h1>
        <h4><i>Human Resource Management System </i>at Rumah Sakit Advent Bandar Lampung</h4>
        
        <div class="clearfix"></div>
		<hr>
         <?php  if($this->session->userdata('user_logged')->role == 1): ?>
            <div class="x_panel tile">
                <div class="x_title">
                    <h2><i class="fa fa-briefcase pull-left"></i> Job Vacancy Information</h2>
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
		<?php endif; ?>
    </div>
</div>

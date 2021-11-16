<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-comments pull-left"></i> Users</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="form-control form-control-sm">
            
            <div style="height: 450px; overflow:auto;">
                <ul class="list-unstyled msg_list" id="myUL">
                    <?php 
                        foreach ($employee as $val) { ?>
                    <li>
                        <a href="#" onclick="showMessage(<?=$val->id?>)">
                            <span class="image">
                                <img src="<?=base_url('upload/images/'.$val->photo)?>">
                            </span>
                            <span>
                                <span><?=$val->name?></span>
                                <!-- <span class="time">3 mins ago</span> -->
                            </span>
                            <span class="message">
                                <?=$val->position?>
                            </span>
                        </a>
                    </li>
                    <?php   }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="name_user"></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content" >
            <div class="isi_pesan" style="margin-bottom:20px; padding:20px;">
                <div class="show" style="width:100%; overflow-y:scroll; overflow-x:visible; min-height: 350px; max-height:350px; padding:20px 20px 20px 0;">
                
                </div>
            </div>
            <form id="form-sendMessage" class="sendBox" style="display: none;" enctype="multipart/form-data">
                <div class="form-group row">
                    <input type="hidden" name="reciever" id="reciever">
                    <input type="hidden" name="sender" id="sender" value="<?=$id?>">
                    <div class="col-md-11">
                        <input type="text" maxlength="70" name="message" id="isi" class="form-control"> <br>
                        Attachment : <input type="file" name="attachment" id="attachment" class="form-control-file">
                    </div>
                    <div class="col-md-1" style="margin-left: -10px;;">
                        <button class="btn btn-success sendMessage-btn">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

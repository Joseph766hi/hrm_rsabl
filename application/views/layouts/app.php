<?php 
    if (isset($d)) {
        $d = $d;
    }else{
        $d = [1,2,3,4];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layouts/_partials/head'); ?>
    </head>

  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= base_url('/') ?>" class="site_title">
                            <!-- <i class="fa fa-paw"></i>  -->
                            <img src="<?= base_url('upload/images/logo.png') ?>" width="60px" alt="">
                            <span>
                                RSABL
                            </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                        <?php if($this->session->userdata('user_logged')->photo !== Null){
                            $foto = $this->session->userdata('user_logged')->photo;
                        }else{
                            $foto = "default.png";
                        }
                        ?>
                            <img src="<?=base_url('upload/images/'.$foto)?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?=$this->session->userdata('user_logged')->name?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />

                    <!-- sidebar menu -->
                    <?php $this->load->view('layouts/_partials/sidebar'); ?>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <!-- <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings')?>">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=site_url('login/logout')?>">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div> -->
                    <!-- /menu footer buttons -->
                </div>
            </div>

        <!-- top navigation -->
        <?php $this->load->view('layouts/_partials/topnav'); ?>
        <!-- /top navigation -->
            
        <!-- page content -->
        <div class="right_col" role="main">
            <?php
                if ($folder == "./") {
                    $this->load->view("./home");
                }else {
                    $this->load->view('./'.$folder.'/'.$content);
                }
            ?>
            <!-- dsaj -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
            <?php $this->load->view('layouts/_partials/footer'); ?>
        <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <?=base_url('')?>
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
    <!-- Chart.js -->
    <script src="<?=base_url('assets/vendors/Chart.js/dist/Chart.min.js')?>"></script>
    <!-- gauge.js -->
    <script src="<?=base_url('assets/vendors/gauge.js/dist/gauge.min.js')?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/vendors/iCheck/icheck.min.js')?>"></script>
    <!-- Skycons -->
    <script src="<?=base_url('assets/vendors/skycons/skycons.js')?>"></script>
    <!-- Flot -->
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.js')?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.pie.js')?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.time.js')?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.stack.js')?>"></script>
    <script src="<?=base_url('assets/vendors/Flot/jquery.flot.resize.js')?>"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
    <script src="<?=base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/flot.curvedlines/curvedLines.js')?>"></script>
    <!-- DateJS -->
    <script src="<?=base_url('assets/vendors/DateJS/build/date.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?=base_url('assets/vendors/jqvmap/dist/jquery.vmap.js')?>"></script>
    <script src="<?=base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
    <script src="<?=base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('assets/vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
     <!-- Datatables -->
    <script src="<?=base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/jszip/dist/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/pdfmake/build/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/pdfmake/build/vfs_fonts.js')?>"></script>
    <script src="<?=base_url('assets/vendors/sweetalert/sweetalert.min.js')?>"></script>
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/build/js/custom.min.js')?>"></script>

    <script>
        (function($){
            CKEDITOR.replace( 'description' );
            $('.hapus').on('click',function(){
                swal({
                title: "Apa anda yakin??",
                text: "Data yang telah dihapus tidak dapat dikembalikan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                        $.ajax({
                        url: $(this).attr('href'),
                        success:function(){
                            swal("Data berhasil dihapus", {
                            icon: "success",
                            }).then((willDelete) => {
                                location.reload();
                            });

                        }
                    });
                } else {
                    swal("Data aman!");
                }
                });
                return false;
            });
            
        })(jQuery); 

        function showMessage(id) {
            $('#reciever').val(id);
            var sender = $('#sender').val()
            var urlClick = "<?= base_url().'message/showMessage/'?>"+id;
            console.log(id)

            $.ajax({ 
                type: 'POST', 
                url: urlClick, 
                dataType: 'json',
                success: function (data) { 
                    $('.show').remove()
                    $('.isi_pesan').append('<div class="show" style="width:100%;overflow-y:scroll; overflow-x:visible; min-height: 350px; max-height:350px; padding:20px 20px 20px 0;"></div>')
                    $('.sendBox').removeAttr('style');
                    if (data.status == 200) {
                        // console.log(data.message[1].reciever_id)
                        $('.name_user').text(data.user.employee)
                        for(var i=0; i<data.message.length; i++){
                            
                            if (data.message[i].reciever_id == id) {
                                if(data.message[i].filename !== null) {
                                    if(data.message[i].ext == '.jpg' || data.message[i].ext == '.jpeg' || data.message[i].ext == '.png') {
                                        $('.show').append(`
                                            <a href="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" target="_blank">
                                            <img style="float:left;" src="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" width="15%"></a>
                                            <p style="float:right; word-wrap:break-word; background-color:#4ba14a;padding:10px 15px 10px 15px; 
                                            border-radius:30px; color:white;word-wrap: break-word;">`+data.message[i].message+`</p><br><br>
                                            <p style="float:right; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                        `);
                                    } else {
                                        $('.show').append(`
                                            <a href="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" target="_blank">
                                            <img style="float:left;" src="` + "<?php echo base_url('upload/attachment/zip.png') ?>" + `" width="15%" > </a>
                                            <p style="float:right; word-wrap:break-word; background-color:#4ba14a;padding:10px 15px 10px 15px; 
                                            border-radius:30px; color:white;word-wrap: break-word;">
                                            `+data.message[i].message+`</p><br><br>
                                            <p style="float:right; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                        `);
                                    }
                                } else {
                                    $('.show').append(`
                                        <p style="float:right; word-wrap:break-word; background-color:#4ba14a;padding:10px 15px 10px 15px; 
                                        border-radius:30px; color:white;word-wrap: break-word;">`+data.message[i].message+`</p><br><br>
                                        <p style="float:right; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                    `);
                                }
                            }else {
                                if(data.message[i].filename !== null) {
                                    if(data.message[i].ext == '.jpg' || data.message[i].ext == '.jpeg' || data.message[i].ext == '.png') {
                                        $('.show').append(`
                                            <a href="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" target="_blank">
                                            <img style="float:right;"  src="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" width="15%"></a>
                                            <p style="float:left; word-wrap:break-word; background-color:#4ba14a;padding:10px 15px 10px 15px; 
                                            border-radius:30px; color:white;word-wrap: break-word;">`+data.message[i].message+`</p><br><br>
                                            <p style="float:left; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                        `);
                                    } else {
                                        $('.show').append(`
                                            <a href="` + "<?php echo base_url('upload/attachment/') ?>" + data.message[i].filename + data.message[i].ext + `" target="_blank">
                                            <img style="float:right;"  src="` + "<?php echo base_url('upload/attachment/zip.png') ?>" + `" width="15%" > </a>
                                            <p style="float:left; word-wrap:break-word; background-color:#4ba14a;padding:10px 15px 10px 15px; 
                                            border-radius:30px; color:white;word-wrap: break-word;">
                                            `+data.message[i].message+`</p><br><br>
                                            <p style="float:left; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                        `);
                                    }
                                } else {
                                    $('.show').append(`
                                        <p style="float:left; word-wrap:break-word; background-color:#383838;padding:10px 15px 10px 15px; border-radius:30px; color:white;word-wrap: break-word;">`+data.message[i].message+`</p><br><br><p style="float:left; color:#949494" font-size:10px;>`+data.message[i].datetime+`</p><br><br>
                                    `);
                                }

                            }
                        }
                    }else if(data.status == 400)
                    {
                        $('.name_user').text(data.user.employee)
                        $('.show').html('<p class="text-center">'+data.message+'</p>')
                    }
                    $(".show").scrollTop(function() { return this.scrollHeight; });
                }
            })
        }

        $('.sendMessage-btn').click(function(event) {
            event.preventDefault();
            
            var form = $('#form-sendMessage')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            console.log(formData)
            var isi = $('#isi').val()
            var penerima = $('#reciever').val()
            // var pengirim = $('#sender').val()
            // console.log(isi, penerima,pengirim);
            var urlAdd = "<?= base_url().'message/sendMessage'?>";

            if(isi != ""){
                $.ajax({ 
                    type: 'POST', 
                    url: urlAdd, 
                    // dataType: 'json',
                    // data:{sender: pengirim, reciever: penerima, message: isi},
                    data:formData,
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                    success: function (res) { 
                        console.log(res);
                        if(res.response == "success"){
                            $('#isi').val('')
                            $('#attachment').val('')
                            return showMessage(penerima);
                        }
                    }
                })
            }  
        })
        function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }
        var ctx = document.getElementById('myChart').getContext('2d');

            const data = {
                labels: [
                    'Sakit',
                    'Izin',
                    'Cuti',
                    'Hadir'
                ],
                datasets: [{
                    label: 'Absensi',
                    data: [<?=$d[1]?>,<?=$d[3]?>,<?=$d[2]?>,<?=$d[0]?>],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(52, 235, 119)'
                    ],
                    hoverOffset: 4
                }]
            };

            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
            });
    </script>
	
  </body>
</html>

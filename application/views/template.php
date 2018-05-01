<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Al-Mumtaz</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />

    <!-- <link href="<?php echo base_url() ?>/assets/css/bootstrap-responsive.css" rel="stylesheet" /> -->
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url() ?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->

     <!-- JS -->
     <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
     <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script> -->
     <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/chosen.jquery.js');?>"></script> -->

        <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>/assets/css/custom-styles3.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css"> -->
     <!-- Google Fonts-->
   <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>/assets/js/dataTables/dataTables.bootstrap4.css" rel="stylesheet" />

    <link rel="shorcut icon" href="<?php echo base_url() ?>/assets/img/logomumtaz.png">


</head>
<body>
    <div id="wrapper" class="page-container">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">

                <a class="navbar-brand" href="<?php echo base_url() ?>">Al-Mumtaz</a>
            </div>


            <ul class="nav navbar-top-links navbar-right" role="navigation">
                <li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"> <img src="<?php echo base_url() ?>/assets/img/animat-bell-color3.gif" width="25px" height="20px"> </a></li>
                <?php
                $periksa=mysql_query("select * from buku where jumlah <=3");
                while($q=mysql_fetch_array($periksa)){
                  if($q['jumlah']<=3){
                    ?>
                    <script>
                      $(document).ready(function(){
                        $('#pesan_sedia').empty();
                        $('#pesan_sedia').css("color","red");

                        $('#pesan_sedia').append("<img src='<?php echo base_url() ?>/assets/img/animat-bell-color.gif' width='25px' height='20px'><span class='glyphicon glyphicon-asterisk blink'></span>");
                      });
                    </script>
                    <?php
                    //echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['judul_buku']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";
                  }
                }
                ?>
                <li><li>
                    <a href="<?php echo base_url().'admin/logout'?>"  onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="glyphicon glyphicon-log-out"></i></a>
                </li></li>
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li>
                            <a href="<?php echo base_url().'admin/logout'?>"  onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <! /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>


        <!-- modal input -->

        <div id="modalpesan" class="modal fade">
      		<div class="modal-dialog">
      			<div class="modal-content">
      				<div class="modal-header">
      					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      					<h4 class="modal-title">Pemberitahuan</h4>
      				</div>
      				<div class="modal-body">
      					<?php
      					$periksa=mysql_query("select * from buku where jumlah <=3");
      					while($q=mysql_fetch_array($periksa)){
      						if($q['jumlah']<=3){
      							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['judul_buku']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi</div>";
      						}
      					}
      					?>
      				</div>
      				<div class="modal-footer">
      					<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      				</div>

      			</div>
      		</div>
      	</div>


        <!--/. NAV TOP  -->

        <?php



        if ($this->session->userdata('username') === 'superadmin') {
          # code...
         ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url() ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'operator'?>"><i class="glyphicon glyphicon-wrench"></i> Operator Sistem</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'log'?>"><i class="glyphicon glyphicon-list-alt"></i> Log Aktivitas</a>
                    </li>

                </ul>

            </div>

        </nav>


      <?php }else{ ?>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse sidebar-menu">

                <ul class="nav" id="main-menu">

                    <li>
                        <a href="<?php echo base_url() ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url().'operator'?>"><i class="fa fa-qrcode"></i> Operator Sistem</a>
                    </li> -->
                    <li>
                        <a href="#"><i class="fa fa-folder-open"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'buku'?>"><i class="glyphicon glyphicon-book"></i> Buku</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'kategori'?>"><i class="glyphicon glyphicon-list"></i> Kategori</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'supplier'?>"><i class="glyphicon glyphicon-import"></i> Supplier</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'karyawan'?>"><i class="glyphicon glyphicon-user"></i> Karyawan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'member'?>"><i class="glyphicon glyphicon-user"></i> Member</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money"></i> Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li>
                              <a href="<?php echo base_url().'transaksi'?>"><i class="fa fa-long-arrow-right"></i> Transaksi Penjualan</a>
                          </li>
                          <li>
                              <a href="<?php echo base_url().'transaksibeli'?>"><i class="fa fa-long-arrow-left"></i> Transaksi Pembelian</a>
                          </li>
                          <li>
                        </ul>

                    </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-file"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'transaksi/laporan'?>"><i class="fa fa-file-text-o"></i> Laporan Transaksi Penjualan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksibeli/laporan'?>"><i class="fa fa-file-text"></i>Laporan Transaksi Pembelian</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url().'transaksi/excel'?>">Laporan Excel</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'transaksi/pdf'?>" target="_blank">Laporan PDF</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="<?php echo base_url().'admin/logout'?>"><i class="fa fa-fw fa-file"></i> Keluar</a>
                    </li> -->
                </ul>



            </div>

        </nav>

      <?php } ?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    <?php echo $contents; ?>
            </div>
            <!-- /. PAGE INNER  -->
            <footer><p>&copy; Al-Mumtaz </p></footer>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <script>
      var toggle = true;

      $(".sidebar-icon").click(function() {
        if (toggle)
        {
          $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
          $("#main_menu span").css({"position":"absolute"});
        }
        else
        {
          $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
          setTimeout(function() {
            $("#main_menu span").css({"position":"relative"});
          }, 400);
        }
                      toggle = !toggle;
                  });
    </script>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url() ?>/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url() ?>/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url() ?>/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url() ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>/assets/js/custom-scripts.js"></script>


</body>
</html>

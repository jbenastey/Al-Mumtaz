                  <div class="row">
                    <div class="col-md-12">
                      
                        <h2 class="page-header">
                            Selamat datang admin toko buku Al-Mumtaz
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <?php
                                $jumlah=0;
                                  foreach ($record as $k) {
                                    $jumlah=$jumlah+$k->qty;
                                  }?>
                                <h3><?php echo $jumlah; ?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Buku Terjual

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>

                                <?php
                                $angka;
                                foreach ($record as $k) {
                                  $angka = array($k->qty);
                                  $angka1= max($angka);

                                }
                                 ?>
                                <h3> Sistem Digital </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Buku Terlaris

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-book fa-5x"></i>
                                <?php $nob=0;
                                  foreach ($buku as $k) {
                                      $nob++;
                                  }

                                 ?>
                                <h3><?php echo $nob; ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Judul Buku

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <?php $no=0;
                                  foreach ($member as $k) {
                                      $no++;
                                  }

                                 ?>
                                <h3><?php echo $no; ?></h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Jumlah Member

                            </div>
                        </div>
                    </div>
                <!-- /. ROW  -->


                <!-- /. ROW  -->

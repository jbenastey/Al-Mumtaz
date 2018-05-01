                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default ">
                            <div class="panel-body">
                              <h2 class="page-header">
                                  Transaksi Penjualan
                              </h2>
                                <?php echo form_open('transaksi', array('class'=>'form-horizontal')); ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode Buku</label>
                                        <div class="col-sm-4">

                                          <input list="kode" name="kode" placeholder="masukan kode buku" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group ">
                                        <label class="col-sm-2 control-label">Judul Buku</label>
                                        <div class="col-sm-4">
                                          <input list="buku" name="buku" placeholder="masukkan nama buku" class="form-control">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Jumlah</label>
                                        <div class="col-sm-4">
                                          <input type="number" name="qty" placeholder="Jumlah" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Pelanggan</label>
                                        <div class="col-sm-4">
                                          <select name='id_member' id='id_pelanggan' class='form-control input-sm' style='cursor: pointer;'>

                          									<?php
                          									if($member->num_rows() > 0)
                          									{
                          										foreach($member->result() as $p)
                          										{

                          											echo "<option value='".$p->id_member."'>".$p->nama."</option>";
                          										}
                          									}
                          									?>
                          								</select>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="" name="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</button>

                                        </div>
                                    </div>
                                </form>
                                <datalist id="kode">
                                    <?php foreach ($buku->result() as $b) {
                                        echo "<option value='$b->kode_buku'> $b->judul_buku";
                                    } ?>

                                </datalist>
                                <!-- <datalist id="buku">
                                    <?php foreach ($buku->result() as $b) {
                                        echo "<option value='$b->judul_buku'>";
                                    } ?>

                                </datalist> -->
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>


                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Buku</th>
                                                <!-- <th>Pelanggan</th> -->
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $total=0; $totalall=0;

                                         foreach ($detail as $r){

                                           $total = $r->qty*$r->harga;
                                           // if ($r->nama!="Umum") {
                                           //   $total=$total-($total*0.1);
                                           // }
                                           ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td id="judul_buku"><?php echo $r->judul_buku.' - '.anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus',array('style'=>'color:red;')) ?></td>
                                                <!-- <td><?php echo $r->nama ?></td> -->
                                                <td><?php echo $r->qty ?></td>
                                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                                <td>Rp. <?php echo number_format($total,2) ?></td>
                                            </tr>
                                        <?php $totalall=$totalall+$total;

                                        $no++; } ?>
                                            <tr class="gradeA">
                                                <td colspan="4">T O T A L</td>
                                                <td>Rp. <?php echo number_format($totalall,2);?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                              <?php echo form_open('transaksi', array('class'=>'form-horizontal')); ?>
                              <!-- <form class="form-horizontal" method="get"> -->
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Pelanggan</label>
                                  <div class="col-sm-4">
                                    <select name='id_member' id='id_pelanggan' class='form-control input-sm' style='cursor: pointer;' onclick="showDiskon(this.value)" onclick="showGT()">

                                      <?php
                                      if($member->num_rows() > 0)
                                      {
                                        foreach($member->result() as $p)
                                        {

                                          echo "<option value='".$p->id_member."'>".$p->nama."</option>";


                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                              </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Total (Rp) </label>
                                    <div class="col-sm-4">
                                      <input type="text" id="total" value="<?php echo ($totalall);?>"  name="total" placeholder="masukkan nama buku" class="form-control" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Diskon (Rp) </label>
                                    <div class="col-sm-4">
                                      <input type="text" id="diskon" value="" name="diskon" placeholder="Diskon" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Total Bayar (Rp) </label>
                                    <div class="col-sm-4">
                                      <input type="text" id="grandtotal" value="" name="grandtotal" placeholder="Total Semua" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Bayar (Rp) </label>
                                    <div class="col-sm-4">
                                      <input type="text" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden>
                                      <input type="text" id="bayar" onkeyup="showKembali(this.value)" name="bayar" placeholder="masukkan harga bayar" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kembalian (Rp) </label>
                                    <div class="col-sm-4">
                                      <input type="text" id="kembali" placeholder="Kembalian" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-md-4">
                                      <!-- <a href="transaksi/cetakresi" class="btn btn-primary btn-sm" target="_blank">Cetak Resi Pembayaran</a> -->
                                      <button type="" class="btn btn-primary btn-sm" formtarget="_blank" name="cetakresi"><i class="glyphicon glyphicon-print"></i> Selesai</button>
                                      <!-- <a href="javascript:window.print()">print</a>
                                      <button type="submit"  class="btn btn-primary btn-sm">Cetak Resi Pembayaran</button> -->
                                      <!-- <button type="" class="btn btn-primary btn-sm" name="selesai"> <i class="glyphicon glyphicon-saved"></i> Selesai</button> -->
                                      <!-- <a href="transaksi/selesai_belanja" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-saved"></i> Selesai</a> -->

                                    </div>
                                </div>
                              <!-- </form> -->


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <script type="text/javascript">

                  function showDiskon(str){
                    var member = str
                    var total = $('#total').val()
                    var diskon;
                    if (member > 0) {
                      diskon = total*0.1;
                    }else{
                      diskon = 0;
                    }
                    $('#diskon').val(diskon)
                    var grand = total-diskon
                    $('#grandtotal').val(grand)

                  }

                  function showKembali(str){
                    var total = $('#total').val()
                    var diskon = $('#diskon').val()
                    var bayar = str
                    var kembali = bayar-(total-diskon);

                    $('#kembali').val(kembali);
                  }
                </script>

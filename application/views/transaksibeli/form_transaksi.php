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
                  Transaksi Pembelian
              </h2>
                <?php echo form_open('transaksibeli', array('class'=>'form-horizontal')); ?>
                    <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Supplier</label>
                        <div class="col-sm-4">
                          <input list="kode" name="nama_supp" placeholder="masukan kode buku" class="form-control" required autocomplete="off">
                        </div>
                    </div> -->

                    <div class="form-group ">
                        <label class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-4">
                          <input type="text" name="buku" placeholder="masukkan nama buku" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-4">
                          <input type="number" name="harga" placeholder="harga" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-4">
                          <input type="number" name="jumlah" placeholder="jumlah" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="" name="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah</button>

                        </div>
                    </div>
                </form>
                <datalist id="kode">
                    <?php foreach ($supplier->result() as $b) {
                        echo "<option value='$b->nama_supplier'> $b->nama_supplier";
                    } ?>

                </datalist>

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
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; $total=0;
                        foreach ($detail as $r){ ?>
                            <tr class="gradeU">
                                <td><?php echo $no ?></td>

                                <td id="judul_buku"><?php echo $r->judul_buku.' - '.anchor('transaksibeli/hapusitem/'.$r->id_transaksi_beli,'Hapus',array('style'=>'color:red;')) ?></td>
                                <td><?php echo $r->jumlah ?></td>
                                <td>Rp. <?php echo number_format($r->harga_beli,2) ?></td>
                                <td>Rp. <?php echo number_format($r->jumlah*$r->harga_beli,2) ?></td>
                            </tr>
                        <?php $total=$total+($r->jumlah*$r->harga_beli);
                        $no++; } ?>
                            <tr class="gradeA">
                                <td colspan="4">T O T A L</td>
                                <td>Rp. <?php echo number_format($total,2);?></td>
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
              <?php echo form_open('transaksibeli', array('class'=>'form-horizontal')); ?>
              <!-- <form class="form-horizontal" method="get"> -->
              <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="id_supplier" required id="id_supplier">
                        <?php foreach ($supplier->result() as $k) {
                            echo "<option value='$k->id_supplier'>$k->nama_supplier</option>";
                        }

                         ?>
                    </select>
                  </div>
              </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Total (Rp) </label>
                    <div class="col-sm-4">
                      <input type="text" id="total" value="<?php echo ($total);?>" name="total" placeholder="masukkan nama buku" class="form-control" readonly>
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
                      <!-- <a href="transaksibeli/selesai_belanja" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-saved"></i> Selesai</a> -->
                    </div>
                </div>
              <!-- </form> -->


            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
<script type="text/javascript">

  function showKembali(str){
    var total = $('#total').val()
    var bayar = str
    var kembali = bayar-total;

    $('#kembali').val(kembali);
  }





</script>

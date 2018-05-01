<div class="row">
    <div class="col-md-12">

    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <h2 class="page-header">
                  Laporan Transaksi Pembelian
              </h2>
                <?php echo form_open('transaksibeli/laporan', array('class'=>'form-inline')); ?>
                    <div class="form-group">
                        <label for="exampleInputName2">Tanggal</label>
                        <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"> - </label>
                        <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai" required>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="glyphicon glyphicon-eye-open"></i> Tampilkan</button>
                    <button class="btn btn-primary btn-sm" type="submit" name="cetak" formtarget="_blank"><i class="glyphicon glyphicon-print"></i>  Cetak</button>
                    <button class="btn btn-primary btn-sm" type="submit" name="excel" formtarget="_blank"><i class="glyphicon glyphicon-calendar"></i> Excel</button>
                </form>
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
                                <th>Tanggal Transaksi</th>
                                <th>Nama Supplier</th>
                                <th>Total Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; $totalall = 0; foreach ($record->result() as $r){ ?>
                            <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->tanggal ?></td>
                                <td><?php echo $r->nama_supplier ?></td>
                                <td><?php echo $r->total ?></td>
                            </tr>
                        <?php $no++; $totalall=$totalall+$r->total; } ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td><?php echo $totalall;?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <?php echo anchor('transaksi/pdf','Cetak',array('class'=>'btn btn-primary btn-sm'))?>
                    <a href="<?php echo base_url().'transaksi/pdf'?>" class="btn btn-primary btn-sm"  target="_blank">Cetak</a> -->
                </div>
                <!-- /. TABLE  -->
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->

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
                                  Laporan Transaksi Penjualan
                              </h2>
                                <?php echo form_open('transaksi/laporan', array('class'=>'form-inline')); ?>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Tanggal</label>
                                        <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2"> - </label>
                                        <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai" required>
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class="glyphicon glyphicon-eye-open"></i> Tampilkan</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="cetak" formtarget="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</button>
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
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Id Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Pelanggan</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $totalall = 0; foreach ($record->result() as $r){ ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->transaksi_id ?></td>
                                                <td><?php echo $r->tanggal ?></td>
                                                <td><?php echo $r->nama ?></td>
                                                <td><?php echo $r->grandtotal ?></td>
                                                <!-- <td><?php echo $r->qty ?></td>

                                                <?php $total = $r->harga*$r->qty ?>
                                                <td><?php echo $total ?></td> -->
                                            </tr>
                                        <?php $no++; $totalall=$totalall+$r->grandtotal; } ?>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo $totalall;?></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                                <!-- /. TABLE  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->

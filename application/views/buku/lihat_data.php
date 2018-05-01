                <div class="row">
                    <div class="col-md-12">


                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h2 class="page-header">
                                  Data Buku
                              </h2>
                                <a class="btn btn-primary" href="<?php echo site_url('buku/post')?>"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTables-example" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Kategori</th>
                                                <th>Penerbit</th>
                                                <th>Pengarang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kode_buku ?></td>
                                                <td><?php echo $r->judul_buku ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo $r->penerbit?></td>
                                                <td><?php echo $r->pengarang?></td>
                                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                                <td><?php echo $r->jumlah?></td>
                                                <td class="center">
                                                    <!-- <?php echo anchor('buku/edit/'.$r->kode_buku,'Edit'); ?> -->
                                                    <a class="btn btn-success" href="<?php echo site_url('buku/edit/'.$r->kode_buku);?>"><i class="glyphicon glyphicon-edit"></i></a>
                                                    <!-- <?php echo anchor('buku/delete/'.$r->kode_buku,'Delete'); ?> -->
                                                    <a class="btn btn-danger" href="<?php echo site_url('buku/delete/'.$r->kode_buku);?>"
                                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->

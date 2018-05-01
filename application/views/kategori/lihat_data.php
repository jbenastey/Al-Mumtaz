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
                                  Kategori Buku
                              </h2>
                              <a class="btn btn-primary" href="<?php echo site_url('kategori/post')?>"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Kategori</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kategori_id?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td class="center">
                                                    <!-- <?php echo anchor('kategori/edit/'.$r->kategori_id,'Edit'); ?> -->
                                                    <a class="btn btn-success" href="<?php echo site_url('kategori/edit/'.$r->kategori_id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                                                    <!-- <?php echo anchor('kategori/delete/'.$r->kategori_id,'Delete'); ?> -->
                                                    <a class="btn btn-danger" href="<?php echo site_url('kategori/delete/'.$r->kategori_id);?>"
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

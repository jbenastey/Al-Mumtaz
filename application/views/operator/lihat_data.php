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
                                  Data Operator
                              </h2>
                                 <a class="btn btn-primary" href="<?php echo site_url('operator/post')?>"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Login Trakhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_lengkap ?></td>
                                                <td><?php echo $r->username ?></td>
                                                <td><?php echo $r->last_login ?></td>
                                                <td class="center">
                                                    <!-- <?php echo anchor('operator/edit/'.$r->operator_id,'Edit'); ?>  -->
                                                    <a class="btn btn-success" href="<?php echo site_url('operator/edit/'.$r->operator_id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                                                    <!-- <?php echo anchor('operator/delete/'.$r->operator_id,'Delete'); ?> -->
                                                    <a class="btn btn-danger" href="<?php echo site_url('operator/delete/'.$r->operator_id);?>"
                                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->

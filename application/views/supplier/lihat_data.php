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
                  Data Supplier
              </h2>
                 <a class="btn btn-primary" href="<?php echo site_url('supplier/post')?>"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Supplier</th>
                                <th>Nama Pimpinan</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->nama_supplier ?></td>
                                <td><?php echo $r->nama_pimpinan ?></td>
                                <td><?php echo $r->nomor_telepon?></td>
                                <td><?php echo $r->alamat?></td>
                                <td class="center">
                                    <!-- <?php echo anchor('barang/edit/'.$r->kode_buku,'Edit'); ?> -->
                                    <a class="btn btn-success" href="<?php echo site_url('supplier/edit/'.$r->id_supplier);?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <!-- <?php echo anchor('barang/delete/'.$r->kode_buku,'Delete'); ?> -->
                                    <a class="btn btn-danger" href="<?php echo site_url('supplier/delete/'.$r->id_supplier);?>"
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

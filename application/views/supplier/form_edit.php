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
                  Edit Data Supplier
              </h2>
                <?php echo form_open('supplier/edit', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Supplier</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="id_supplier" value="<?php echo $record['id_supplier']?>"  required autocomplete="off" readonly>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Supplier</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama_supplier" value="<?php echo $record['nama_supplier']?>"  required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pimpinan</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama_pemimpin" value="<?php echo $record['nama_pimpinan']?>" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_telepon" value="<?php echo $record['nomor_telepon']?>" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="alamat" value="<?php echo $record['alamat']?>" required  autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <a href="../supplier" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm" onclick="return alert('Data berhasil diubah')"><i class="glyphicon glyphicon-floppy-saved"></i> Update</button>

                </div>
              </div>


                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

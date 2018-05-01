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
                  Edit Data Karyawan
              </h2>
                <?php echo form_open('karyawan/edit', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID karyawan</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="id_karyawan" value="<?php echo $record['id_karyawan']?>" required  autocomplete="off" readonly>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama" value="<?php echo $record['nama']?>" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_identitas" value="<?php echo $record['no_identitas']?>" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="alamat" value="<?php echo $record['alamat']?>" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_telepon" value="<?php echo $record['no_telepon']?>" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <!-- <select name="jenis_kelamin" class="form-control">
                      <option value="L">L</option>
                      <option value="P">P</option>
                    </select> -->
                    <input type="radio" name="jenis_kelamin" value="L" checked>Laki-Laki <br>
                    <input type="radio" name="jenis_kelamin" value="P">Perempuan <br>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="jabatan" value="<?php echo $record['jabatan']?>" required autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <a href="../karyawan" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm" onclick="return alert('Data berhasil diubah')"><i class="glyphicon glyphicon-floppy-saved"></i> Update</button>

                </div>


                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

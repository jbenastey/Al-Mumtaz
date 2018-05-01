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
                  Edit Data Member
              </h2>
                <?php echo form_open('member/edit', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Member</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="id_member" value="<?php echo $record['id_member']?>" required autocomplete="off" readonly>
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
                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_telepon" value="<?php echo $record['no_telepon']?>" required  autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                    <!-- <select class="form-control" name="jenis_kelamin">
                      <option value="L">L</option>
                      <option value="P">P</option>
                    </select> -->
                    <input type="radio" name="jenis_kelamin" value="L" checked>Laki-Laki <br>
                    <input type="radio" name="jenis_kelamin" value="P">Perempuan <br>
                    <!-- <input class="form-control" name="jenis_kelamin" value="<?php echo $record['jenis_kelamin']?>" required> -->
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="alamat" value="<?php echo $record['alamat']?>" required autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <a href="../member" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

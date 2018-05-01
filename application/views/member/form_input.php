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
                  Tambah Data Member
              </h2>
                <?php echo form_open('member/post', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Member</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="id_member" placeholder="Input id member" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama" placeholder="Input nama member" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Identitas</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_identitas" placeholder="Input nomor identitas" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_telepon" placeholder="Input nomor telepon" required autocomplete="off">
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
                    <!-- <input class="form-control" name="jenis_kelamin" placeholder="Input jenis kelamin" required> -->
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="alamat" placeholder="Input alamat member" required autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">

                      <a href="member" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
                      <button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                    </div>

                </div>


                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

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
                  Tambah Data Supplier
              </h2>
                <?php echo form_open('supplier/post', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Supplier</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="id_supplier" placeholder="Input id supplier" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Supplier</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama_supplier" placeholder="Input nama supplier" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pimpinan</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="nama_pemimpin" placeholder="Input nama pimpinan" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_telepon" placeholder="Input nomor telepon" required autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-9">
                    <input class="form-control" name="alamat" placeholder="Input alamat supplier" required autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">

                      <a href="supplier" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

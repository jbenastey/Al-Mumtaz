<div class="row">
    <div class="col-md-12">

    </div>
</div>

<!-- <h3>Edit Data Kategori</h3>
<?php
echo form_open('kategori/edit');
?> -->
<!-- <input type="hidden" value="<?php echo $record['kategori_id']?>" name="id">
<table class="table table-bordered">
    <tr><td width="130">Nama Kategori</td>
        <td><div class="col-sm-4""><input type="text" name="kategori" placeholder="kategori" class="form-control"
                   value="<?php echo $record['nama_kategori']?>"></div>
       </td></tr>
    <tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm'))?></td></tr>
</table>
</form> -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <h2 class="page-header">
                  Edit Kategori
              </h2>
                <?php echo form_open('kategori/edit', array('class'=>'form-horizontal')); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ID Kategori</label>
                    <div class="col-sm-9">
                    <input type="text" name="id_kategori" class="form-control" value="<?php echo $record['kategori_id']?>" autocomplete="off" readonly>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-9">
                    <input type="text" name="kategori" class="form-control" value="<?php echo $record['nama_kategori']?>" autocomplete="off">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <a href="../kategori" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

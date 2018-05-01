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
                                  Tambah Kategori
                              </h2>
                                <?php echo form_open('kategori/post', array('class'=>'form-horizontal')); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID Kategori</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="id_kategori" class="form-control" placeholder="input id kategori" required  autocomplete="off">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Kategori</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="kategori" class="form-control" placeholder="input nama kategori" required autocomplete="off">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-9">

                                      <a href="kategori" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

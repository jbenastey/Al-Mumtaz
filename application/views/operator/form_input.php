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
                                  Tambah data Operator
                              </h2>
                                <?php echo form_open('operator/post', array('class'=>'form-horizontal')); ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" placeholder="nama lengkap" required autocomplete="off">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" placeholder="username"  required autocomplete="off">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control"  name="password" placeholder="password"  required autocomplete="off">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-9">

                                      <a href="operator" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

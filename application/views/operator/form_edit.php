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
                                  Edit data operator
                              </h2>
                                <?php echo form_open('operator/edit', array('class'=>'form-horizontal')); ?>
                                <input type="hidden" value="<?php echo $record['operator_id']?>" name="id">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $record['nama_lengkap']?>"  required autocomplete="off">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" value="<?php echo $record['username']?>"  required autocomplete="off">
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
                                      <a href="../operator" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

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
                                  Tambah Data Buku
                              </h2>
                                <?php echo form_open('buku/post', array('class'=>'form-horizontal')); ?>
                                
      
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Buku</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="kode_buku" placeholder="Input kode buku" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Judul Buku</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="judul_buku" placeholder="Input judul buku" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                      <select name="kategori" class="form-control" required style='cursor: pointer;'>
                                          <?php foreach ($kategori as $k) {
                                              echo "<option value='$k->kategori_id'>$k->nama_kategori</option>";
                                          } ?>
                                      </select>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Penerbit</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="penerbit" placeholder="Input nama penerbit" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pengarang</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="pengarang" placeholder="Input nama pengarang" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Harga</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" name="harga" placeholder="Input harga buku" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" name="jumlah" placeholder="Input jumlah buku" required autocomplete="off">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-9">
                                      
                                      <a href="buku" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
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

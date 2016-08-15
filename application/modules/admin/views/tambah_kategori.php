<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script> 
  <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
  <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Kategori</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                               <form class="form-horizontal" action="<?php echo base_url('admin/kategori/proses_tambah'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" >
                              <div class="box-body">
                                  <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
                                  <div class="col-sm-10">
                                   <input type="text" id="kategori" name="kategori" required class="form-control">
                                  </div>
                                </div>
                                 
                              <div class="box-footer">
                                    <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label"></label>
                                  <div class="col-sm-10">
                                     <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                  </div>
                                </div>
                              </div><!-- /.box-footer -->
                               <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                </form>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->

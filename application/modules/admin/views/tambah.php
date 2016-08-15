<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script> 
  <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
  <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Posting Artikel</h3>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                               <form class="form-horizontal" action="<?php echo base_url('admin/proses_tambah'); ?>" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" >
                              <div class="box-body">
                               <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
                                  <div class="col-sm-5">
                                    <select class="form-control" name="kategori">
                                    <?php 
                                      foreach ($kategori->result() as $data) { ?>
                                        <option value="<?php echo $data->id ?>"><?php echo $data->kategori ?></option>
                                    <?php
                                      }
                                    ?> 
                                    </select>
                                  </div>
                                </div>
                                  <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-10">
                                   <input type="text" id="judul" name="judul" required class="form-control">
                                  </div>
                                </div>
                                  <div class="form-group">
				                      <label for="inputPassword3" class="col-sm-2 control-label">Tambahkan Gambar</label>
				                      <div class="col-sm-10">
				                        <img id="thumb_image" height="200px" width="200px" src="<?=base_url()?>assets/img/no_pict.png" /><br /><br />
				                        <span id="thumb_delete" class="glyphicon glyphicon-trash" style="cursor: pointer;">
				                      </div>
				                    </div>

				                    <div class="form-group">
				                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
				                      <div class="col-sm-5">
				                      <input rel="tooltip" title="Browse File" class="btn btn-primary" type="button" value="Browse ..." onclick="$(this).parent().find('input[type=file]').click();">
				                       <input type="file" style="visibility:hidden; width: 1px; height: 1px;" id="alkes_img" name="gambar" onchange="validate_file(this)">
				                   </div>
				                    </div>
                                  <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Isi</label>
                                  <div class="col-sm-10">
                                       <textarea id="editor1" name="isi" rows="10" cols="80" required></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                               
                            </script>
                                  </div>
                                </div>
                              </div><!-- /.box-body -->
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

<script>
  var staf = "<?php base_url('assets/img/no_pict.png') ?>";
    function validate_file(obj){
        var file_name = $(obj).val().replace('C:\\fakepath\\', '');
        var file_name_attr = file_name.split('.');
        file_name_attr[2] = obj.files[0].size/1024;
        
        if(file_name_attr[2] > 5000){
            $(obj).wrap('<form>').closest('form').get(0).reset();
            $(obj).unwrap();
            $(obj).parent().parent().find('.text_file').val('');
            readURL(obj, 'set');
            alert('File must jpg and maximum file size under 5 mb!');
        }
        else{
            $(obj).parent().parent().find('.text_file').val(file_name);
            $('#thumb_delete').fadeIn();
            readURL(obj);
        }
    }
    
    function readURL(input, type) {
        if (type != 'set'){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#thumb_image').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
        else{
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
        }
    }
    
    $(function(){
        $('#thumb_delete').fadeOut();
        
        $('#thumb_delete').click(function(){
            //$('#thumb_image').attr('src','jst/assets/images/no_pict.png');
            $('#thumb_image').attr('src',staf);
            var obj = $('#alkes_img');
            
            obj.wrap('<form>').closest('form').get(0).reset();
            obj.unwrap();
            obj.parent().parent().find('.text_file').val('');
            $(this).fadeOut();
        });
        
        $('#alkes_price').change(function(){
            var value = $(this).autoNumeric('get');
            $(this).parent().find('input[type="hidden"]').val(value);
        });
    });

   function validasi_input(form){ 
    var editor1 = CKEDITOR.instances.editor1.getData();
    var fup = document.getElementById('alkes_img');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

    if (editor1 == "") {
          alert("Anda belum memasukkan deskripsi berita");
          return (false);
        }
    if (ext == "") {
          alert("Anda belum memasukkan gambar");
          return (false);
        }
    return (true); } 
</script>
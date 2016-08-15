<section class="content-header">
    <h1>
        Member Blog
      
    </h1>

</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box box-primary">

        <div class="box-header with-border">
         <div class="col-md-12">
                       <?php
            if($this->session->flashdata('item')) {
            $message = $this->session->flashdata('item'); ?>
            <div class="row">
             <div class="<?php echo $message['class'] ?>"><?php echo $message['message'] ?></div>
             </div>
         <?php    
          }?>
         </div>
            <!-- <h3 class="box-title" align="center">Gambar Slider</h3> -->

			
             <div class="col-md-1" style="width:120px;padding-bottom:10px;">
              <a class="btn btn-warning" href="javascript:void()" onclick="edit_profil(<?php echo $user->row('id')?>)" title="Edit Profil"><i class="glyphicon glyphicon-pencil"></i> Edit Profil</a>
            
			</div>

        </div>
           
        <div class="box-body">
        <div class="row">
             <div class="col-md-6" >
                 <table class="table" id="table" style="width:auto">
              <tr>
            <th>Username</th>
                <th>:</th>
                 <td><?php echo $user->row('username') ?></td>
             </tr>
             <tr>
               <th>Nama</th>
               <th>:</th>
               <td><?php echo $user->row('nama') ?></td>
             </tr>

              <tr>
               <th>Email</th>
               <th>:</th>
                <td><?php echo $user->row('email') ?></td>
             </tr>
             <tr>       
             <tr>
               <th>Nomor HP</th>
               <th>:</th>
                 <td><?php echo $user->row('no_hp') ?></td>
             </tr>
              <tr>
               <th>Alamat</th>
               <th>:</th>
                <td><?php echo $user->row('alamat') ?></td>
              </tr>
             

           </table>
            </div>
        </div>
        
        

    </div><!-- /.box -->
</div>
</section><!-- /.content -->
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
 <script type="text/javascript">
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
var save_method;
var table;

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
        url = "<?php echo site_url('member/proses_edit')?>";
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('toggle');
                alert('Berhasil memperbarui data');
                window.location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    console.log('error');
                }
            }
            
            
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
        }
    });
}

function edit_profil(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('member/edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="username"]').val(data.username);
            $('[name="email"]').val(data.email);
            $('[name="alamat"]').val(data.alamat);
            $('[name="no_hp"]').val(data.no_hp);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Profil Member'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

</script>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo site_url('member/proses_edit')?>" method="post" id="form" class="form-horizontal">
                    <input type="hidden"  name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" readonly placeholder="Username" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama"  placeholder="Nama lengkap" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>

                   
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" required class="form-control tags" id="tags_1" placeholder=""  type="email">
                                <span class="help-block"></span>
                            </div>
                        </div>                      
                           <div class="form-group">
                            <label class="control-label col-md-3">Nomor HP</label>
                            <div class="col-md-9">
                                <input name="no_hp" required class="form-control tags" id="tags_1" placeholder=""  type="number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <textarea name="alamat" required placeholder="Address" rows="3" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                      
                    </div>
                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

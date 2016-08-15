
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">
<section class="content-header">
    <h1 id="judulKonten">
       Kategori
      
    </h1>

</section>

<section class="content">
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
<a href="javascript:void()" id="tambah" onclick="tambah()" ><button type="submit" class="btn btn-success"><b id="titleJudul">Tambah</b></button></a>
<a href="javascript:void()" id="kembali" onclick="back()" ><button type="submit" class="btn btn-danger">Back</button></a>
<br><br>
        <div class="box box-primary" id="konten">
                <div class="box-body table-responsive"">
                  <!-- Date dd/mm/yyyy -->
                    <table id="example1" class="table table-bordered table-striped table-responsive"">
                     <thead>
                      <tr>
                         <tr>
                          <th width="1">No</th>
                          <th>Nama</th>
                          <th width="1">Action</th>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i =1;
                      foreach ($get_data->result() as $data) { ?>
                      <tr align="left">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data->kategori; ?></td>
                        <td>
                          <a href="javascript:void()" onclick="edit(<?php echo $data->id ?>)"><button class="btn btn-warning" tyoe="button">Edit</button></a>
                        </td>

               
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
            </div>
</section><!-- /.content -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.0.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<script>
function tambah()
{
    $.ajax({
        url : "<?php echo site_url('admin/kategori/tambah')?>/",
        success: function(data)
        {
             $('#judulKonten').html('Tambah Kategori');
             $('#kembali').show();
             $('#tambah').hide();
             $('#konten').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit(id)
{
      $.ajax({
        url : "<?php echo site_url('admin/kategori/edit')?>/"+id,
        type: "GET",
        success: function(data)
        {
             $('#judulKonten').html('Edit Kategori');
             $('#kembali').show();
             $('#tambah').hide();
             $('#konten').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function back()
{
   window.location.href = "<?php echo base_url()."admin/kategori" ?>";
}

 $(function () {
    $('#kembali').hide();
        $('#example1').DataTable({
          'aoColumns': [
             { sWidth: "autoWidth", bSearchable: true, bSortable: true },
             { sWidth: "autoWidth", bSearchable: true, bSortable: true },
             { sWidth: "autoWidth", bSearchable: false, bSortable: false },
       ],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });


</script>

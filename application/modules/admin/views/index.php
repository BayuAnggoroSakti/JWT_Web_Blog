
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">
<section class="content-header">
    <h1 id="judulKonten">
       Post Artikel
      
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
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th width="1">Isi</th>
                          <th>gambar</th>
                          <th width="1">Status</th>
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
                        <td><?php echo $data->judul; ?></td>
                        <td><?php echo $data->isi ?></td>
                        <td><img src="<?php echo base_url()."assets/img/".$data->gambar ?>" width="100px" height="100px"></td>
                        <td><?php if ($data->deleted == "0") { ?>
                          <div class="label label-info" style="display:block;"><i class="fa fa-check"></i> Tampil </div>
                        <?php
                        } else {
                          echo '<div class="label label-danger" style="display:block;"><i class="fa fa-close"></i> Tidak </div>';
                        }?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            Action</button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="javascript:void()" onclick="edit(<?php echo $data->id ?>)"><span style="color:blue" align="center"><i class="fa fa-edit"></i> Edit Data</span></a></li>
                            <li class="divider"></li>
                             <li><a onclick="return confirm('Apakah anda yakin akan menghapus post ini ?')" href="<?php echo site_url('admin/hapus'.'/'.$data->id) ?>"><span style="color:red"><i class="fa fa-trash"></i> Hapus</span></a></li>
                            </ul>
                          </div>
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
        url : "<?php echo site_url('admin/tambah')?>/",
        success: function(data)
        {
             $('#judulKonten').html('Tambah Post');
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
        url : "<?php echo site_url('admin/edit')?>/"+id,
        type: "GET",
        success: function(data)
        {
             $('#judulKonten').html('Edit Post');
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
   window.location.href = "<?php echo base_url() ?>";
}

 $(function () {
    $('#kembali').hide();
        $('#example1').DataTable({
          'aoColumns': [
             { sWidth: "autoWidth", bSearchable: true, bSortable: true },
             { sWidth: "autoWidth", bSearchable: true, bSortable: true },
             { sWidth: "autoWidth", bSearchable: true, bSortable: true },
              { sWidth: "autoWidth", bSearchable: true, bSortable: true },
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

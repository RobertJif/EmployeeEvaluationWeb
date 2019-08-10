<!DOCTYPE html>
<html>

<?php include ('include/header.php');?>
<?php include ('include/head.php');?>
            <section class="content">
                <div class="container-fluid">


                    <!-- Exportable Table -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">

                                    <h2>
                                        DATA SUB KRITERIA PT RIAU SARANA ENERGI
                                    </h2>
                                    <br>
                                    <button type="button" class="btn bg-amber waves-effect" data-toggle="modal" data-target="#defaultModal">
                                        <i class="material-icons">control_point</i>
                                        <span>Tambah</span>
                                    </button>

                                    <!-- Default Size -->
                                    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Tambah Bobot</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/simpan_sub_kriteria'?>">
                                                    
                                                   <input type="hidden"  name="status" value="<?php echo $status;?>">

                                                   <input type="hidden"  name="id_kriteria" value="<?php echo $id_kriteria;?>">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nama Bobot</label>
                                                            <input type="text" class="form-control" placeholder="Bobot" name=nama id="add_nama" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Detail Bobot</label>
                                                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" id="add_deskripsi" />
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">

                                                    <button type="submit" class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                                                </div>
                                            </form>   
                                        
                                        </div>
                                    </div>
                                </div>

                            </div>

                           
                            <div class="body">

                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                        <thead>

                                            <tr>
                                                <th>No.</th>
                                                <th>Bobot</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         foreach($data->result_array() as $is => $i):
                                          $id=$i['id'];
                                          $nama=$i['nama'];
                                          $deskripsi=$i['deskripsi'];
                                          ?>
                                          <tr>
                                            <td><?php echo $is+1;?></td>
                                            <td><?php echo $nama;?></td>
                                            <td><?php echo $deskripsi;?></td>
                                            <td> 
                           
                                                <button type="button" class="btn bg-orange waves-effect" data-toggle="modal" data-target="#defaultModal1<?php echo $id; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span>Edit</span>
                                            </button>

                                              &nbsp
                                                <button type="button" class="btn bg-red waves-effect" onclick="deleteSubBobot(<?php echo $id; ?>,<?php echo $id_kriteria;?>,'<?php echo $status;?>')">
                                                <i class="material-icons">border_color</i>
                                                <span>Delete</span>
                                            </button>
                                        </td>
                                        </tr>

                                         <!-- Default Size -->
                            <div class="modal fade" id="defaultModal1<?php echo $id; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Update Bobot</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  method="post" action="<?php echo base_url().'index.php/pegawaicontroller/edit_sub_kriteria'?>">

                                                   <input type="hidden"  name="id" value="<?php echo $id;?>">
                                                   <input type="hidden"  name="id_kriteria" value="<?php echo $id_kriteria;?>">
                                                   <input type="hidden"  name="status" value="<?php echo $status;?>">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nama Bobot</label>
                                                            <input type="text" class="form-control" value="<?php echo $nama;?>" placeholder="Bobot" name=nama id="edit_nama<?php echo $id;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Detail Bobot</label>
                                                            <input type="text" class="form-control" value="<?php echo $deskripsi;?>" placeholder="Detail Bobot" name="deskripsi" id="edit_deskripsi<?php echo $id;?>" />
                                                        </div>
                                                    </div>

                                            <div class="modal-footer">
                           
                                                <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(<?php echo $id;?>); return false">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
    
                                    <?php endforeach;?>
                                </tbody>

                            </table>

                        </div>
<form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/v_datakriteria'?>">
                 <button type="submit" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal">
                                        <i class="material-icons">control_point</i>
                                        <span>Back</span>
                                    </button>
            </form>
                    </div>

                </div>

            </div>

        </div>
        <!-- #END# Exportable Table -->

    </div>
</section>
   <?php include 'include/foot.php';?>
<script type="text/javascript">
    function CheckForm(){

      var vnamapegawai = document.getElementById('add_nama').value;
      var vtempatlahir = document.getElementById('add_deskripsi').value;

      var bobot1 = parseInt(document.getElementById('add_bobot1').value);
      var bobot2 = parseInt(document.getElementById('add_bobot2').value);
      var bobot3 = parseInt(document.getElementById('add_bobot3').value);
      var total = bobot1+bobot2+bobot3;
      if(total!=100){

        alert("Total 3 Bobot harus sama dengan 100");
        return null;
      }
    if(vnamapegawai=="") {   
        alert("Bobot tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Deskripsi tidak boleh kosong");
        return null;
    }


    form.submit();
}

function CheckFormEdit(id){
  var vnamapegawai = document.getElementById('edit_nama'+id).value;
  var vtempatlahir = document.getElementById('edit_deskripsi'+id).value;

      var bobot1 = parseInt(document.getElementById('edit_bobot1'+id).value);
      var bobot2 = parseInt(document.getElementById('edit_bobot2'+id).value);
      var bobot3 = parseInt(document.getElementById('edit_bobot3'+id).value);
      //var total = bobot1+bobot2+bobot3;
      
      //if(total!=100){

        //alert("Total 3 Bobot harus sama dengan 100");
        //return null;
      //}
 if(vnamapegawai=="") {   
        alert("Bobot tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Deskripsi tidak boleh kosong");
        return null;
    }

form.submit();
}




function deleteSubBobot(id,id_kriteria,status){
        var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        window.location ="<?php echo site_url('pegawaicontroller/hapus_sub_kriteria/'); ?>"+id+"/"+id_kriteria+"/"+status;
      } else {
      }
    }
</script>
</body>

</html>
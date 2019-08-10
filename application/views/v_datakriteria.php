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
                                        DATA KRITERIA PT RIAU SARANA ENERGI
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
                                                    <h4 class="modal-title" id="defaultModalLabel">Tambah Kriteria</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/simpan_kriteria'?>">
                                                   

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Kriteria</label>
                                                            <input type="text" class="form-control" placeholder="Kriteria" name=nama id="add_nama" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Deskripsi</label>
                                                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" id="add_deskripsi" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Kepala Cabang</label>
                                                            <input type="number" class="form-control" placeholder="Nilai Bobot 1" name="bobot1" id="add_bobot1" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Kepala Department</label>
                                                            <input type="number" class="form-control" placeholder="Nilai Bobot 2" name="bobot2" id="add_bobot2" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Pegawai</label>
                                                            <input type="number" class="form-control" placeholder="Nilai Bobot 3" name="bobot3" id="add_bobot3" />
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
                                                <th>Kriteria</th>
                                                <th>Deskripsi</th>
                                                <th>Bobot Kepala Cabang</th>
                                                <th>Bobot Kepala Department</th>
                                                <th>Bobot Pegawai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         foreach($data->result_array() as $is => $i):
                                          $id=$i['id'];
                                          $nama=$i['nama'];
                                          $deskripsi=$i['deskripsi'];
                                          
                                          $bobot1=$i['bobot1'];
                                          $bobot2=$i['bobot2'];
                                          $bobot3=$i['bobot3'];
                                          ?>
                                          <tr>
                                            <td><?php echo $is+1;?></td>
                                            <td><?php echo $nama;?></td>
                                            <td><?php echo $deskripsi;?></td>
                                            <td><?php echo $bobot1;?>%</td>
                                            <td><?php echo $bobot2;?>%</td>
                                            <td><?php echo $bobot3;?>%</td>
                                            <td>  
                                                 <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#defaultModalv1<?php echo $id; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span>View</span>
                                            </button> &nbsp
                                                <button type="button" class="btn bg-orange waves-effect" data-toggle="modal" data-target="#defaultModal1<?php echo $id; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span>Edit</span>
                                            </button>

                                              &nbsp
                                                <button type="button" class="btn bg-red waves-effect" onclick="deleteSubKriteria(<?php echo $id; ?>)">
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
                                            <h4 class="modal-title" id="defaultModalLabel">Update Kriteria</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  method="post" action="<?php echo base_url().'index.php/pegawaicontroller/edit_kriteria'?>">

                                                   <input type="hidden"  name="id" value="<?php echo $id;?>">
                                                  <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Kriteria</label>
                                                            <input type="text" class="form-control" placeholder="Kriteria" name=nama id="edit_nama" value="<?php echo $nama;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Deskripsi</label>
                                                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" id="edit_deskripsi" value="<?php echo $deskripsi;?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Kepala Cabang</label>
                                                            <input type="number" class="form-control" value="<?php echo $bobot1;?>" placeholder="Nilai Bobot 1" name="bobot1" id="edit_bobot1<?php echo $id;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Kepala Department</label>
                                                            <input type="number" class="form-control" value="<?php echo $bobot2;?>" placeholder="Nilai Bobot 2" name="bobot2" id="edit_bobot2<?php echo $id;?>" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nilai Bobot Pegawai</label>
                                                            <input type="number" class="form-control" value="<?php echo $bobot3;?>" placeholder="Nilai Bobot 3" name="bobot3" id="edit_bobot3<?php echo $id;?>" />
                                                        </div>
                                                    </div>

                                            <div class="modal-footer">
                           
                                                <button type="submit" class="btn btn-primary" onclick="CheckFormEdit()">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div></div></div>
 <!--View-->
                             <div class="modal fade" id="defaultModalv1<?php echo $id; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Update Kriteria</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  method="post" action="<?php echo base_url().'index.php/pegawaicontroller/v_datasub_kriteria/'?><?php echo $id;?>">

                                                   <input type="hidden"  name="id" value="<?php echo $id;?>">
                                                   <input type="hidden"  name="hdstatus" id="hdstatus<?php echo $id;?>" value="KepalaCabang">
                                                  <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Status</label>
                                                            <select class="form-control show-tick" name="status" id="status<?php echo $id;?>" onchange="changehdstatus(<?php echo $id;?>)">
                                                                <option value="KepalaCabang">Kepala Cabang</option>
                                                                <option value="KepalaDepartemen">Kepala Departemen</option>
                                                                <option value="Pegawai">Pegawai</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                            <div class="modal-footer">
                           
                                                <button type="submit" class="btn btn-primary" >Go</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            </div>
                           
                                    <?php endforeach;?>
                                </tbody>

                            </table>

                        </div>

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

      if(vnamapegawai=="") {
        alert("Kriteria tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Deskripsi tidak boleh kosong");
        return null;
    }


    form.submit();
}

function CheckFormEdit(){
  var vnamapegawai = document.getElementById('edit_nama').value;
  var vtempatlahir = document.getElementById('edit_deskripsi').value;

      if(vnamapegawai=="") {
        alert("Kriteria tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Deskripsi tidak boleh kosong");
        return null;
    }

form.submit();
}


function changehdstatus(id){

        
        document.getElementById('hdstatus'+id).value = document.getElementById('status'+id).value;;
        //alert(document.getElementById('hdstatus'+id).value);
        //return null;
    }


function deleteSubKriteria(id){
        var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
        window.location ="<?php echo site_url('pegawaicontroller/hapus_kriteria/'); ?>"+id;
      } else {
      }
    }
</script>
</body>

</html>
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
                                        DATA PEGAWAI PT RIAU SARANA ENERGI
                                    </h2>
                                    <br>

                                <?php 
                                  if($stats=='Admin'){
                                  ?>
                                    <button type="button" class="btn bg-amber waves-effect" data-toggle="modal" data-target="#defaultModal">
                                        <i class="material-icons">control_point</i>
                                        <span>Tambah</span>
                                    </button>
                                <?php } ?>
                                    <!-- Default Size -->
                                    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Tambah Pegawai</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/simpan_pegawai'?>">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nama Pegawai</label>
                                                            <input type="text" class="form-control" placeholder="Nama Pegawai" name=nama id="add_nama" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="add_tempat_lahir" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="add_tanggal_lahir" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="add_alamat"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Jabatan</label>
                                                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="add_jabatan"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Status</label>
                                                            <select class="form-control show-tick" name="status" id="add_status">
                                                                <option value="">-- Please select --</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="KepalaCabang">Kepala Cabang</option>
                                                                <option value="KepalaDepartemen">Kepala Departemen</option>
                                                                <option value="Pegawai">Pegawai</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nomor Telpon</label>
                                                            <input type="text" class="form-control" placeholder="Nomor Telpon" name="no_hp" id="add_no_hp" />
                                                        </div>
                                                    </div>
                                                    

                                                <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Aktif</label>
                                                            <select class="form-control show-tick" name="aktif" id="add_aktif">
                                                                <option value="">-- Please select --</option>
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                           <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" placeholder="Username" name="username" id="add_username" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" id="add_password" />
                                                        </div>
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
                                                <th>Nama Pegawai</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Jabatan</th>
                                                <th>No Hp</th>
                                                <?php 
                                                  if($stats=='Admin'){
                                                  ?>
                                                <th>Aksi</th>
                                            <?php } ?>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         foreach($data->result_array() as $i):
                                          $id=$i['id'];
                                          $nama=$i['nama'];
                                          $tempat_lahir=$i['tempat_lahir'];
                                          $tanggal_lahir=$i['tanggal_lahir'];
                                          $tanggal_lahir=date('Y-m-d', strtotime($tanggal_lahir));
                                          $alamat=$i['alamat'];
                                          $jabatan=$i['jabatan'];
                                          $status=$i['status'];
                                          $aktif=$i['aktif'];
                                          $no_hp=$i['no_hp'];
                                          $username=$i['username'];
                                          $password=$i['password'];
                                          ?>
                                          <tr>
                                            <td><?php echo $nama;?></td>
                                            <td><?php echo $tempat_lahir;?></td>
                                            <td><?php echo $tanggal_lahir;?></td>
                                            <td><?php echo $alamat;?></td>
                                            <td><?php echo $jabatan;?></td>
                                            <td><?php echo $no_hp;?></td>
                                            <?php 
                                                  if($stats=='Admin'){
                                                  ?>
                                            <td>  <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal1<?php echo $id; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span>Edit</span>
                                            </button></td>
                                            <?php } ?>
                                        </tr>

                                         <!-- Default Size -->
                            <div class="modal fade" id="defaultModal1<?php echo $id; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Update Pegawai</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  method="post" action="<?php echo base_url().'index.php/pegawaicontroller/edit_pegawai'?>">

                                                   <input type="hidden"  name="id" value="<?php echo $id;?>">
                                                   <input type="hidden"  name="hdstatus" id="hdstatus<?php echo $id;?>" value="<?php echo $status;?>">
                                                   <input type="hidden"  name="hdaktif" id="hdaktif<?php echo $id;?>" value="<?php echo $aktif;?>">
                                                  <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nama Pegawai</label>
                                                            <input type="text" class="form-control" placeholder="Nama Pegawai" name=nama id="edit_nama" value="<?php echo $nama;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="edit_tempat_lahir" value="<?php echo $tempat_lahir;?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="edit_tanggal_lahir" value="<?php echo $tanggal_lahir;?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="edit_alamat" value="<?php echo $alamat;?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Jabatan</label>
                                                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="edit_jabatan" value="<?php echo $jabatan;?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Status</label>
                                                            <select class="form-control" name="status<?php echo $id;?>" id="edit_status<?php echo $id;?>">
                                                                <option value="">-- Please select --</option>
                                                                <option value="Admin" <?php if ($status=='Admin') {echo "selected";}?>>Admin</option>
                                                                <option value="KepalaCabang" <?php if ($status=='KepalaCabang') {echo "selected";}?>>Kepala Cabang</option>
                                                                <option value="KepalaDepartemen" <?php if ($status=='KepalaDepartemen') {echo "selected";}?>>Kepala Departemen</option>
                                                                <option value="Pegawai" <?php if ($status=='Pegawai') {echo "selected";}?>>Pegawai</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Nomor Telpon</label>
                                                            <input type="text" class="form-control" placeholder="Nomor Telpon" name="no_hp" id="edit_no_hp" value="<?php echo $no_hp;?>"/>
                                                        </div>
                                                    </div>
                                                    

                                                <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Aktif</label>
                                                            <select class="form-control" name="aktif<?php echo $id;?>" id="edit_aktif<?php echo $id;?>">
                                                                <option value="">-- Please select --</option>
                                                                <option value="1" <?php if ($aktif=='1') {echo "selected";}?>>Aktif</option>
                                                                <option value="0" <?php if ($aktif=='0') {echo "selected";}?>>Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                           <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" placeholder="Username" name="username" id="edit_username" value="<?php echo $username;?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" id="edit_password" value="<?php echo $password;?>"/>
                                                        </div>
                                                    </div>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" onclick="UpdateHiddenField(<?php echo $id;?>)">Edit</button>
                                            </div>
                                        </form>
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
      var vtempatlahir = document.getElementById('add_tempat_lahir').value;
      var vtanggallahir = document.getElementById('add_tanggal_lahir').value;
      var valamat = document.getElementById('add_alamat').value;
      var vjabatan = document.getElementById('add_jabatan').value;
      var vnohp = document.getElementById('add_no_hp').value;

      if(vnamapegawai=="") {
        alert("Nama pegawai tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Tempat tanggal lahir tidak boleh kosong");
        return null;
    }
    if(vtanggallahir=="") {
        alert("Tanggal lahir tidak boleh kosong");
        return null;
    }
    if(valamat=="") {
        alert("Alamat tidak boleh kosong");
        return null;
    }
    if(jabatan=="") {
        alert("Jabatan tidak boleh kosong");
        return null;
    }
    if(nohp=="") {
        alert("No Hp tidak boleh kosong");
        return null;
    }

    form.submit();
}

function UpdateHiddenField(id){
  var status = document.getElementById('edit_status'+id).value;
  var aktif = document.getElementById('edit_aktif'+id).value;
  document.getElementById('hdstatus'+id).value = status;
  document.getElementById('hdaktif'+id).value = aktif;
}
function CheckFormEdit(){
  var vnamapegawai = document.getElementById('edit_nama').value;
  var vtempatlahir = document.getElementById('edit_tempat_lahir').value;
  var vtanggallahir = document.getElementById('edit_tanggal_lahir').value;
  var valamat = document.getElementById('edit_alamat').value;
  var jabatan = document.getElementById('edit_jabatan').value;
  var nohp = document.getElementById('edit_no_hp').value;

   if(vnamapegawai=="") {
        alert("Nama pegawai tidak boleh kosong");
        return null;
    }
    if(vtempatlahir=="") {
        alert("Tempat tanggal lahir tidak boleh kosong");
        return null;
    }
    if(vtanggallahir=="") {
        alert("Tanggal lahir tidak boleh kosong");
        return null;
    }
    if(valamat=="") {
        alert("Alamat tidak boleh kosong");
        return null;
    }
    if(jabatan=="") {
        alert("Jabatan tidak boleh kosong");
        return null;
    }
    if(nohp=="") {
        alert("No Hp tidak boleh kosong");
        return null;
    }

form.submit();
}

function checkSelect(){
    var e = document.getElementById("edit_status").value;
    alert(e);
}


function ClearEndDate(){
  document.getElementById('add_end_date').value = "";
  document.getElementById('edit_end_date').value = "";
}


</script>
</body>

</html>
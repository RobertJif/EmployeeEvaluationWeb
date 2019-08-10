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
                                        PERIODE KRITERIA
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
                                                    <h4 class="modal-title" id="defaultModalLabel">Tambah Periode</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/simpan_periode'?>">
                                                    <input type="hidden" value="<?php echo date("Y-m-d")?>" name="create_date">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Deskripsi</label>
                                                            <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" id="add_deskripsi" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Mulai Penilaian</label>
                                                            <input type="date" class="form-control" name="start_date" id="add_start_date" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Berakhir Penilaian</label>
                                                            <input type="date" class="form-control" name="end_date" id="add_end_date" />
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
                                                <td>No.</td>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Berakhir</th>
                                                <th>Diinput Oleh</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         foreach($data->result_array() as $is => $i):
                                          $id=$i['id'];
                                          $deskripsi=$i['deskripsi'];
                                          $start_date=$i['start_date'];
                                          $start_date=date('Y-m-d', strtotime($start_date));
                                          $end_date=$i['end_date'];
                                          $end_date=date('Y-m-d', strtotime($end_date));
                                          $nama=$i['nama'];
                                          $today = date("Y-m-d");
                                          ?>
                                          <tr>
                                            <td><?php echo $is+1;?></td>
                                            <td><?php echo $deskripsi;?></td>
                                            <td><?php echo $start_date;?></td>
                                            <td><?php echo $end_date;?></td>
                                            <td><?php echo $nama;?></td>
                                            <td>
                                              <?php 
                                              if($stats=='Admin'){
                                              ?>

                                                <button type="button" class="btn bg-orange waves-effect" data-toggle="modal" data-target="#defaultModal1<?php echo $id; ?>">
                                                <i class="material-icons">border_color</i>
                                                <span>Edit</span>
                                            </button>
                                                  <button type="button" class="btn bg-red waves-effect" onclick="deleteKriteria(<?php echo $id; ?>)">
                                                <i class="material-icons">border_color</i>
                                                <span>Delete</span>
                                            </button>
                                                <?php } ?>
                                        </td>
                                        </tr>

                                         <!-- Default Size -->
                            <div class="modal fade" id="defaultModal1<?php echo $id; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Update Periode</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  method="post" action="<?php echo base_url().'index.php/pegawaicontroller/edit_periode'?>">

                                                   <input type="hidden"  name="id" value="<?php echo $id;?>">
                                                 <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Deskripsi</label>
                                                            <input type="text" class="form-control" placeholder="Deskripsi" value="<?php echo $deskripsi;?>" name="deskripsi" id="edit_deskripsi" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Mulai Penilaian</label>
                                                            <input type="date" class="form-control" value="<?php echo $start_date;?>" name="start_date" id="edit_start_date" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Tanggal Berakhir Penilaian</label>
                                                            <input type="date" class="form-control" value="<?php echo $end_date;?>" name="end_date" id="edit_end_date" />
                                                        </div>
                                                    </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" onclick="CheckFormEdit(); return false">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
    
                                    <?php 
                                
                                    endforeach;?>
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

      var add_start_date = document.getElementById('add_start_date').value;
      var add_end_date = document.getElementById('add_end_date').value;
      var add_deskripsi = document.getElementById('add_deskripsi').value;

       if(add_deskripsi=="") {
            alert("Deskripsi tidak boleh kosong");
            return null;
        }
        if(add_start_date=="") {
            alert("Tanggal mulai tidak boleh kosong");
            return null;
        }
        if(add_end_date=="") {
            alert("Tanggal akhir tidak boleh kosong");
            return null;
        }
        

    form.submit();
}

function CheckFormEdit(){
  var edit_start_date = document.getElementById('edit_start_date').value;
  var edit_end_date = document.getElementById('edit_end_date').value;
  var edit_deskripsi = document.getElementById('edit_deskripsi').value;

   if(edit_deskripsi=="") {
            alert("Deskripsi tidak boleh kosong");
        return null;
    }
    if(edit_start_date=="") {
            alert("Tanggal mulai tidak boleh kosong");
        return null;
    }
    if(edit_end_date=="") {
            alert("Tanggal akhir tidak boleh kosong");
        return null;
    }

form.submit();
}

function viewKriteria(id){
        window.location ="<?php echo site_url('pegawaicontroller/v_datakriteria/'); ?>"+id;
    }
function deleteKriteria(id){
        var r = confirm("Are you sure want to delete the data ?");
    if (r == true) {
      
        window.location ="<?php echo site_url('pegawaicontroller/hapus_periode/'); ?>"+id;
      } else {
      }
    }

</script>


</body>

</html>
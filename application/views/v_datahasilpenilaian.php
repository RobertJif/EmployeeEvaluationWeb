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
                                        HASIL PENILAIAN
                                    </h2>
                                    <br>
                              
                           
                            <div class="body">

                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                        <thead>

                                            <tr>
                                                <td>No.</td>
                                                <th>Nama Pegawai</th>
                                                <th>ID Pegawai</th>
                                                <th>Periode</th>
                                                <th>Nilai Akhir</th>
                                                <th>Kategori</th>
                                                <th>Hasil Penilaian</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         foreach($data->result_array() as $is => $i):
                                          $nama=$i['nama'];
                                          $id_pegawai=$i['id_pegawai'];
                                          $id_periode=$i['id_periode'];
                                          $nilaiakhir=$i['nilaiakhir'];
                                          $kategori=$i['kategori'];
                                          $hasilpenilaian=$i['hasilpenilaian'];
                                          ?>
                                          <tr>
                                            <td><?php echo $is+1;?></td>
                                            <td><?php echo $nama;?></td>
                                            <td><?php echo $id_pegawai;?></td>
                                            <td><?php echo $id_periode;?></td>
                                            <td><?php echo $nilaiakhir;?></td>
                                            <td><?php echo $kategori;?></td>
                                            <td><?php echo $hasilpenilaian;?></td>
                                        </tr>

    
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
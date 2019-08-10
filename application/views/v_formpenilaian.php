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
                                        FORM PENILAIAN
                                    </h2>
                                    <br>
                   

                
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
                                                <div class="modal-footer">

                                                    <button type="submit" class="btn btn-primary" onclick="CheckForm(); return false">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                          <form method="post" action="<?php echo base_url().'index.php/pegawaicontroller/simpan_penilaian'?>">
                           <input type="hidden" name="id_periode" value="<?php echo $id_periode;?>">
                           <input type="hidden" name="id_penilai" value="<?php echo $id_login;?>">
                           <input type="hidden" name="id_dinilai" value="<?php echo $id_dinilai;?>">
                            <div class="body">

                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                        <thead>

                                            <tr>
                                              <th>No.</th>
                                                <th>Kriteria</th>
                                                <th>Sub Kriteria</th>
                                                <th width="5%">Istimewa(5)</th>
                                                <th width="5%">Terpuji(4)</th>
                                                <th width="5%">Baik(3)</th>
                                                <th width="5%">Cukup(2)</th>
                                                <th width="5%">Buruk(1)</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                         <?php
                                         $temp = "";
                                         $krnum = 0;
                                         $skrnum = 0;
                                         foreach($data->result_array() as $is => $i):
                                          $id_kriteria=$i['id_kriteria'];
                                          $id_subkriteria=$i['id_subkriteria'];
                                          $kriteria=$i['kriteria'];
                                          $skrnum += 1;
                                          if($temp==$kriteria){
                                            $kriteria="";
                                          }
                                          else{
                                             $krnum += 1;
                                          }
                                          $temp = $i['kriteria'];
                                          $subkriteria=$i['subkriteria'];
                                          ?>
                                          <tr>
                                            <td><?php echo $skrnum?></td>
                                            <input type="hidden" id="checker<?php echo $skrnum?>" value="0">
                                            <input type="hidden" name="hdkr<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" value="<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>">
                                            <input type="hidden" name="hdskr<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" value="<?php echo $id_subkriteria;?>">
                                            <td style="display: none"><?php echo $is;?></td>
                                            <td><?php echo $kriteria;?></td>
                                            <td><?php echo $subkriteria;?></td>
                                           <td>  <input onclick="checker('<?php echo $skrnum?>')" type="radio" name="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" id="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_5" class="radio-col-cyan" value="5"><label for="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_5"></label></td>
                                          <td>    <input onclick="checker('<?php echo $skrnum?>')"  type="radio" name="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" id="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_4" class="radio-col-cyan" value="4"><label for="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_4"></label></td>
                                            <td>  <input onclick="checker('<?php echo $skrnum?>')"  type="radio" name="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" id="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_3" class="radio-col-cyan" value="3"><label for="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_3"></label></td>
                                          <td>    <input onclick="checker('<?php echo $skrnum?>')"  type="radio" name="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" id="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_2" class="radio-col-cyan" value="2"><label for="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_2"></label></td>
                                          <td>    <input onclick="checker('<?php echo $skrnum?>')"  type="radio" name="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>" id="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_1" class="radio-col-cyan" value="1"><label for="cb<?php echo $id_kriteria;?>_<?php echo $id_subkriteria;?>_1"></label></td>
                                        </tr>

                                    <?php endforeach;?>
                                    <tr><td colspan="6"></td>
                                        <td>
                           <input type="hidden" name="count_kriteria" value="<?php echo $krnum;?>">
                           <input type="hidden" name="count_subkriteria" value="<?php echo $skrnum;?>" id="count_subkriteria">
                                                    <button type="submit" class="btn btn-primary" onclick="CheckForm(); return false;">Submit</button></td></tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

           </form>
                </div>

            </div>

        </div>
        <!-- #END# Exportable Table -->

    </div>
</section>
   <?php include 'include/foot.php';?>
<script type="text/javascript">
    function CheckForm(){
    var skr = parseInt(document.getElementById('count_subkriteria').value);
    var checker = 0;
    for (var i = 1; i <= skr; i++) {
          checker = parseInt(document.getElementById('checker'+i).value);
          if (checker<1) {
            alert("Pertanyaan nomor "+i+" belum diisi.");
            return null;
          }
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

function checker(id){
  document.getElementById('checker'+id).value = 1;

}
function viewSubKriteria(id){
        window.location ="<?php echo site_url('pegawaicontroller/v_datasub_kriteria/'); ?>"+id;
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
 <!-- Menu -->
 <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo site_url('logincontroller/v_dashboard');?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('logincontroller/v_informasi');?>">
                            <i class="material-icons">view_list</i>
                            <span>Informasi</span>
                        </a>
                    </li>
                  <?php 
                  $id_login = $this->session->userdata('id');
                  $stats = $this->session->userdata('status');
                  if($stats=='Admin' || $stats=='Kepala Cabang'){
                  ?>
                    <li>
                        <a href="<?php echo site_url('pegawaicontroller/v_datapegawai');?>">
                            <i class="material-icons">view_list</i>
                            <span>Data Pegawai</span>
                        </a>
                        </li>
                    <?php } ?>

                  <?php 
                  if($stats=='Admin'){
                  ?>
                        <li>
                        <a href="<?php echo site_url('pegawaicontroller/v_dataperiode');?>">
                            <i class="material-icons">view_list</i>
                            <span>Data Periode</span>
                        </a>
                        </li>
                    <?php } ?>
                   <?php 
                  if($stats!='Admin'){
                  ?>
                        <li>
                        <a href="<?php echo site_url('pegawaicontroller/v_penilaian');?>">
                            <i class="material-icons">view_list</i>
                            <span>Penilaian</span>
                        </a>
                        </li>
                    <?php } ?>
                                   <?php 
                  if($stats=='Admin'){
                  ?>
                        <li>
                        <a href="<?php echo site_url('pegawaicontroller/v_datakriteria');?>">
                            <i class="material-icons">view_list</i>
                            <span>Data Kriteria</span>
                        </a>
                        </li>
                    <?php } ?>
                  <?php 
                  if($stats=='Admin' || $stats=='Kepala Cabang'){
                  ?>
                    <li>
                        <a href="<?php echo site_url('pegawaicontroller/v_dataperiodepenilaian');?>">
                            <i class="material-icons">view_list</i>
                            <span>Data Hasil Penilaian</span>
                        </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
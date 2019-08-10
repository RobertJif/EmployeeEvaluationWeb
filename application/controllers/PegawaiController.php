<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('pegawai_model');
		$this->load->helper('form');
 
	}
 	//----------------------------------------PEGAWAI----------------------------------------//
	function v_datapegawai(){
		$x['data']=$this->pegawai_model->show_pegawai();
		$this->load->view('v_datapegawai', $x);
	}

	function simpan_pegawai(){
		$nama=$this->input->post('nama');
		$tempat_lahir= $this->input->post('tempat_lahir');
		$tanggal_lahir=$this->input->post('tanggal_lahir');
		$tanggal_lahir=date('Y-m-d', strtotime($tanggal_lahir));
		$alamat=$this->input->post('alamat');
		$jabatan=$this->input->post('jabatan');
		$status=$this->input->post('status');
		$aktif=$this->input->post('aktif');
		$no_hp=$this->input->post('no_hp');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->pegawai_model->simpan_pegawai($nama,$tempat_lahir,$tanggal_lahir,$alamat,$jabatan,$status,$aktif,$no_hp,$username,$password);
		redirect('pegawaicontroller/v_datapegawai');

	}

	function edit_pegawai(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$tempat_lahir= $this->input->post('tempat_lahir');
		$tanggal_lahir=$this->input->post('tanggal_lahir');
		$tanggal_lahir=date('Y-m-d', strtotime($tanggal_lahir));
		$alamat=$this->input->post('alamat');
		$jabatan=$this->input->post('jabatan');
		$status=$this->input->post('hdstatus');
		$aktif=$this->input->post('hdaktif');
		$no_hp=$this->input->post('no_hp');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->pegawai_model->edit_pegawai($id,$nama,$tempat_lahir,$tanggal_lahir,$alamat,$jabatan,$status,$aktif,$no_hp,$username,$password);
		redirect('pegawaicontroller/v_datapegawai');
			
	}
 
 	//----------------------------------------PERIODE----------------------------------------//
 	function v_dataperiode(){
		$x['data']=$this->pegawai_model->show_periode();
		$this->load->view('v_dataperiode', $x);
	}
	 function v_dataperiodepenilaian(){
		$x['data']=$this->pegawai_model->show_periode();
		$this->load->view('v_dataperiodepenilaian', $x);
	}
	function simpan_periode(){
		$deskripsi=$this->input->post('deskripsi');
		$start_date= $this->input->post('start_date');
		$start_date=date('Y-m-d', strtotime($start_date));
		$end_date=$this->input->post('end_date');
		$end_date=date('Y-m-d', strtotime($end_date));
		
		$create_date= $this->input->post('create_date');
		$create_date=date('Y-m-d', strtotime($create_date));
		$created_by = $this->session->userdata('id');
		$this->pegawai_model->simpan_periode($deskripsi,$start_date,$end_date,$create_date,$created_by);
		redirect('pegawaicontroller/v_dataperiode');
	}
	
	function edit_periode(){
		$id=$this->input->post('id');
		$deskripsi=$this->input->post('deskripsi');
		$start_date= $this->input->post('start_date');
		$start_date=date('Y-m-d', strtotime($start_date));
		$end_date=$this->input->post('end_date');
		$end_date=date('Y-m-d', strtotime($end_date));
		$create_date=date('Y-m-d', strtotime($create_date));
		$this->pegawai_model->edit_periode($id,$deskripsi,$start_date,$end_date);
		redirect('pegawaicontroller/v_dataperiode');
			
	}

 	//----------------------------------------KRITERIA----------------------------------------//
	function v_datakriteria(){
		$x['data']=$this->pegawai_model->show_kriteria();
		$this->load->view('v_datakriteria', $x);
	}

	function simpan_kriteria(){
		$nama=$this->input->post('nama');
		$deskripsi= $this->input->post('deskripsi');
		$bobot1=$this->input->post('bobot1');
		$bobot2=$this->input->post('bobot2');
		$bobot3=$this->input->post('bobot3');
		$this->pegawai_model->simpan_kriteria($nama,$deskripsi,$bobot1,$bobot2,$bobot3);
		redirect('pegawaicontroller/v_datakriteria');

	}
	
	function edit_kriteria(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$deskripsi= $this->input->post('deskripsi');
		$bobot1=$this->input->post('bobot1');
		$bobot2=$this->input->post('bobot2');
		$bobot3=$this->input->post('bobot3');
		$this->pegawai_model->edit_kriteria($id,$nama,$deskripsi,$bobot1,$bobot2,$bobot3);
		redirect('pegawaicontroller/v_datakriteria');
			
	}

 	//----------------------------------------SUB KRITERIA----------------------------------------//
	function v_datasub_kriteria($id_kriteria,$status=0){

		if (strlen($status)<2) {
			$status=$this->input->post('hdstatus');
		}

		$x['data']=$this->pegawai_model->show_sub_kriteria($id_kriteria,$status);
		$x['id_kriteria'] = $id_kriteria;
		$x['status'] = $status;
		$this->load->view('v_datasub_kriteria', $x);
	}

	function simpan_sub_kriteria(){
		$nama=$this->input->post('nama');
		$deskripsi= $this->input->post('deskripsi');
		$id_kriteria=$this->input->post('id_kriteria');
		$status=$this->input->post('status');
		$this->pegawai_model->simpan_sub_kriteria($nama,$deskripsi,$id_kriteria,$status);
		redirect('pegawaicontroller/v_datasub_kriteria/'.$id_kriteria."/".$status);

	}
	
	function edit_sub_kriteria(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$deskripsi= $this->input->post('deskripsi');
		$id_kriteria=$this->input->post('id_kriteria');
		$status=$this->input->post('status');
		$this->pegawai_model->edit_sub_kriteria($id,$nama,$deskripsi,$id_kriteria);
		redirect('pegawaicontroller/v_datasub_kriteria/'.$id_kriteria."/".$status);
			
	}
	function hapus_periode($id){
		$this->pegawai_model->hapus_data($id,"periode");
		redirect('pegawaicontroller/v_dataperiode');

	}

	function hapus_kriteria($id,$id_kriteria){
		$this->pegawai_model->hapus_data($id,"kriteria");
		redirect('pegawaicontroller/v_datakriteria/'.$id_kriteria);

	}

	function hapus_sub_kriteria($id,$id_kriteria,$status){
		$this->pegawai_model->hapus_data($id,"sub_kriteria");
		redirect('pegawaicontroller/v_datasub_kriteria/'.$id_kriteria."/".$status);

	}

	 	//----------------------------------------Penilaian----------------------------------------//
	function v_datahasilpenilaian($id_periode){
		$x['data']=$this->pegawai_model->view_penilaian3($id_periode);
		$this->load->view('v_datahasilpenilaian', $x);
	}


	
	function edit_penilaian(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$deskripsi= $this->input->post('deskripsi');
		$id_periode=$this->input->post('id_periode');
		$this->pegawai_model->edit_kriteria($id,$nama,$deskripsi,$id_periode);
		redirect('pegawaicontroller/v_datakriteria/'.$id_periode);
			
	}

	 function v_penilaian(){
		$x['data']=$this->pegawai_model->show_periode();
		$this->load->view('v_penilaian', $x);
	}
	
	function v_formpenilaian($id_periode,$id_dinilai){
		$status_dinilai = $this->pegawai_model->get_user_status($id_dinilai);
		$x['data']=$this->pegawai_model->show_kriteria_penilaian($status_dinilai);
		$x['id_periode'] = $id_periode;
		$x['id_dinilai'] = $id_dinilai;
		//echo $x['id_kriteria'];
		$this->load->view('v_formpenilaian', $x);
	}
	
	function v_penilaianpegawai($id_periode){
		$id_login = $this->session->userdata('id');
		$x['data']=$this->pegawai_model->show_pegawai_penilaian($id_login,$id_periode);
		$x['id_periode'] = $id_periode;
		$this->load->view('v_penilaianpegawai', $x);
	}
	
	function simpan_penilaian(){

		//Penilaian Stage 1
		$id_periode=$this->input->post('id_periode');
		$id_penilai= $this->input->post('id_penilai');
		$id_dinilai=$this->input->post('id_dinilai');
		$count_kriteria= $this->input->post('count_kriteria');
		$count_subkriteria=$this->input->post('count_subkriteria');
		$status_loop =  $this->pegawai_model->get_user_status($id_dinilai);
		$data=$this->pegawai_model->show_kriteria_penilaian($status_loop);
		$totalnilaisubkriteria = 0;
		$jumlahsubkriteria = $count_subkriteria;



		$jumlahkriteria = $count_kriteria;
		foreach($data->result_array() as $is => $i){
        $id_kriteria=$i['id_kriteria'];
        $id_subkriteria=$i['id_subkriteria'];
        
        
        $bobot1=$i['bobot1'];
        $bobot2=$i['bobot2'];
        $bobot3=$i['bobot3'];

		$status_penilai = $this->pegawai_model->get_user_status($id_penilai);
		$status_dinilai = $this->pegawai_model->get_user_status($id_dinilai);
		$score = $this->input->post('cb'.$id_kriteria.'_'.$id_subkriteria);
		$totalnilaisubkriteria += $score;

        $count=$this->pegawai_model->show_sub_kriteria($id_kriteria,$status_penilai);
		$count_subkriteria=$count->num_rows();           

		$this->pegawai_model->simpan_penilaian($id_periode,$id_kriteria,$id_subkriteria,$id_penilai,$id_dinilai,$status_penilai,$status_dinilai,$count_kriteria,$count_subkriteria,$bobot1,$bobot2,$bobot3,$score);
		}

		//Penilaian Stage 2

		$this->pegawai_model->simpan_penilaian2($id_periode,$id_penilai,$id_dinilai);


		redirect('pegawaicontroller/v_penilaianpegawai/'.$id_periode);

	}
}
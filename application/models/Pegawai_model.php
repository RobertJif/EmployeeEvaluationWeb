<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model{

	function show_pegawai(){
		$hasil=$this->db->query("SELECT * FROM pegawai");
		return $hasil;
	}

	function simpan_pegawai($nama,$tempat_lahir,$tanggal_lahir,$alamat,$jabatan,$status,$aktif,$no_hp,$username,$password){
		$hasil=$this->db->query("INSERT INTO pegawai VALUES ('','$nama','$tempat_lahir','$tanggal_lahir', '$alamat', '$jabatan', '$status', '$aktif', '$no_hp', '$username', '$password')");
		return $hasil;
	}

	function edit_pegawai($id,$nama,$tempat_lahir,$tanggal_lahir,$alamat,$jabatan,$status,$aktif,$no_hp,$username,$password){
		$hasil=$this->db->query("UPDATE pegawai SET nama='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',jabatan='$jabatan',no_hp='$no_hp',status='$status',aktif='$aktif',username='$username',password='$password' WHERE id='$id'");
		return $hasil;
	}
	
	function show_periode(){
	$hasil=$this->db->query("SELECT a.*,b.nama FROM periode a left join pegawai b on a.created_by=b.id");
	return $hasil;
	}

	function simpan_periode($deskripsi,$start_date,$end_date,$create_date,$created_by){
		$hasil=$this->db->query("INSERT INTO periode VALUES ('','$deskripsi','$start_date','$end_date', '$create_date', '$created_by')");
		return $hasil;
	}

	function edit_periode($id,$deskripsi,$start_date,$end_date){
		$hasil=$this->db->query("UPDATE periode SET deskripsi='$deskripsi',start_date='$start_date',end_date='$end_date' WHERE id='$id'");
		return $hasil;
	}

	function show_kriteria(){
	$hasil=$this->db->query("SELECT * FROM kriteria");
	return $hasil;
	}

	function simpan_kriteria($nama,$deskripsi,$bobot1,$bobot2,$bobot3){
		$hasil=$this->db->query("INSERT INTO kriteria VALUES ('','$nama','$deskripsi','$bobot1', '$bobot2','$bobot3')");
		return $hasil;
	}

	function edit_kriteria($id,$nama,$deskripsi,$bobot1,$bobot2,$bobot3){
		$hasil=$this->db->query("UPDATE kriteria SET deskripsi='$deskripsi',nama='$nama',bobot1='$bobot1',bobot2='$bobot2',bobot3='$bobot3' WHERE id='$id'");
		return $hasil;
	}

	function show_sub_kriteria($id_kriteria,$status){
	$hasil=$this->db->query("SELECT * FROM sub_kriteria where id_kriteria='$id_kriteria' and status='$status'");
	return $hasil;
	}

	function simpan_sub_kriteria($nama,$deskripsi,$id_kriteria,$status){
		$hasil=$this->db->query("INSERT INTO sub_kriteria VALUES ('','$nama','$deskripsi', '$id_kriteria', '$status')");
		return $hasil;
	}

	function edit_sub_kriteria($id,$nama,$deskripsi,$id_kriteria){
		$hasil=$this->db->query("UPDATE sub_kriteria SET deskripsi='$deskripsi',nama='$nama',id_kriteria='$id_kriteria' WHERE id='$id'");
		return $hasil;
	}

	function hapus_data($id,$tb_name){
	$hasil=$this->db->query("DELETE FROM ".$tb_name." where id='$id'");
	return $hasil;
	}

	function show_penilaian($id_periode){
	$hasil=$this->db->query("SELECT * FROM kriteria where id_periode='$id_periode'");
	return $hasil;
	}

	function simpan_penilaian($id_periode,$id_kriteria,$id_subkriteria,$id_penilai,$id_dinilai,$status_penilai,$status_dinilai,$count_kriteria,$count_subkriteria,$bobot1,$bobot2,$bobot3,$score){
		$hasil=$this->db->query("INSERT INTO penilaian VALUES ('','$id_periode','$id_kriteria','$id_subkriteria','$id_penilai','$id_dinilai','$status_penilai','$status_dinilai','$count_kriteria','$count_subkriteria','$bobot1','$bobot2','$bobot3','$score')");
		return $hasil;
	}

	function edit_penilaian($id,$nama,$deskripsi,$id_periode){
		$hasil=$this->db->query("UPDATE kriteria SET deskripsi='$deskripsi',nama='$nama' WHERE id='$id'");
		return $hasil;
	}
		function show_kriteria_penilaian($status_dinilai){
	$hasil=$this->db->query("select b.id 'id_kriteria',a.id 'id_subkriteria',b.nama 'kriteria',a.nama 'subkriteria',b.bobot1,b.bobot2,b.bobot3 from sub_kriteria a left join kriteria b on a.id_kriteria=b.id where a.status='$status_dinilai' order by b.id");
	return $hasil;
	}
		function show_pegawai_penilaian($id_login,$id_periode){
		$hasil=$this->db->query("SELECT * FROM pegawai where id!=$id_login and id not in (select distinct id_dinilai from penilaian where id_periode=$id_periode and id_penilai=$id_login) and status!='Admin'");
		return $hasil;
	}
	function get_user_status($id){
	    $this->db->select('status');
	    $this->db->from('pegawai');
	    $this->db->where('id',$id);
	   return $this->db->get()->row()->status;
	}
	function simpan_penilaian2($id_periode,$id_penilai,$id_dinilai){
		$hasil=$this->db->query("INSERT into penilaian2(nilaiakhir,id_dinilai,id_penilai,id_periode,iscal) select sum(nilaiakhir) nilaiakhir,id_dinilai,id_penilai,id_periode,iscal from (SELECT id_dinilai,id_penilai,id_periode,id_kriteria,(sum(score)/(count_kriteria*count_subkriteria))*(case when status_dinilai='Kepala Cabang' then bobot1 when status_dinilai='Kepala Departemen' then bobot2 else bobot3 end) nilaiakhir,(case when (avg(score)*100) >=175 then 1 else 0 end) 'iscal' from penilaian where id_periode='$id_periode' and id_penilai='$id_penilai' and id_dinilai='$id_dinilai' GROUP by id_kriteria ) calkriteria");
		return $hasil;
	}

	function view_penilaian3($id_periode){
		$hasil=$this->db->query("SELECT *, (case when nilaiakhir>=80 then 'Sangat Baik' when nilaiakhir >=60 then 'Baik' when nilaiakhir >= 40 then 'Sedang' when nilaiakhir >= 20 then 'Cukup' else 'Sangat Buruk' end) kategori, (case when nilaiakhir >= 41 then 'Lanjut Kontrak' else 'Tunggu' end) hasilpenilaian from (select (select nama from pegawai where id=id_dinilai) nama, id_dinilai id_pegawai,id_periode,sum(nilaiakhir)/count(*) nilaiakhir from penilaian2 where iscal='1' and id_periode='$id_periode' group by id_dinilai) penilaian3");
		return $hasil;
	
}	
}
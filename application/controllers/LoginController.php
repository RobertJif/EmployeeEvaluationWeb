<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}

	function v_dashboard()
	{
		$this->load->view('v_dashboard');
	}
 
	function v_informasi()
	{
		$this->load->view('v_informasi');
	}
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->login_model->prosesLogin($username,$password);
		$hasil = count($cek);

		if($hasil > 0){
			$select = $this->db->get_where('pegawai', array('username' => $username, 'password' => $password))->row();

			$data = array ('logged_in' => true,
			'id' => $select->id,
			'username' => $select->username,
			'status' => $select->status,
			'nama' => $select->nama,
			'jabatan' => $select->jabatan);
			$this->session->set_userdata($data);

			$this->load->view('v_dashboard');
		}
	else
		{
			$this->session->set_flashdata('err','username dan password salah');
	redirect('logincontroller/index');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->load->view('v_login');
	  }
}
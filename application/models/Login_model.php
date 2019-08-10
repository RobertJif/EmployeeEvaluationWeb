<?php

    class Login_model extends CI_Model{	
        public function __construct()
        {
            parent::__construct();
        }
       
        public function prosesLogin($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $this->db->where('aktif','1');
            return $this->db->get('pegawai')->row();

        }

   
 
}
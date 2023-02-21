<?php

class auth_model extends CI_Model {

 
        public function get_petugas_by_username($username) {
            return $this->db->get_where('petugas', ['username' => $username])->row_array();
        }
     
        public function get_masyarakat_by_username($username) {
            return $this->db->get_where('masyarakat', ['username' => $username])->row_array();
        }
     
}

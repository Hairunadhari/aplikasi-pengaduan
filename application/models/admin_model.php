<?php

class admin_model extends CI_Model {

    public function get_all_pengaduan()
    {
        $this->db->select('masyarakat.name, pengaduan.id, pengaduan.tgl_pengaduan, pengaduan.isi_laporan, pengaduan.foto, pengaduan.status');
        $this->db->from('masyarakat');  
        $this->db->join('pengaduan','masyarakat.masyarakat_id = pengaduan.id_masyarakat','right');  
        return $this->db->get()->result_array();
    }
    public function ambil_id_pengaduan($id)
    {
        $this->db->select('masyarakat.masyarakat_id, masyarakat.name, pengaduan.id, pengaduan.isi_laporan, pengaduan.foto, pengaduan.status');
        $this->db->from('masyarakat');  
        $this->db->join('pengaduan','masyarakat.masyarakat_id = pengaduan.id_masyarakat','right');  
        $this->db->where('pengaduan.id', $id);  
        return $this->db->get()->row_array();
    }

    function get_file_foto($id){
        $this->db->select('foto');
        $this->db->from('pengaduan');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
      }
    
     
}
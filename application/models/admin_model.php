<?php

class admin_model extends CI_Model {

    public function get_all_pengaduan()
    {
        $this->db->select('masyarakat.name, pengaduan.id, pengaduan.tgl_pengaduan, pengaduan.isi_laporan, pengaduan.foto, pengaduan.status');
        $this->db->from('masyarakat');  
        $this->db->join('pengaduan','masyarakat.masyarakat_id = pengaduan.id_masyarakat','right');  
        return $this->db->get()->result_array();
    }
   
    
    function get_file_foto($id){
        $this->db->select('foto');
        $this->db->from('pengaduan');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
    
    public function ubah_status_proses_pengaduan($where, $data_status){
        // var_dump($where);
        // die;
        $this->db->where('id',$where);
        $this->db->update('pengaduan', $data_status);
    }
    public function ambil_id_pengaduan($id)
    {
        $this->db->select('masyarakat.masyarakat_id, masyarakat.name, pengaduan.id, pengaduan.isi_laporan, pengaduan.foto, pengaduan.status');
        $this->db->from('masyarakat');  
        $this->db->join('pengaduan','masyarakat.masyarakat_id = pengaduan.id_masyarakat','right');  
        $this->db->where('pengaduan.id', $id);  
        return $this->db->get()->row_array();
    }
    public function ambil_id_akun($id)
    {
        $this->db->select('*');
        $this->db->from('petugas');  
        $this->db->where('petugas_id', $id);  
        return $this->db->get()->row_array();
    }

    public function get_akun()
    {
        $this->db->select('*');
        $this->db->from('petugas');  
        return $this->db->get()->result_array();
    }    
    public function get_role()
    {
        $this->db->select('*');
        $this->db->from('role');  
        return $this->db->get()->result_array();
    }    
}

<?php

class M_masyarakat extends CI_Model{

    public function tambahMasyarakat($data){
       return $this->db->insert('masyarakat',$data);
    }

    public function login($data){
        $this->db->select('nik,nama');
        $this->db->from('masyarakat');
        $this->db->where($data);
        $query=$this->db->get();
        return $query->result_array();
    }
}
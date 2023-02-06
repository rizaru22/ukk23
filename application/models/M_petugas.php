<?php

class M_petugas extends CI_Model
{
    public function login($data){
        $this->db->select('id_petugas,nama_petugas,level');
        $this->db->where($data);
        $query =$this->db->get('petugas');
        return $query->result_array();
    }

    

}
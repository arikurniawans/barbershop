<?php

class Pembagian_model extends CI_Model
{

    public function createPembagian($data)
    {
        $bagi = $this->db->insert('bagi_hasil',$data);
        return $bagi;
    }

    public function showPembagian()
    {
        $this->db->order_by('id_bagi','DESC');  
        $query = $this->db->get('bagi_hasil');     
        return $query;
    }

    public function editPembagian($id,$data)
    {
        $this->db->where('id_bagi',$id);
        $this->db->update('bagi_hasil',$data);
        return true;
    }

}
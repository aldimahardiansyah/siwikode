<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {

    public function getAll($table){
        return $this->db->get($table)->result_array(); 
    }

    public function getId($table, $id){
        return $this->db->get_Where($table, ['id' => $id])->row();
    }

    public function save($table, $data){
        return $this->db->insert($table, $data);
    }

    public function query($query){
        return $this->db->query($query)->row();
    }

    public function gambar($query){
        return $this->db->query($query)->result_array();
    }
}
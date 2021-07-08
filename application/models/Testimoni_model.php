<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni_model extends CI_Model
{

    function tampil_data()
    {
        $query = $this->db->query('SELECT testimoni.`id`, testimoni.`foto`,testimoni.`nama`, komentar, rating, wisata.`nama` AS wisata, profesi.`nama` AS profesi FROM testimoni INNER JOIN wisata ON testimoni.`wisata_id` = wisata.`id` INNER JOIN profesi ON profesi.`id` = testimoni.`profesi_id`');
        return $query->result();
    }

    function tampil_id($id)
    {
        $query = $this->db->query('SELECT testimoni.`id`, testimoni.`foto`,testimoni.`nama`, komentar, rating, wisata.`nama` AS wisata, profesi.`nama` AS profesi FROM testimoni INNER JOIN wisata ON testimoni.`wisata_id` = wisata.`id` INNER JOIN profesi ON profesi.`id` = testimoni.`profesi_id` where testimoni.`id` =' . $id);
        return $query->row();
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('testimoni');
    }

    function query($query)
    {
        return $this->db->query($query);
    }

    public function save($data)
    {
        return $this->db->insert('testimoni', $data);
    }

    function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('testimoni', $data);
    }
}
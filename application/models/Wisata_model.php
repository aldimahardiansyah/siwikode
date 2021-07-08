<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{

    public function getAll($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function getId($table, $id)
    {
        return $this->db->get_Where($table, ['id' => $id])->row();
    }

    public function save($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function query($query)
    {
        return $this->db->query($query)->row();
    }

    public function unggulan()
    {
        return $this->db->query('SELECT * FROM wisata ORDER BY bintang DESC LIMIT 3;')->result();
    }

    public function gambar($query)
    {
        return $this->db->query($query)->result_array();
    }

    public function many_query($query)
    {
        return $this->db->query($query)->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('wisata');
    }

    public function delete_gambar($id)
    {
        $this->db->where('wisata_id', $id);
        $this->db->delete('gambar');
    }

    public function update($id, $table, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }
}
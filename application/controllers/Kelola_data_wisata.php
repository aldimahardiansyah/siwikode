<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_data_wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wisata_model');
    }
    function index()
    {
        $wisata = $this->wisata_model->many_query('SELECT wisata.`id`, wisata.`nama`, wisata.`bintang`, wisata.`kontak`, 
        jenis_wisata.`nama` AS jenis FROM wisata INNER JOIN jenis_wisata ON jenis_wisata.`id`=
        wisata.`jenis_wisata_id` ORDER BY wisata.`nama`;');
        $data = [
            'content' => 'content/kelola_data_wisata',
            'wisata' => $wisata
        ];
        $this->load->view('_partials/view', $data);
    }
    function delete($id)
    {
        $this->wisata_model->delete($id);
        redirect(base_url('index.php/kelola_data_wisata'));
    }
}
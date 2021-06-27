<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_data_wisata extends CI_Controller
{
    function index()
    {
        $data['content'] = 'content/kelola_data_wisata';
        $this->load->view('_partials/view', $data);
    }
}

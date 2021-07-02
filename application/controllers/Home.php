<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $model = $this->load->model('wisata_model');
        $unggulan = $this->wisata_model->unggulan();
        $data = [
            "content" => "content/home",
            "unggulan" => $unggulan,
            "model" => $model
        ];
        $this->load->view('_partials/view', $data);
    }
}
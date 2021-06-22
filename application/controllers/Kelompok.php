<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller{
    public function index(){
        $data = ["content" => 'content/kelompok'];
        $this->load->view('_partials/view', $data);
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuliner extends CI_Controller{
    public function index(){
        $data = ["content" => 'content/wisata-kuliner'];
        $this->load->view('_partials/view', $data);
    }
}
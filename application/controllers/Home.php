<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index(){
        $data = ["content" => "content/home"];
        $this->load->view('_partials/view', $data);
    }
}
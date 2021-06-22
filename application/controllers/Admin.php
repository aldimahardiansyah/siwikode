<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
    function index(){
        $data['content'] = 'content/admin';
        $this->load->view('_partials/view', $data);
    }
}
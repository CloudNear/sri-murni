<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller{

    public function index()
    {    $data['title'] = '404-Notfound';
        $this->load->view('Auth/templates/header', $data);
        $this->load->view('notfound');
        $this->load->view('Auth/templates/footer');
    }
}
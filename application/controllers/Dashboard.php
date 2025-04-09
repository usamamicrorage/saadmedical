<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->data['title'] = 'Dashboard';
        $this->data['content'] = 'dashboard';

        $this->load->view('index', $this->data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    # Dashboard Admin
    public function index()
    {
        check_not_login();
        $this->template->load('template','dashboard');

    }

    public function blank()
	{
		$this->load->view('404_page');
	}

    
}
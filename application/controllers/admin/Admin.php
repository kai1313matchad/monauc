<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
}
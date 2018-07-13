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
		// $this->authsys->master_check_($_SESSION['user_id'],'USR');
		// $data['title']='Lelang Billboard Match Advertising';
		// $data['menu']='Dashboard';
		// $data['menulist']='person';
		$data['content']='admin/dashboard';
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function users()
	{
		$data['content']='admin/user';
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function products()
	{
		$data['content']='admin/product';
		$this->load->view('admin/layout/wrapper',$data);
	}
}
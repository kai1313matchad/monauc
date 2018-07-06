<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
	public function index()
	{
		$this->load->view('user/login');
	}

	public function tes()
	{
		$data['tes'] = 'testing';
		$data['status'] = TRUE;
		echo json_encode($data);
	}

	public function loginauth_()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$res = $this->auth_->login($user,$pass);
		if ($res == '1')
		{
			$data['tes'] = 'Sukses Login'.$res.$pass;
			$data['status'] = TRUE;
		}
		else
		{
			$data['tes'] = 'Gagal Login'.$res.$pass;
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	public function logout_()
		{
			$this->auth_->logout();
		}
}
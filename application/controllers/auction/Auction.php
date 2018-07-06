<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auction extends CI_Controller
{
	public function index()
	{
		$this->load->view('auction/main');
	}

	public function aucdata()
	{
		$this->db->from('mona_aucgame a');
		$this->db->join('mona_product b','b.prod_id = a.prod_id');
		$this->db->get();
	}
}
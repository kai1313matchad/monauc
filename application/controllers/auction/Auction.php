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
		$this->db->where('a.aucg_id','AUC001');
		$que = $this->db->get();
		$data = $que->row();
		echo json_encode($data);
	}

	public function aucbid()
	{
		$id = (isset($_SESSION['user_id']))?$this->session->userdata('user_id'):'';
		$aucid = $this->input->post('aucid');
		if($id!='')
		{
			$ins = array(
						'user_id'=>$id,
						'aucg_id'
			);
		}
		else
		{
			$data['msg'] = 'Anda Tidak Bisa Melakukan Bid';
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	public function insbid($data)
	{
		$this->db->insert('mona_bidhistory',$data);
	}

	public function uplastbid($id,$data)
	{
		$this->db->update('mona_aucgame',$data,$id);
	}
}
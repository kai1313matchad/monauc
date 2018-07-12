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
		date_default_timezone_set('Asia/Jakarta');
		$id = (isset($_SESSION['user_id']))?$this->session->userdata('user_id'):'';
		$aucid = $this->input->post('auc_id');
		$bidnom = abs($this->input->post('auc_bidnom')+$this->input->post('auc_bid'));
		$bidtime = date('h:i:sa');
		if($id!='')
		{
			$ins = array(
						'user_id'=>$id,
						'aucg_id'=>$aucid,
						'bidh_nom'=>$bidnom,
						'bidh_time'=>$bidtime,
						'bidh_sts'=>'0'
			);
			$insert = $this->insbid($ins);
			$ups = array('last_bid'=>$bidnom);
			$update = $this->uplastbid(array('aucg_id'=>$aucid),$ups);
			$data['msg'] = 'Anda Berhasil Melakukan Bid';
			$data['sts'] = TRUE;
		}
		else
		{
			$data['msg'] = 'Anda Tidak Bisa Melakukan Bid';
			$data['status'] = FALSE;
		}
		echo json_encode($data);
	}

	public function aucbuyout()
	{
		date_default_timezone_set('Asia/Jakarta');
		$id = (isset($_SESSION['user_id']))?$this->session->userdata('user_id'):'';
		$aucid = $this->input->post('auc_id');
		$bidnom = abs($this->input->post('auc_bidnom')+$this->input->post('auc_bid'));
		$bidtime = date('h:i:sa');
		if($id!='')
		{
			$ins = array(
						'user_id'=>$id,
						'aucg_id'=>$aucid,
						'bidh_nom'=>$bidnom,
						'bidh_time'=>$bidtime,
						'bidh_sts'=>'1'
			);
			$insert = $this->insbid($ins);
			$ups = array('last_bid'=>$bidnom);
			$update = $this->uplastbid(array('aucg_id'=>$aucid),$ups);
			$data['msg'] = 'Anda Berhasil Melakukan Bid';
			$data['sts'] = TRUE;
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

	public function getlastbid()
	{
		$que = $this->db->get('mona_bidhistory');
		$row = $que->last_row();
		$data = $row;
		echo json_encode($data);
	}

	public function getbuyoutnom()
	{
		
	}
}
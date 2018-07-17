<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auction_ extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD/M_Gen','gen');
		$this->load->model('datatables/auction/Dtb_auctionall','auctall');
	}

	public function get_auctionall()
	{
		$list = $this->auctall->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$sts = ($dat->AUCG_DTSTS != '0')?'<a href="javascript:void(0)" title="Status Data" class="btn btn-sm btn-success btn-responsive" onclick="chgsts_auc('."'".$dat->AUCG_ID."'".')">Aktif</a>':'<a href="javascript:void(0)" title="Status Data" class="btn btn-sm btn-info btn-responsive" onclick="chgsts_auc('."'".$dat->AUCG_ID."'".')">Non-Aktif</a>';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->AUCG_ID;
			$row[] = $dat->PROD_ID.' - '.$dat->PROD_NAME;
			$row[] = $dat->AUCG_DATE;
			$row[] = 'OP : '.number_format($dat->AUCG_OPENPRICE).'<br />BO : '.number_format($dat->AUCG_BUYOUT);
			$row[] = $sts;
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_auc('."'".$dat->AUCG_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->auctall->count_all(),
						"recordsFiltered" => $this->auctall->count_filtered(),
						"data" => $data,
		);			
		echo json_encode($output);
	}

	public function get_auctionrow($id)
	{
		$que = $this->db->get_where('mona_aucgame',array('aucg_id'=>$id));
		$data = $que->row();
		echo json_encode($data);
	}

	public function get_auctionmember($id)
	{
		$que = $this->db->get_where('mona_aucmember',array('aucg_id'=>$id));
		$data = $que->result();
		echo json_encode($data);
	}

	public function gen_auction()
	{
		$res = $this->gen->gen_number('aucg_id','mona_aucgame','AUC');
		$data['kode'] = $res;
		$data['status'] = TRUE;
		echo json_encode($data);
	}

	public function get_proddrop()
	{
		$que = $this->db->get_where('mona_product',array('prod_dtsts'=>'1'));
		$data = $que->result();
		echo json_encode($data);
	}

	public function get_userdrop()
	{
		$que = $this->db->get_where('mona_user',array('user_dtsts'=>'1'));
		$data = $que->result();
		echo json_encode($data);
	}

	public function save_auction()
	{
		$this->_validate_auction();
		if($this->input->post('form_status') == '1')
		{
			$ins = array(
				'aucg_id' => $this->input->post('auctionid'),
				'prod_id' => $this->input->post('auctionprod'),
				'aucg_date' => $this->input->post('auctiondate'),
				'aucg_openprice' => $this->input->post('auctionop'),
				'aucg_buyout' => $this->input->post('auctionbo'),
				'aucg_bid' => $this->input->post('auctionbid'),
				'aucg_lastbid' => '0',
				'aucg_dtsts' => '0'
			);
			$insert = $this->db->insert('mona_aucgame',$ins);			
			$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			$id = $this->input->post('auctionid');
			$member = $this->input->post('auctionmember[]');
			foreach ($member as $mbr)
			{
				$insmbr = array(
					'user_id' => $mbr,
					'aucg_id' => $id
				);
				$insertmbr = $this->db->insert('mona_aucmember',$insmbr);
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}
		}
		if($this->input->post('form_status') == '2')
		{
			$upd = array(
				'prod_id' => $this->input->post('auctionprod'),
				'aucg_date' => $this->input->post('auctiondate'),
				'aucg_openprice' => $this->input->post('auctionop'),
				'aucg_buyout' => $this->input->post('auctionbo'),
				'aucg_bid' => $this->input->post('auctionbid')
			);
			$update = $this->db->update('mona_aucgame',$upd,array('aucg_id'=>$this->input->post('auctionid')));
			$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			$id = $this->input->post('auctionid');
			$delmember = $this->db->delete('mona_aucmember',array('aucg_id'=>$id));
			$member = $this->input->post('auctionmember[]');
			foreach ($member as $mbr)
			{
				$insmbr = array(
					'user_id' => $mbr,
					'aucg_id' => $id
				);
				$insertmbr = $this->db->insert('mona_aucmember',$insmbr);
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}
		}
		echo json_encode($data);
	}

	public function chgsts_auction($id)
	{
		$chkque = $this->db->get_where('mona_aucgame',array('aucg_dtsts'=>'1'));
		$chkres = $chkque->num_rows();
		$chque = $this->db->get_where('mona_aucgame',array('aucg_id'=>$id));
		$chres = $chque->row();
		if($chkres > 0 && $chres->AUCG_DTSTS != '1')
		{
			$data['status'] = FALSE;
		}
		else
		{
			if($chres->AUCG_DTSTS != '0')
			{
				$upd = array(
					'aucg_dtsts' => '0'
				);
				$update = $this->db->update('mona_aucgame',$upd,array('aucg_id'=>$id));
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}
			else
			{
				$upd = array(
					'aucg_dtsts' => '1'
				);
				$update = $this->db->update('mona_aucgame',$upd,array('aucg_id'=>$id));
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}
		}
		echo json_encode($data);
	}

	public function _validate_auction()
	{
		$data = array();
	  $data['error_string'] = array();
	  $data['inputerror'] = array();
	  $data['status'] = TRUE;
	
	  if($this->input->post('auctionid') == '')
	  {
	  	$data['inputerror'][] = 'auctionid';
	    $data['error_string'][] = 'Kode Lelang Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('auctionprod') == '')
	  {
	  	$data['inputerror'][] = 'auctionprod';
	    $data['error_string'][] = 'Produk Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('auctiondate') == '')
	 	{
	  	$data['inputerror'][] = 'auctiondate';
	    $data['error_string'][] = 'Tanggal Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('form_status') == '1')
		{
	  	$this->form_validation->set_rules('auctionid', 'Auctionid', 'is_unique[mona_aucgame.AUCG_ID]');
	    if($this->form_validation->run() == FALSE)
		  {
		  	$data['inputerror'][] = 'auctionid';
		    $data['error_string'][] = 'Kode Lelang Sudah Terpakai';
		    $data['status'] = FALSE;
		  }
	  }
		if($this->input->post('auctionop') == '')
	 	{
	  	$data['inputerror'][] = 'auctionop';
	    $data['error_string'][] = 'Open Price Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('auctionbo') == '')
	 	{
	  	$data['inputerror'][] = 'auctionbo';
	    $data['error_string'][] = 'Buy Out Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('auctionbid') == '')
	 	{
	  	$data['inputerror'][] = 'auctionbid';
	    $data['error_string'][] = 'Bid Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($data['status'] === FALSE)
	  {
	  	echo json_encode($data);
	    exit();
	  }
	}

	public function img_config_()
	{
		$nmfile='img_'.time();
		$config['upload_path']='./assets/img/product/';
		$config['allowed_types']='jpg|jpeg|png';
		$config['max_size']='2048';
		$config['file_name']=$nmfile;
		$this->upload->initialize($config);
	}
}
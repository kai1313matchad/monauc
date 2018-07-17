<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_ extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD/M_Gen','gen');
		$this->load->model('datatables/user/Dtb_userall','userall');
	}

	public function get_userall()
	{
		$list = $this->userall->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->USER_NAME;
			$row[] = $dat->USER_COMPANY;
			$row[] = $dat->USER_ADDRESS;								
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_user('."'".$dat->USER_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
			$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_user('."'".$dat->USER_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->userall->count_all(),
						"recordsFiltered" => $this->userall->count_filtered(),
						"data" => $data,
		);			
		echo json_encode($output);
	}

	public function get_userrow($id)
	{
		$que = $this->db->get_where('mona_user',array('user_id'=>$id));
		$data = $que->row();
		echo json_encode($data);
	}

	public function gen_user()
	{
		$res = $this->gen->gen_number('user_id','mona_user','USR');
		$data['kode'] = $res;
		$data['status'] = TRUE;
		echo json_encode($data);
	}

	public function save_user()
	{
		$this->_validate_user();
		if($this->input->post('form_status') == '1')
		{
			$ins = array(
				'user_id' => $this->input->post('userid'),
				'user_name' => $this->input->post('username'),
				'user_pass' => $this->input->post('password'),
				'user_company' => $this->input->post('comp_name'),
				'user_address' => $this->input->post('comp_address'),
				'user_dtsts' => '1'
			);
			$insert = $this->db->insert('mona_user',$ins);
			$data['status']=($this->db->affected_rows())?TRUE:FALSE;
		}
		if($this->input->post('form_status') == '2')
		{
			if($this->input->post('password')!='')
			{
				$upd = array(
					'user_id' => $this->input->post('userid'),
					'user_name' => $this->input->post('username'),
					'user_pass' => $this->input->post('password'),
					'user_company' => $this->input->post('comp_name'),
					'user_address' => $this->input->post('comp_address'),
					'user_dtsts' => '1'
				);
			}
			else
			{
				$upd = array(
					'user_id' => $this->input->post('userid'),
					'user_name' => $this->input->post('username'),
					'user_company' => $this->input->post('comp_name'),
					'user_address' => $this->input->post('comp_address'),
					'user_dtsts' => '1'
				);
			}
			$update = $this->db->update('mona_user',$upd,array('user_id'=>$this->input->post('userid')));
			$data['status']=($this->db->affected_rows())?TRUE:FALSE;
		}
		echo json_encode($data);
	}

	public function del_user($id)
	{
		$del = array(
			'user_dtsts' => '0'
		);
		$update = $this->db->update('mona_user',$del,array('user_id'=>$id));
		$data['status']=($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function _validate_user()
	{
		$data = array();
	  $data['error_string'] = array();
	  $data['inputerror'] = array();
	  $data['status'] = TRUE;
	
	  if($this->input->post('username') == '')
	  {
	  	$data['inputerror'][] = 'username';
	    $data['error_string'][] = 'Username Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('form_status') == '1')
		{
	  	$this->form_validation->set_rules('userid', 'Userid', 'is_unique[mona_user.USER_ID]');
	    if($this->form_validation->run() == FALSE)
		  {
		  	$data['inputerror'][] = 'userid';
		    $data['error_string'][] = 'User ID Sudah Terpakai';
		    $data['status'] = FALSE;
		  }
	  	$this->form_validation->set_rules('username', 'Username', 'is_unique[mona_user.USER_NAME]');
	    if($this->form_validation->run() == FALSE)
		  {
		  	$data['inputerror'][] = 'username';
		    $data['error_string'][] = 'Username Tidak Boleh Sama';
		    $data['status'] = FALSE;
		  }
		  if($this->input->post('password') == '')
		  {
		  	$data['inputerror'][] = 'password';
		    $data['error_string'][] = 'Password Tidak Boleh Kosong';
		    $data['status'] = FALSE;	
		  }
	  }
		if($this->input->post('comp_name') == '')
	 	{
	  	$data['inputerror'][] = 'comp_name';
	    $data['error_string'][] = 'Nama Perusahaan Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('comp_address') == '')
	 	{
	  	$data['inputerror'][] = 'comp_address';
	    $data['error_string'][] = 'Alamat Perusahaan Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($data['status'] === FALSE)
	  {
	  	echo json_encode($data);
	    exit();
	  }
	}
}
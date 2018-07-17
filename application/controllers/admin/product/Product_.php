<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_ extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD/M_Gen','gen');
		$this->load->model('datatables/product/Dtb_productall','prodall');
	}

	public function get_productall()
	{
		$list = $this->prodall->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dat->PROD_ID;
			$row[] = $dat->PROD_NAME;
			$row[] = number_format($dat->PROD_PRICE);			
			$row[] = '<a href="'.base_url().$dat->PROD_PIC.'" target="blank__"><img class="img-responsive img-adm-product" src="'.base_url().$dat->PROD_PIC.'"></a>';
			$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_prod('."'".$dat->PROD_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
			$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_prod('."'".$dat->PROD_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->prodall->count_all(),
						"recordsFiltered" => $this->prodall->count_filtered(),
						"data" => $data,
		);			
		echo json_encode($output);
	}

	public function get_prodrow($id)
	{
		$que = $this->db->get_where('mona_product',array('prod_id'=>$id));
		$data = $que->row();
		echo json_encode($data);
	}

	public function save_product()
	{
		$this->_validate_product();
		if($this->input->post('form_status') == '1')
		{
			$this->img_config_();
			if(!$this->upload->do_upload('file'))
			{
				$data['error_str'] = $this->upload->display_errors();
				$data['error_str_sts'] = TRUE;
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}
			else
			{
				$fileinfo_ = $this->upload->data();
				$path = '/assets/img/product/'.$fileinfo_['file_name'];
				$ins = array(
					'prod_id' => $this->input->post('productid'),
					'prod_name' => $this->input->post('productname'),
					'prod_price' => $this->input->post('productprice'),
					'prod_pic' => $path,
					'prod_dtsts' => '1'
				);
				$insert = $this->db->insert('mona_product',$ins);
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}			
		}
		if($this->input->post('form_status') == '2')
		{
			if(empty($_FILES['file']['name']))
			{
				$upd = array(
					'prod_name' => $this->input->post('productname'),
					'prod_price' => $this->input->post('productprice'),
					'prod_dtsts' => '1'
				);
				$update = $this->db->update('mona_product',$upd,array('prod_id'=>$this->input->post('productid')));
				$data['status']=($this->db->affected_rows())?TRUE:FALSE;
			}
			else
			{
				$this->img_config_();
				if(!$this->upload->do_upload('file'))
				{
					$data['error_str'] = $this->upload->display_errors();
					$data['error_str_sts'] = TRUE;
					$data['status'] = FALSE;
					echo json_encode($data);
					exit();
				}
				else
				{
					$fileinfo_ = $this->upload->data();
					$path = '/assets/img/product/'.$fileinfo_['file_name'];
					$upd = array(
						'prod_name' => $this->input->post('productname'),
						'prod_price' => $this->input->post('productprice'),
						'prod_pic' => $path,
						'prod_dtsts' => '1'
					);
					$update = $this->db->update('mona_product',$upd,array('prod_id'=>$this->input->post('productid')));
					$data['status']=($this->db->affected_rows())?TRUE:FALSE;
				}
			}			
		}
		echo json_encode($data);
	}

	public function del_product($id)
	{
		$del = array(
			'prod_dtsts' => '0'
		);
		$update = $this->db->update('mona_product',$del,array('prod_id'=>$id));
		$data['status']=($this->db->affected_rows())?TRUE:FALSE;
		echo json_encode($data);
	}

	public function _validate_product()
	{
		$data = array();
	  $data['error_string'] = array();
	  $data['inputerror'] = array();
	  $data['status'] = TRUE;
	
	  if($this->input->post('productid') == '')
	  {
	  	$data['inputerror'][] = 'productid';
	    $data['error_string'][] = 'Kode Produk Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }

	  if($this->input->post('productname') == '')
	  {
	  	$data['inputerror'][] = 'productname';
	    $data['error_string'][] = 'Nama Produk Tidak Boleh Kosong';
	    $data['status'] = FALSE;
	  }
	  if($this->input->post('form_status') == '1')
		{
	  	$this->form_validation->set_rules('productid', 'Productid', 'is_unique[mona_product.PROD_ID]');
	    if($this->form_validation->run() == FALSE)
		  {
		  	$data['inputerror'][] = 'productid';
		    $data['error_string'][] = 'Kode Produk Sudah Terpakai';
		    $data['status'] = FALSE;
		  }
	  	$this->form_validation->set_rules('productname', 'Productname', 'is_unique[mona_product.PROD_NAME]');
	    if($this->form_validation->run() == FALSE)
		  {
		  	$data['inputerror'][] = 'productname';
		    $data['error_string'][] = 'Nama Produk Tidak Boleh Sama';
		    $data['status'] = FALSE;
		  }
		  if(empty($_FILES['file']['name']))
		 	{
		  	$data['inputerror'][] = 'productpic';
		    $data['error_string'][] = 'Gambar Produk Tidak Boleh Kosong';
		    $data['status'] = FALSE;
		  }
	  }
	  if($this->input->post('productprice') == '')
	 	{
	  	$data['inputerror'][] = 'productprice';
	    $data['error_string'][] = 'Harga Produk Tidak Boleh Kosong';
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
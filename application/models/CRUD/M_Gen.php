<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_gen extends CI_Model
	{
		//Generate Angka to Terbilang
		public function number_conv($value)
		{
			$nilai = abs($value);
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			$temp = "";
			if ($nilai < 12) 
			{
				$temp = " ". $huruf[$nilai];
			} 
			else if ($nilai <20) 
			{
				$temp = $this->number_conv($nilai - 10). " Belas ";
			} 
			else if ($nilai < 100) 
			{
				$temp = $this->number_conv($nilai/10)." Puluh ". $this->number_conv($nilai % 10);
			} 
			else if ($nilai < 200) 
			{
				$temp = " Seratus " . $this->number_conv($nilai - 100);
			} 
			else if ($nilai < 1000) 
			{
				$temp = $this->number_conv($nilai/100) . " Ratus " . $this->number_conv($nilai % 100);
			} 
			else if ($nilai < 2000) 
			{
				$temp = " Seribu " . $this->number_conv($nilai - 1000);
			} 
			else if ($nilai < 1000000) 
			{
				$temp = $this->number_conv($nilai/1000) . " Ribu " . $this->number_conv($nilai % 1000);
			} 
			else if ($nilai < 1000000000) 
			{
				$temp = $this->number_conv($nilai/1000000) . " Juta " . $this->number_conv($nilai % 1000000);
			} 
			else if ($nilai < 1000000000000) 
			{
				$temp = $this->number_conv($nilai/1000000000) . " Milyar " . $this->number_conv(fmod($nilai,1000000000));
			} 
			else if ($nilai < 1000000000000000) 
			{
				$temp = $this->number_conv($nilai/1000000000000) . " Trilyun " . $this->number_conv(fmod($nilai,1000000000000));
			}
			if($value<0) 
			{
				$hasil = "Minus ". trim($temp);
			} 
			else 
			{
				$hasil = trim($temp);
			}
			return $hasil;
		}
		
		//generate number
		public function gen_number($col,$table,$suf)
		{
			$this->db->select_max($col,'code');
			$que = $this->db->get($table);
			$ext = $que->row();
			$max = $ext->code;
			if($max == null)
			{
				$max = $suf.'-00000';
			}
			// $num = (int) substr($max,4,5);
			$num = (int) substr($max,-5);
			$num++;
			$kode = $suf.'-';
			$res = $kode . sprintf('%05s',$num);
			return $res;
		}
	}
?>
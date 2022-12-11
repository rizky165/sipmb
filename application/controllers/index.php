<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('S_pmb','s_pmb');
	}
	
	public function index()
	{
		$this->load->view('index/index');
	}

	public function pendaftar()
	{
		// $pendaftar = $this ->s_pmb->getpendaftar();
		// var_dump($pendaftar);

		$prodi = $this->s_pmb->getprodi();
		$jumlah = null;
		foreach ($prodi as $key => $p) {
			$prodi [$key]['jumlah'] = $this->s_pmb->getjumlahpendaftar($p['id_prodi']);
			$prodi [$key]['size'] = rand(10,30);
		}
		// foreach ($jumlah as $j =>$d) {
		// 	$jumlah[$j] = rand(100,250);
		// 
		$result = null;
		foreach($prodi as $p =>$prod){
			$sliced = $p == 
			$result[$p] = [
				"name" 		=> $prod['nama_prodi'],
				
				"y"	   		=> $prod['jumlah'],
			];
		}
		
		$data['pendaftar'] = $prodi;
		$data['grafik']	   = json_encode($result);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die;

		$this->load->view('index/pendaftar',$data);
	}
}

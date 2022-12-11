<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('S_pmb', 's_pmb');
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
			$prodi[$key]['jumlah'] = $this->s_pmb->getjumlahpendaftar($p['id_prodi']);
			$prodi[$key]['jumlah2'] = $this->s_pmb->getjumlahpendaftar2($p['id_prodi']);
			$prodi[$key]['size'] = rand(10, 30);
		}

		/* grafik prodi 1 */
		$result = null;
		foreach ($prodi as $p => $prod) {
			$sliced = $p ==
				$result[$p] = [
					"name" 		=> $prod['nama_prodi'],
					"y"	   		=> $prod['jumlah'],
				];
		}

		/* grafik prodi 2 */
		$result2 = null;
		foreach ($prodi as $p => $prod) {
			$sliced = $p ==
				$result2[$p] = [
					"name" 		=> $prod['nama_prodi'],
					"y"	   		=> $prod['jumlah2'],
				];
		}

		$data['pendaftar'] = $prodi;
		$data['grafik']	   = json_encode($result);
		$data['grafik2']   = json_encode($result2);


		$this->load->view('index/pendaftar', $data);
	}
}


		// foreach ($jumlah as $j =>$d) {
		// 	$jumlah[$j] = rand(100,250);
		// 
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die;

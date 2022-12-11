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


	public function pendaftar_prestasi()
	{
		$prestasi = $this->s_pmb->getprestasi();
		$jumlah = null;
		foreach ($prestasi as $key => $pr) {
			$prestasi[$key]['jumlah'] = $this->s_pmb->gettotalprestasi($pr['jenis_prestasi']);
			$prestasi[$key]['size'] = rand(10, 30);
		}



		/* grafik prestasi */
		$result3 = null;
		foreach ($prestasi as $pr => $prd) {
			$result3[$pr] = [
				"name" 		=> $prd['jenis_prestasi'],
				"y"	   		=> $prd['jumlah'],
			];
		}



		$data['prestasi']  = $prestasi;
		$data['grafik']	   = json_encode($result3);


		$this->load->view('index/pendaftar_prestasi', $data);
	}

	public function jalur_masuk_pendaftar()
	{
		$jalur = $this->s_pmb->getjalur();
		$jumlah = null;
		foreach ($jalur as $key => $j) {
			$jalur[$key]['jumlah'] = $this->s_pmb->getjalurmasuk($j['id_jalur']);
			$jalur[$key]['size'] = rand(10, 30);
		}

		/* grafik jalur masuk */
		$result4 = null;
		foreach ($jalur as $j => $jlr) {
			$result4[$j] = [
				"name" 		=> $jlr['nama_jalur'],
				"y"	   		=> $jlr['jumlah'],
			];
		}
		$data['jalur']     		   = $jalur;
		$data['grafik']	   		   = json_encode($result4);


		$this->load->view('index/jalur_masuk_pendaftar', $data);
	}

	public function data_bank()
	{

		$bank = $this->s_pmb->getbank();
		$jumlah = null;
		foreach ($bank as $key => $b) {
			$bank[$key]['jumlah'] = $this->s_pmb->getdaftarbank($b['id_bank']);
			$prodi[$key]['size'] = rand(10, 30);
		}

		$hasil = null;
		foreach ($bank as $b => $bk) {
			$hasil[$b] = [
				"name" 		=> $bk['nama_bank'],
				"y"	   		=> $bk['jumlah'],
			];

		}

		$data['jalur']     		   = $bank;
		$data['grafik']	   		   = json_encode($hasil);

		$this->load->view('index/data_bank', $data);

		// $hasil = null;
		// foreach ($bank as $b => $bk) {
		// 	$hasil[$b] = [
		// 			"name" 		=> $bk['nama_bank'],
		// 			"y"	   		=> $bk['jumlah'],
		// 		];
		// }


		// $data['bank']     		   = $bank;
		// $data['grafik']	   		   = json_encode($hasil);
		// $this->load->view('index/data_bank', $data);
	}

	public function bayar()
	{

		$bayar = $this->s_pmb->getpendaftar();
		$jumlah = null;
		foreach ($bayar as $key => $b) {
			$bayar[$key]['jumlah'] = $this->s_pmb->getbayar($b['is_bayar']);
			$bayar[$key]['size'] = rand(10, 30);
		}
	}
}
		// foreach ($jumlah as $j =>$d) {
		// 	$jumlah[$j] = rand(100,250);
		// 
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// die;

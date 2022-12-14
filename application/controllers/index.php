<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pmb', 'm_pmb');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->render('index/index', $data);
    }

    public function pendaftarprodi1()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 1';
        $prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik pertama
        $result = null;
        foreach ($prodi as $p => $prod) {
            // if ($prod['jumlah'] > $sum) {
            //     $sum = $prod['jumlah'];
            //     $sliced = true;
            //     $selected = true;
            // }
            $result[$p] = [
                "name"  => $prod['nama_prodi'],
                "jumlah" => $prod['jumlah'],
                "y"     => $prod['size'],
                // "sliced" => $sliced,
                // 'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik1'] = json_encode($result);
        $this->render('index/grafik_satu', $data);
    }

    public function pendaftarprodi2()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 2';
        $prodi = $this->m_pmb->listProdi();
        foreach ($prodi as $key => $p) {
            $prodi[$key]['jumlah'] = $this->m_pmb->jumlahPendaftarProdi1($p['id_prodi']);
            $prodi[$key]['jumlah2'] = $this->m_pmb->jumlahPendaftarProdi2($p['id_prodi']);
            $prodi[$key]['size'] = rand(10, 30);
        }

        //grafik kedua
        $hasil = null;
        foreach ($prodi as $p => $prod) {
            $hasil[$p] = [
                "name"  => $prod['nama_prodi'],
                "jumlah" => $prod['jumlah2'],
                "y"     => $prod['size'],
                // "sliced" => $sliced,
                // 'selected' => $selected
            ];
        }

        $data['pendaftar'] = $prodi;
        $data['grafik2'] = json_encode($hasil);
        $this->render('index/grafik_dua', $data);
    }
    public function pendaftar()
    { {
            $data['title'] = 'Grafik Berdasarkan Prodi 1';
            $prodi = $this->m_pmb->getprodi();
            $pendaftar = $this->m_pmb->getdataprodi1();
            $result = null;
            $jumlah = 0;
            $max = 0;
            foreach ($pendaftar as $key => $p) {
                if ($max < $p['jumlah']) {
                    $max = $p['jumlah'];
                    $posisi = $key;
                }
            }

            /* grafik prodi 2 */
            foreach ($pendaftar as $p => $prod) {
                $jumlah += $prod['jumlah'];
                $result[$p] = [
                    "name"         => $prod['nama_prodi'],
                    "jumlah"    => intval($prod['jumlah']),
                    "y"            => intval($prod['jumlah']),
                ];
            }


            $grafik['subtitle']   = json_encode($jumlah);
            $grafik['data']       = json_encode($result);
            $data['grafik']       = $grafik;

            $this->render('index/pendaftar', $data);
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
            // die;
        }
    }

    public function pendaftar2()
    {
        $data['title'] = 'Grafik Berdasarkan Prodi 2';
        $prodi = $this->m_pmb->getprodi();
        $pendaftar = $this->m_pmb->getdataprodi();
        $result = null;
        $jumlah = 0;
        $max = 0;
        foreach ($pendaftar as $key => $p) {
            if ($max < $p['jumlah']) {
                $max = $p['jumlah'];
                $posisi = $key;
            }
        }

        /* grafik prodi 2 */
        foreach ($pendaftar as $p => $prod) {
            $jumlah += $prod['jumlah'];
            $result[$p] = [
                "name"         => $prod['nama_prodi'],
                "jumlah"    => intval($prod['jumlah']),
                "y"            => intval($prod['jumlah']),
            ];
        }


        $grafik['subtitle']   = json_encode($jumlah);
        $grafik['data']         = json_encode($result);
        $data['grafik']       = $grafik;


        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // die;
        $this->render('index/pendaftar2', $data);
    }
    public function pendaftar_prestasi()
    {

        $data['title'] = 'Grafik Berdasarkan Tingkat Prestasi ';
        $prestasi = $this->m_pmb->getprestasi();
        $jumlah = null;
        foreach ($prestasi as $key => $pr) {
            $prestasi[$key]['jumlah'] = $this->m_pmb->gettotalprestasi($pr['jenis_prestasi']);
            $prestasi[$key]['size'] = rand(10, 30);
        }

        /* grafik prestasi */
        $result3 = null;
        foreach ($prestasi as $pr => $prd) {
            $result3[$pr] = [
                "name"         => $prd['jenis_prestasi'],
                "y"               => $prd['jumlah'],
            ];
        }

        $data['prestasi']  = $prestasi;
        $data['grafik']       = json_encode($result3);

        $this->render('index/pendaftar_prestasi', $data);
    }

    public function jalur_masuk_pendaftar()
    {
        $data['title'] = 'Grafik Berdasarkan Jalur Masuk';
        $jalur = $this->m_pmb->getjalur();
        $jumlah = null;
        foreach ($jalur as $key => $j) {
            $jalur[$key]['jumlah'] = $this->m_pmb->getjalurmasuk($j['id_jalur']);
            $jalur[$key]['size'] = rand(10, 30);
        }

        /* grafik jalur masuk */
        $result4 = null;
        foreach ($jalur as $j => $jlr) {
            $result4[$j] = [
                "name"         => $jlr['nama_jalur'],
                "y"               => $jlr['jumlah'],
            ];
        }
        $data['jalur']                = $jalur;
        $data['grafik']                = json_encode($result4);



        $this->render('index/jalur_masuk_pendaftar', $data);
    }

    public function data_bank()
    {

        $data['title'] = 'Grafik Pendapatan masing-masing Bank';
        $daftarbank = $this->m_pmb->getbank();
        $daftarpembayar = $this->m_pmb->getdaftarbayar();


        $categories = null;
        $pendapatan_bank = null;
        $total = 0;
        foreach ($daftarbank as $i => $d) {
            $categories[] = $d['nama_bank'];
            foreach ($daftarpembayar as $key => $value) {
                if ($d['id_bank'] == $value['id_bank']) {
                    if ($value['is_bayar'] == 1) {
                        $total += $value['pendapatan'];
                        $pendapatan_bank[] = intval($value['pendapatan']);
                    }
                }
            }
        }

        $result[] = [
            'name' => 'Pendapatan',
            'data' => $pendapatan_bank,
        ];

        $data['subtitle']   = ('Total pendaftar :' . $total);
        $grafik['data']         = json_encode($result, 1);
        $grafik['categories'] = json_encode($categories);
        $data['grafik']       = $grafik;

        // echo '<pre>';
        // print_r($grafik['categories']);
        // echo '</pre>';
        // die;

        $this->render('index/data_bank', $data);
    }
    public function bayar()
    {

        $data['title'] = 'Grafik Berdasarkan Bank';
        $daftarbank = $this->m_pmb->getbank();
        $daftarpembayar = $this->m_pmb->getdaftarbayar();


        $categories = null;
        $lunas = null;
        $belumlunas = null;
        $sumtotal = 0;
        foreach ($daftarbank as $i => $d) {
            $categories[] = $d['nama_bank'];
            foreach ($daftarpembayar as $key => $value) {
                if ($d['id_bank'] == $value['id_bank']) {
                    if ($value['is_bayar'] == 1) {
                        $sumtotal += $value['jumlah'];
                        $lunas[] = intval($value['jumlah']);
                    } else {
                        $sumtotal += $value['jumlah'];
                        $belumlunas[] = intval($value['jumlah']);
                    }
                }
            }
        }
        $result[] = [
            'name' => 'lunas',
            'data' => $lunas,
        ];
        $result[] = [
            'name' => 'belum lunas',
            'data' => $belumlunas,
        ];

        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // die;

        $data['subtitle']       = ('Total pendaftar :' . $sumtotal);
        $grafik['data']         = json_encode($result, 1);
        $grafik['categories'] = json_encode($categories);
        $data['grafik']       = $grafik;


        $this->render('index/bayar', $data);

        // echo '<pre>';
        // print_r($grafik['categories']);
        // echo '</pre>';
        // die;

    }
}

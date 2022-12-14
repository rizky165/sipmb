<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use LDAP\Result;

class S_pmb extends CI_Model
{

    public function getpendaftar()
    {

        return  $this->db->get('pendaftar')->result_array();
    }

    public  function getprodi()
    {
        return  $this->db->get('prodi')->result_array();
    }

    public  function getjalur()
    {
        return  $this->db->get('jalur_pendaftaran')->result_array();
    }

    public function getprestasi()
    {

        $this->db->group_by('jenis_prestasi');
        return  $this->db->get('prestasi')->result_array();
    }

    public  function getbank()
    {

        $data  = $this->db->get('bank')->result_array();
        return $data;
    }

    public  function getpembayar()
    {
        $data = $this->db->get('bank')->result_array();
        return $data;
    }


    public function getjumlahpendaftar($idprodi)
    {
        $result = 0;
        $this->db->where('id_prodi1', $idprodi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }
    public function getjumlahpendaftar2($idprodi)
    {
        $result = 0;
        $this->db->where('id_prodi2', $idprodi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function gettotalprestasi($jenis_prestasi)
    {
        $result = 0;
        $this->db->where('jenis_prestasi', $jenis_prestasi);

        $data = $this->db->get('prestasi')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }



    public function getjalurmasuk($id_jalur)
    {
        $result = 0;
        $this->db->where('id_jalur', $id_jalur);

        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function getdaftarbank()
    {
        $this->db->select(['COUNT(pendaftar.id_pendaftar) as jumlah','SUM(pendaftar.nominal_bayar) AS total',
        'pendaftar.id_bank','bank.nama_bank']);
        $this->db->join('bank', 'pendaftar.id_bank = bank.id_bank');
        $this->db->group_by(['id_bank']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }


    public function getdaftarbayar()
    {
        $this->db->select(['COUNT(pendaftar.id_pendaftar) as jumlah','SUM(pendaftar.nominal_bayar) 
        AS pendapatan','pendaftar.id_bank','pendaftar.is_bayar','bank.nama_bank']);
        $this->db->join('bank', 'pendaftar.id_bank = bank.id_bank');
        $this->db->where_in('id_jalur',[2, 3]);
        $this->db->group_by(['id_bank','is_bayar']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }
   
    // public function query_coba()
    // {
    //     return $this->db->query("SELECT 
    //     COUNT(id_pendaftar) AS jumlah, 
    //     SUM(pendaftar.nominal_bayar) AS total, 
    //     'pendaftar'.'id_bank','pendaftar'.'is_bayar', 'bank'.'nama_bank' 
    //     FROM 'pendaftar'
    //     JOIN 'bank' ON 'pendaftar'.'id_bank' = 'bank'.'id_bank' 
    //     WHERE 'id_jalur' IN(2, 3)
    //     GROUP BY 'id_jalur','is_bayar'")->result();
    // }
   
    // public function getbayar($id_bank)
    // {
    //     $result = 0;
    //     $this->db->where('id_bank ', $id_bank);
    //     $data = $this->db->get('pendaftar')->result_array();
    //     if (!empty($data)) {
    //         $result = count($data);
    //     }
    //     return $result;
    // }
}

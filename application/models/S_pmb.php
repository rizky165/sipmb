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
        $this->db->group_by('id_bank');
        return  $this->db->get('bank')->result_array();
    }

    public  function getpembayar()
    {
        $this->db->group_by('is_bayar');
        return  $this->db->get('pendaftar')->result_array();
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

    public function getdaftarbank($id_bank)
    {
        $result = 0;
        $this->db->where('id_bank', $id_bank);
        $this->db->where('nominal_bayar', 150000);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function getbayar($id_bank)
    {
        $result = 0;
        $this->db->where('id_bank ', $id_bank);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }
}

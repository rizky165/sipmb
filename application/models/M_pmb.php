<?php
class M_pmb extends CI_Model
{
    public function listPendaftar()
    {
        return $this->db->get('pendaftar')->result_array();
    }

    public function listProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function jumlahPendaftarProdi1($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi1', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function jumlahPendaftarProdi2($idProdi)
    {
        $result = 0;
        $this->db->where('id_prodi2', $idProdi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)) {
            $result = count($data);
        }
        return $result;
    }

    public function getpendaftar()
    {

        return  $this->db->get('pendaftar')->result_array();
    }

    public  function getprodi()
    {
        $data = $this->db->get('prodi')->result_array();
        return $data;
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
   
    public function getdataprodi()
    {
        $this->db->select(['COUNT(id_pendaftar) as jumlah','id_prodi2','jenjang','Concat(jenjang," - ",nama_prodi) as nama_prodi']);
        $this->db->join('prodi', 'pendaftar.id_prodi2 = prodi.id_prodi');
        $this->db->group_by(['id_prodi2']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function getdataprodi1()
    {
        $this->db->select(['COUNT(id_pendaftar) as jumlah','id_prodi1','jenjang','Concat(jenjang," - ",nama_prodi) as nama_prodi']);
        $this->db->join('prodi', 'pendaftar.id_prodi1 = prodi.id_prodi');
        $this->db->group_by(['id_prodi1']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }
}

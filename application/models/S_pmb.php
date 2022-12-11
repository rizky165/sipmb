<?php

use LDAP\Result;

class S_pmb extends CI_Model {

        public function getpendaftar ()
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
            return  $this->db->get('prestasi')->result_array();
        }

        public function getjumlahpendaftar($idprodi){
            $result = 0;
            $this->db->where('id_prodi1',$idprodi);
            $data = $this->db->get('pendaftar')->result_array();
            if(!empty($data)) {
                $result = count($data);   
            }
            return $result;
        }
        public function getjumlahpendaftar2($idprodi){
            $result = 0;
            $this->db->where('id_prodi2',$idprodi);
            $data = $this->db->get('pendaftar')->result_array();
            if(!empty($data)) {
                $result = count($data);   
            }
            return $result;
        }
        
        public function gettotalprestasi($id_jalur){
            $result = 0;
            $this->db->where('id_jalur ',$id_jalur);
            $data = $this->db->get('pendaftar')->result_array();
            if(!empty($data)) {
                $result = count($data);   
            }
            return $result;

        }

        public function getjalurmasuk($id_jalur) {
            $result = 0;
            $this->db->where('id_jalur',$id_jalur);
            $data = $this->db->get('pendaftar')->result_array();
            if(!empty($data)) {
                $result = count($data);   
            }
            return $result;
        }

        
    

}
?>

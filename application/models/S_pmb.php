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
}

?>

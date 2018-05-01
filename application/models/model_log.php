<?php

/**
 *
 */
class Model_log extends CI_Model
{

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function save_log($param)
  {
    $sql        = $this->db->insert_string('tabel_log',$param);
    $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
  }

  function tampil_data(){
    return $this->db->get('tabel_log');
  }
}

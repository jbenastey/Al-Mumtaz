<?php


/**
 *
 */
class Log extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_log');
    chek_session();
  }

  function index(){
    $data['record']=$this->Model_log->tampil_data();
    $this->template->load('template','Log/lihat_data',$data);
  }
}

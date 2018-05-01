<?php
class Dashboard extends CI_Controller{

  function __construct() {
      parent::__construct();
      $this->load->model(array('model_transaksi','model_member','model_buku'));
      chek_session();
  }

    function index(){
        chek_session();
        $data['record'] = $this->model_transaksi->tampilkan_transaksi()->result();
        $data['member'] = $this->model_member->tampil_data()->result();
        $data['buku'] = $this->model_buku->tampil_data()->result();
        $this->template->load('template','v_dashboard',$data);

    }
}

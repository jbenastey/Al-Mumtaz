<?php

/**
 *
 */
class member extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_member');
    chek_session();
  }

  function index()
  {
      $data['record'] = $this->model_member->tampil_data();
      $this->template->load('template','member/lihat_data',$data);
  }

  function post(){
    if(isset($_POST['submit'])){
        // proses barang
        $id         =   $this->input->post('id_member');
        $nama       =   $this->input->post('nama');
        $noiden     =   $this->input->post('no_identitas');
        $nomor      =   $this->input->post('no_telepon');
        $jk         =   $this->input->post('jenis_kelamin');
        $alamat     =   $this->input->post('alamat');

        $data       = array('id_member'=>$id,
                            'nama'=>$nama,
                            'no_identitas'=>$noiden,
                            'no_telepon'=>$nomor,
                            'jenis_kelamin'=>$jk,
                            'alamat'=>$alamat,
                            );
        $this->model_member->post($data);
        helper_log("add","Menambahkan data member");
        redirect('member');
    }
    else {
      $this->template->load('template','member/form_input');
    }
  }

  function edit(){
    if(isset($_POST['submit'])){
        // proses barang
        $id         =   $this->input->post('id_member');
        $nama       =   $this->input->post('nama');
        $noiden     =   $this->input->post('no_identitas');
        $nomor      =   $this->input->post('no_telepon');
        $jk         =   $this->input->post('jenis_kelamin');
        $alamat     =   $this->input->post('alamat');

        $data       = array('id_member'=>$id,
                            'nama'=>$nama,
                            'no_identitas'=>$noiden,
                            'no_telepon'=>$nomor,
                            'jenis_kelamin'=>$jk,
                            'alamat'=>$alamat,
                            );
        $this->model_member->edit($data,$id);
        helper_log("edit","Mengedit data member");
        redirect('member');
    }
    else {
      $id=  $this->uri->segment(3);
      $data['record']     =  $this->model_member->get_one($id)->row_array();
      $this->template->load('template','member/form_edit',$data);
    }
  }

  function delete(){
    $id=  $this->uri->segment(3);
    $this->model_member->delete($id);
    helper_log("delete","Menghapus data member");
    redirect('member');
  }

}

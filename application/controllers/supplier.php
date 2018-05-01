<?php

/**
 *
 */
class supplier extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_supplier');
    chek_session();
  }

  function index()
  {
      $data['record'] = $this->model_supplier->tampil_data();
      $this->template->load('template','supplier/lihat_data',$data);
  }

  function post(){
    if(isset($_POST['submit'])){
        // proses barang
        $id         =   $this->input->post('id_supplier');
        $namasupp   =   $this->input->post('nama_supplier');
        $namapem    =   $this->input->post('nama_pemimpin');
        $nomor      =   $this->input->post('no_telepon');
        $alamat     =   $this->input->post('alamat');

        $data       = array('id_supplier'=>$id,
                            'nama_supplier'=>$namasupp,
                            'nama_pimpinan'=>$namapem,
                            'nomor_telepon'=>$nomor,
                            'alamat'=>$alamat,

                            );
        $this->model_supplier->post($data);
        helper_log("add","Menambah data supplier");
        redirect('supplier');
    }
    else {
      $this->template->load('template','supplier/form_input');
    }
  }

  function edit(){
    if(isset($_POST['submit'])){
        // proses barang
        $id         =   $this->input->post('id_supplier');
        $namasupp   =   $this->input->post('nama_supplier');
        $namapem    =   $this->input->post('nama_pemimpin');
        $nomor      =   $this->input->post('no_telepon');
        $alamat     =   $this->input->post('alamat');

        $data       = array('id_supplier'=>$id,
                            'nama_supplier'=>$namasupp,
                            'nama_pimpinan'=>$namapem,
                            'nomor_telepon'=>$nomor,
                            'alamat'=>$alamat,

                            );
        $this->model_supplier->edit($data,$id);
        helper_log("edit","Mengedit data supplier");
        redirect('supplier');
    }
    else {
      $id=  $this->uri->segment(3);
      $data['record']     =  $this->model_supplier->get_one($id)->row_array();
      $this->template->load('template','supplier/form_edit',$data);
    }
  }

  function delete(){
    $id=  $this->uri->segment(3);
    $this->model_supplier->delete($id);
    helper_log("delete","Menghapus data supplier");
    redirect('supplier');
  }

}

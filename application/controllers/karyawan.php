<?php
  /**
   *
   */
  class karyawan extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('model_karyawan');
      chek_session();

    }
    function index()
    {
      $data['record']=$this->model_karyawan->tampil_data();
      $this->template->load('template','karyawan/lihat_data',$data);
    }
    function post()
    {
      if (isset($_POST['submit'])) {
        $id       = $this->input->post('id_karyawan');
        $nama     = $this->input->post('nama');
        $alamat   = $this->input->post('alamat');
        $noiden   = $this->input->post('no_identitas');
        $notlpn   = $this->input->post('no_telepon');
        $jbtn     = $this->input->post('jabatan');
        $jk       = $this->input->post('jenis_kelamin');

        $data     = array('id_karyawan'=>$id,
                          'nama'=>$nama,
                          'alamat'=>$alamat,
                          'no_identitas'=>$noiden,
                          'no_telepon'=>$notlpn,
                          'jabatan'=>$jbtn,
                          'jenis_kelamin'=>$jk
                        );
        $this->model_karyawan->post($data);
        helper_log("add","Menambah data karyawan");
        redirect('karyawan');
      }
      else {
          $this->template->load('template','karyawan/form_input');
      }
    }
    function edit()
    {
      if (isset($_POST['submit'])) {
        $id             = $this->input->post('id_karyawan');
        $nama           = $this->input->post('nama');
        $alamat         = $this->input->post('alamat');
        $noiden         = $this->input->post('no_identitas');
        $notlpn         = $this->input->post('no_telepon');
        $jbtn           = $this->input->post('jabatan');
        $jk             = $this->input->post('jenis_kelamin');

        $data     = array('id_karyawan'=>$id,
                          'nama'=>$nama,
                          'alamat'=>$alamat,
                          'no_identitas'=>$noiden,
                          'no_telepon'=>$notlpn,
                          'jabatan'=>$jbtn,
                          'jenis_kelamin'=>$jk);
        $this->model_karyawan->edit($data,$id);
        helper_log("edit","Mengedit data karyawan");
        redirect('karyawan');
      }
      else {
        $id=  $this->uri->segment(3);
        $data['record']     =  $this->model_karyawan->get_one($id)->row_array();
        $this->template->load('template','karyawan/form_edit',$data);;
      }
    }
    function delete()
    {
      $id= $this->uri->segment(3);
      $this->model_karyawan->delete($id);
      helper_log("delete","Menghapus data karyawan");
      redirect('karyawan');
    }
  }

 ?>

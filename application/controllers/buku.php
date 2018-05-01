<?php
class buku extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_buku');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_buku->tampil_data();
        $this->template->load('template','buku/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
            // proses buku
            $kode       =   $this->input->post('kode_buku');
            $judul      =   $this->input->post('judul_buku');
            $kategori   =   $this->input->post('kategori');
            $penerbit   =   $this->input->post('penerbit');
            $pengarang  =   $this->input->post('pengarang');
            $harga      =   $this->input->post('harga');
            $jumlah     =   $this->input->post('jumlah');
            $data       = array('kode_buku'=>$kode,
                                'judul_buku'=>$judul,
                                'id_kategori'=>$kategori,
                                'penerbit'=>$penerbit,
                                'pengarang'=>$pengarang,
                                'harga'=>$harga,
                                'jumlah'=>$jumlah,
                                );
            $this->model_buku->post($data);
            helper_log("add","Menambahkan data buku");
            redirect('buku');
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('buku/form_input',$data);
            $this->template->load('template','buku/form_input',$data);
        }
    }


    function edit()
    {
       if(isset($_POST['submit'])){
            // proses buku
            $kode       =   $this->input->post('kode_buku');
            $judul      =   $this->input->post('judul_buku');
            $kategori   =   $this->input->post('kategori');
            $penerbit   =   $this->input->post('penerbit');
            $pengarang  =   $this->input->post('pengarang');
            $harga      =   $this->input->post('harga');
            $jumlah     =   $this->input->post('jumlah');
            $data       = array('kode_buku'=>$kode,
                                'judul_buku'=>$judul,
                                'id_kategori'=>$kategori,
                                'penerbit'=>$penerbit,
                                'pengarang'=>$pengarang,
                                'harga'=>$harga,
                                'jumlah'=>$jumlah,
                                );
            $this->model_buku->edit($data,$kode);
            helper_log("edit","Mengedit data buku");
            redirect('buku');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_buku->get_one($id)->row_array();
            //$this->load->view('buku/form_edit',$data);
            $this->template->load('template','buku/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_buku->delete($id);
        helper_log("delete","Menghapus data buku");
        redirect('buku');
    }
}

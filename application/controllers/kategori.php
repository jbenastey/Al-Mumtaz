<?php
class kategori extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        chek_session();
    }

    function index(){
        // $this->load->library('pagination');
        // $config['base_url'] = base_url().'index.php/kategori/index/';
        // $config['total_rows'] = $this->model_kategori->tampilkan_data()->num_rows();
        // $config['per_page'] = 3;
        // $this->pagination->initialize($config);
        // $data['paging']     =$this->pagination->create_links();
        // $halaman            =  $this->uri->segment(3);
        // $halaman            =$halaman==''?0:$halaman;
        // $data['record']     =    $this->model_kategori->tampilkan_data_paging($halaman,$config['per_page']);
        // $this->template->load('template','kategori/lihat_data',$data);
        $data['record'] = $this->model_kategori->tampilkan_data();
        $this->template->load('template','kategori/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id_kategori    = $this->input->post('id_kategori');
            $kategori       = $this->input->post('kategori');
            $data           = array('kategori_id'=>$id_kategori,
                                    'nama_kategori'=>$kategori
            );
            $this->model_kategori->post($data);
            helper_log("add","Menambah data kategori");
            redirect('kategori');
        }
        else{
            //$this->load->view('kategori/form_input');
            $this->template->load('template','kategori/form_input');
        }
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id_kategori    = $this->input->post('id_kategori');
            $kategori       = $this->input->post('kategori');
            $data           = array('kategori_id'=>$id_kategori,
                                    'nama_kategori'=>$kategori
            );
            $this->model_kategori->edit($data,$id_kategori);
            helper_log("edit","Mengedit data kategori");
            redirect('kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_kategori->get_one($id)->row_array();
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','kategori/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kategori->delete($id);
        helper_log("delete","Menghapus data kategori");
        redirect('kategori');
    }
}

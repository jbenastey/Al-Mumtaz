<?php
class operator extends ci_controller{

   function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        chek_session();
    }

    function index()
    {
        $data['record']=  $this->model_admin->tampildata();
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/lihat_data',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])){
            // proses data
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $data       =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password),
                                    'level'=>"admin"
                                  );
            $this->db->insert('operator',$data);
            helper_log("add","Menambah data operator");
            redirect('operator');
        }
        else{
            //$this->load->view('operator/form_input');
            $this->template->load('template','operator/form_input');
        }
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $id         =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            if(empty($password)){
                 $data  =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username);
            }
            else{
                  $data =  array(   'nama_lengkap'=>$nama,
                                    'username'=>$username,
                                    'password'=>md5($password));
            }
             $this->db->where('operator_id',$id);
             $this->db->update('operator',$data);
             helper_log("edit","Mengedit data operator");
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_admin->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','operator/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('operator_id',$id);
        $this->db->delete('operator');
        helper_log("delete","Menghapus data operator");
        redirect('operator');
    }
}

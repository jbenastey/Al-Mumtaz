<?php
class admin extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
    }

    function login()
    {
        if(isset($_POST['submit'])){

            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');

            //$lvl['record'] = $this->model_admin->tampildata();

            $hasil=  $this->model_admin->login($username,$password);

            // $hasil2 = $this->model_admin->tampildata()->row_array();

            $this->load->helper(array('form','url'));
            $this->load->library('session');

            $level = $hasil2['level'];

            $captcha = $this->input->post('captcha');

            //proses captcha



            if($hasil==1)
            {
              //if (md5($captcha)==$this->session->userdata('keycode')) {
                # code...

                $this->db->where('username',$username);
                $this->db->update('operator',array('last_login'=>date('Y-m-d')));
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));

                $this->session->unset_userdata('keycode');
                helper_log("login","Melakukan login ");

                redirect('dashboard');
              //}else{
                //redirect('admin/login?cap_error=1');
              //}
                // update last login

            }
            else{

                redirect('admin/login?login_error=1');
            }
        }
        else{
            //$this->load->view('form_login2');
            chek_session_login();

            //captcha
            $this->load->helper(array('captcha','form'));
            $this->load->library('session');
            $vals = array(
             'img_path' => './capimg/',
             'img_url' => '/Al-Mumtaz/capimg/',
             'img_width' => 300,
             'img_height' => 50
            );
            $cap = create_captcha($vals);
            $this->session->set_userdata('keycode',md5($cap['word']));
            $data['captcha_img'] = $cap['image'];
            $this->load->view('form_login',$data);
        }
    }

    function getUserData(){
      $userData = $this->session-userdata();
      return $userData;
    }

    function periksa($level){
      if ($level == 'superadmin') {
        redirect;
      }
    }


    function logout()
    {
        helper_log("logout","Logout Sistem");

        $this->session->sess_destroy();
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');

        redirect('dashboard');
        redirect('admin/login');
    }
}

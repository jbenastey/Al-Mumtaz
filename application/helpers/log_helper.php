<?php


function helper_log($tipe = " ", $str = " ")
{
  $CI =& get_instance();

  if (strtolower($tipe) == "login") {
    $log_tipe = 0;
  }
  elseif(strtolower($tipe) == "logout")
  {
        $log_tipe   = 1;
  }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
  }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
  }
    elseif (strtolower($tipe) == "delete") {
        $log_tipe  = 4;
    }
    elseif (strtolower($tipe) == "trans_jual") {
        $log_tipe  = 5;
    }
    elseif (strtolower($tipe) == "cetak_periode") {
        $log_tipe  = 6;
    }
    elseif (strtolower($tipe) == "cetak") {
        $log_tipe  = 7;
    }
    else{

    }

    // paramter
    $param['log_user']      = $CI->session->userdata('username');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;

    //load model log
    $CI->load->model('model_log');

    //save to database
    $CI->model_log->save_log($param);

}

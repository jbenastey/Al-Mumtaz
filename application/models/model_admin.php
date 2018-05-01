<?php
class model_admin extends CI_Model{



    function login($username,$password)
    {
        // $query = $this->db->query("select level from operator where username='$username'");
        // $r = $query->row();
        $cek=  $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));
        if($cek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }


    function tampildata()
    {
        $query = "SELECT * FROM operator WHERE username!='superadmin'";
        return $this->db->query($query);
    }

    function get_one($id)
    {
        $param  =   array('operator_id'=>$id);
        return $this->db->get_where('operator',$param);
    }

    function get_level($id){
      $param = array('operator_id'=>$id);
      return $this->db->get_where('operator',$param);
    }

    function get_baris($id)
  	{
  		return $this->db
  			->select('operator_id, nama_lengkap')
  			->where('operator_id', $id)
  			->limit(1)
  			->get('operator');
  	}
}

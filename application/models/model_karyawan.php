<?php
  /**
   *
   */
  class model_karyawan extends ci_model
  {

    function tampil_data()
    {
      return $this->db->get('karyawan');
    }

    function post($data)
    {
      $this->db->insert('karyawan',$data);
    }

    function get_one($id)
    {
      $param = array('id_karyawan'=>$id);
      return $this->db->get_where('karyawan',$param);
    }

    function edit($data,$id)
    {
      $this->db->where('id_karyawan',$id);
      $this->db->update('karyawan',$data);
    }
    function delete($id)
    {
      $this->db->where('id_karyawan',$id);
      $this->db->delete('karyawan');
    }
  }

?>

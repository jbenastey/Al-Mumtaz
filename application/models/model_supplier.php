<?php
/**
 *
 */
class model_supplier extends ci_model
{

  function tampil_data(){
      return $this->db->get('supplier');
  }

  function post($data)
  {
      $this->db->insert('supplier',$data);
  }

  function get_one($id)
  {
      $param  =   array('id_supplier'=>$id);
      return $this->db->get_where('supplier',$param);
  }

  function edit($data,$id)
  {
      $this->db->where('id_supplier',$id);
      $this->db->update('supplier',$data);
  }


  function delete($id)
  {
      $this->db->where('id_supplier',$id);
      $this->db->delete('supplier');
  }

  function get_baris($id_supplier){
    return $this->db
      ->select('id_supplier, nama_supplier')
      ->where('id_supplier', $id_supplier)
      ->limit(1)
      ->get('supplier');
  }
}

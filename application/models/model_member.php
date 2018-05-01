<?php
/**
 *
 */
class model_member extends ci_model
{


  function tampil_data(){
      $query ="SELECT * FROM member WHERE id_member!='0'";
      return $this->db->query($query);
  }

  function post($data)
  {
      $this->db->insert('member',$data);
  }

  function get_one($id)
  {
      $param  =   array('id_member'=>$id);
      return $this->db->get_where('member',$param);
  }

  function edit($data,$id)
  {
      $this->db->where('id_member',$id);
      $this->db->update('member',$data);
  }


  function delete($id)
  {
      $this->db->where('id_member',$id);
      $this->db->delete('member');
  }

  function tampilall()
  {
    return $this->db->get('member');
  }

  function get_baris($id_member)
	{
		return $this->db
			->select('id_member, nama')
			->where('id_member', $id_member)
			->limit(1)
			->get('member');
	}
}

<?php
class Model_kategori extends CI_Model{



    function tampilkan_data(){

        return $this->db->get('kategori_buku');
    }


    function post($data){
        $this->db->insert('kategori_buku',$data);
    }

    function get_one($id)
    {
        $param  =   array('kategori_id'=>$id);
        return $this->db->get_where('kategori_buku',$param);
    }

    function edit($data,$id)
    {

        $this->db->where('kategori_id',$id);
        $this->db->update('kategori_buku',$data);
    }




    function delete($id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->delete('kategori_buku');
    }
}

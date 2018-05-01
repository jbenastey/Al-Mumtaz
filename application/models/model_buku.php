<?php
class model_buku extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }

    function tampil_data()
    {
        $query= "SELECT b.kode_buku,b.judul_buku,b.harga,b.penerbit,b.pengarang,b.jumlah,kb.nama_kategori
                FROM buku as b,kategori_buku as kb
                WHERE b.id_kategori=kb.kategori_id";
        return $this->db->query($query);
    }

    function tampil_contoh()
    {
      # code...
      $query="SELECT td.tanggal,sum(td.harga*td.qty) as total,b.judul_buku,td.harga,td.qty
              FROM transaksi_detail as td,buku as b
              WHERE td.status = '1';
              -- td.transaksi_id=t.transaksi_id and
              -- td.kode_buku=b.kode_buku
              -- group by td.transaksi_id";
      // $query="SELECT * FROM transaksi_detail";
      return $this->db->query($query);
    }

    function post($data)
    {
        $this->db->insert('buku',$data);
    }

    function get_one($id)
    {
        $param  =   array('kode_buku'=>$id);
        return $this->db->get_where('buku',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('kode_buku',$id);
        $this->db->update('buku',$data);
    }


    function delete($id)
    {
        $this->db->where('kode_buku',$id);
        $this->db->delete('buku');
    }

    function get_by_id($id)
    {
      $this->db->where('kode_buku',$id);

      return $this->db->get('buku')->row();
    }
}

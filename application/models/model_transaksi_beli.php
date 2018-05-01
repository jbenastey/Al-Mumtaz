<?php

/**
 *
 */
class model_transaksi_beli extends ci_model
{

  function simpan_barang()
  {
    // $id             =  $this->input->post('id_supplier');
    $judul_buku     =  $this->input->post('buku');
    $jumlah         =  $this->input->post('jumlah');
    $harga          =  $this->input->post('harga');
    $tanggal        =  date('Y-m-d');

    $data           =  array(
                             'judul_buku'=>$judul_buku,
                             'jumlah'=>$jumlah,
                             'harga_beli'=>$harga,
                             'tanggal'=>$tanggal,
                             'total'=>$jumlah*$harga
    );
    $this->db->insert('transaksi_beli_detail',$data);
  }
  function tampilkan_detail_transaksi(){
    $query = "SELECT id_transaksi_beli,judul_buku,harga_beli,jumlah,total
              FROM transaksi_beli_detail
              WHERE status='0'
    ";
    return $this->db->query($query);
  }

  function hapusitem($id){
    $this->db->where('id_transaksi_beli',$id);
    $this->db->delete('transaksi_beli_detail');
  }
  function selesai_belanja($data){
    $this->db->insert('transaksi_beli',$data);
    $last_id = $this->db->query("select transaksi_id from transaksi_beli order by transaksi_id desc")->row_array();
    $this->db->query("UPDATE transaksi_beli_detail SET transaksi_id='".$last_id['transaksi_id']."' WHERE status='0'");
    $this->db->query("update transaksi_beli_detail set status='1' where status = '0'");
  }

  function laporan_default()
  {
      $query="SELECT tb.transaksi_id, tb.tanggal, tb.total, s.nama_supplier
      -- sum(td.harga*td.qty) as total
              FROM transaksi_beli as tb,supplier as s
              WHERE
              -- td.transaksi_id=t.transaksi_id and
              tb.id_supplier=s.id_supplier
              ORDER BY tb.tanggal
              -- group by td.transaksi_id";
      // $query="SELECT * FROM transaksi_detail";
      return $this->db->query($query);

  }

  function laporan_periode($tanggal1,$tanggal2)
  {
      $query="SELECT tb.transaksi_id, tb.tanggal, tb.total, s.nama_supplier
              FROM transaksi_beli as tb,supplier as s
              WHERE tb.id_supplier=s.id_supplier
              and tb.tanggal between '$tanggal1' and '$tanggal2'
              ORDER BY tb.tanggal
              ";
      return $this->db->query($query);
  }
  function cetak_resi(){
    $query="SELECT id_transaksi_beli, tanggal, judul_buku, harga_beli, jumlah, total
            FROM transaksi_beli_detail
            WHERE status='0'
            ";
            return $this->db->query($query);
  }

}

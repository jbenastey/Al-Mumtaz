<?php
class model_transaksi extends ci_model
{


    function simpan_barang()
    {
        $kode           =  $this->input->post('kode');
        $judul_buku     =  $this->input->post('buku');
        $qty            =  $this->input->post('qty');
        // $id_member      =  $this->input->post('id_member');
        $tanggal        =  date('Y-m-d');
        $idbuku       = $this->db->get_where('buku',array('kode_buku'=>$kode))->row_array();
        $member       = $this->db->get_where('member',array('id_member'=>$id_member))->row_array();
        // $harga        = $this->db->get_where('buku',array('harga'))->row_array();
        $total = $idbuku['harga']*$qty;
        // if ($id_member!='Umum') {
        //   $total = $total-($total*0.1);
        // }
        $data           = array('kode_buku'=>$idbuku['kode_buku'],
                                'qty'=>$qty,
                                // 'id_member'=>$id_member,
                                'harga'=>$idbuku['harga'],
                                'tanggal'=>$tanggal,
                                'total'=>$total
                              );
        $this->db->insert('transaksi_detail',$data);
    }

    function tampilkan_detail_transaksi()
    {
        $query  ="SELECT td.t_detail_id,td.qty,td.harga,b.judul_buku,td.total
                FROM transaksi_detail as td,buku as b
                WHERE b.kode_buku=td.kode_buku and td.status='0'";
        return $this->db->query($query);
    }

    function tampilkan_transaksi(){

      return $this->db->get('transaksi_detail');
    }

    function hapusitem($id)
    {
        $this->db->where('t_detail_id',$id);
        $this->db->delete('transaksi_detail');
    }


    function selesai_belanja($data)
    {
        $this->db->insert('transaksi',$data);
        $last_id=  $this->db->query("select transaksi_id from transaksi order by transaksi_id desc")->row_array();
        $this->db->query("update transaksi_detail set transaksi_id='".$last_id['transaksi_id']."' where status='0'");
        $this->db->query("update transaksi_detail set status='1' where status='0'");

    }


    function laporan_default()
    {

        $query="SELECT td.transaksi_id, td.tanggal, td.id_member, td.grandtotal, m.nama
        -- sum(td.harga*td.qty) as total
                FROM transaksi as td,member as m
                WHERE
                td.id_member=m.id_member
                -- td.kode_buku=b.kode_buku
                -- and td.status='1'
                -- ORDER BY td.tanggal
                -- group by td.transaksi_id";
        // // $query="SELECT * FROM transaksi_detail";
        return $this->db->query($query);
        // return $this->db->get('transaksi');

    }

    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT td.transaksi_id,td.tanggal,td.id_member,td.grandtotal,m.nama
                FROM transaksi as td,member as m
                WHERE td.id_member=m.id_member
                and td.tanggal between '$tanggal1' and '$tanggal2'
                ORDER BY td.tanggal
                ";
        return $this->db->query($query);
    }

    function cetak_resi(){
      $query  ="SELECT td.t_detail_id,td.qty,td.harga,b.judul_buku,td.total
              FROM transaksi_detail as td,buku as b
              WHERE b.kode_buku=td.kode_buku and td.status='0'";
      return $this->db->query($query);
    }
}

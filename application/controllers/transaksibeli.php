<?php

/**
 *
 */
class transaksibeli extends ci_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_supplier','model_transaksi_beli'));
    chek_session();
  }
  function index(){


    $data['supplier'] = $this->model_supplier->tampil_data();
    $data['detail'] = $this->model_transaksi_beli->tampilkan_detail_transaksi()->result();
    $this->template->load('template','transaksibeli/form_transaksi',$data);
    if (isset($_POST['submit'])) {
      $this->model_transaksi_beli->simpan_barang();
      redirect('transaksibeli');
    }
    elseif (isset($_POST['cetakresi'])) {
      # code...

      $cash = $this->input->post('bayar');
      $tanggal = $this->input->post('tanggal');
      $idsupplier = $this->input->post('id_supplier');

      $this->load->model('model_supplier');
      $supplier = $this->model_supplier->
      get_baris($idsupplier)->row()->nama_supplier;

      $this->load->library('cfpdf');
      $pdf=new FPDF('P','mm','A5');
      $pdf->AddPage();
      $pdf->SetFont('Arial','',10);

      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();
      $pdf->Cell(130, 5, "Toko Buku Al-Mumtaz", 0, 0, 'C');
      $pdf->Ln();
      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();
      $pdf->Cell(25, 4, 'Supplier', 0, 0, 'L');
      $pdf->Cell(85, 4, ': '.$supplier, 0, 0, 'L');
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Cell(25, 4, 'Tanggal', 0, 0, 'L');
      $pdf->Cell(85, 4, ': '.date('d-M-Y', strtotime($tanggal)), 0, 0, 'L');
      $pdf->Ln();
      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();




      $pdf->Cell(10, 7, 'No', 0,0);

      $pdf->Cell(25, 7, 'Judul Buku', 0,0);
      //$pdf->Cell(38, 7, 'Total Transaksi', 1,1);
      $pdf->Cell(15, 7, 'Harga', 0,0);
      $pdf->Cell(15, 7, 'Jumlah', 0,0);
      $pdf->Cell(30, 7, 'Total Transaksi', 0,0);
      $pdf->Ln();

      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();
      // tampilkan dari database
      $pdf->SetFont('Arial','','L');
      $data=  $this->model_transaksi_beli->cetak_resi();

      //$this->load->model('model_transaksi');
      $no=1;
      $total=0;
      foreach ($data->result() as $r)
      {
          $pdf->Cell(10, 7, $no, 0,0);

          $pdf->Cell(25, 7, $r->judul_buku, 0,0);
          $pdf->Cell(15, 7, str_replace(',','.',number_format($r->harga_beli)), 0,0);
          $pdf->Cell(15, 7, $r->jumlah, 0,0);
          $pdf->Cell(25, 7, str_replace(',','.',number_format($r->total)), 0,0,'R');
          $pdf->Ln();
          $no++;
          $total=$total+$r->total;
      }
      // end
      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();

      $pdf->Cell(100,7,'Total',0,0,'R');
      $pdf->Cell(25,7,str_replace(',','.',number_format($total)),0,0,'R');

      $pdf->Ln();
      $pdf->Cell(100,7,'Bayar',0,0,'R');
      $pdf->Cell(25,7,str_replace(',','.',number_format($cash)),0,0,'R');
      $pdf->Ln();
      $pdf->Cell(100,7,'Kembalian',0,0,'R');
      $pdf->Cell(25,7,str_replace(',','.',number_format($cash-$total)),0,0,'R');
      $pdf->Ln();

      $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      $pdf->Ln();

      $pdf->Output();

      $total = $this->input->post('total');
      $supplier = $this->input->post('id_supplier');
      $tanggal = date('Y-m-d');
      $data = array(
            'tanggal'=>$tanggal,
            'id_supplier'=>$supplier,
            'total'=>$total

      );
      $this->model_transaksi_beli->selesai_belanja($data);
      helper_log("trans_beli","Transaksi Pemasukan Buku");

    }
  }
  function hapusitem(){
    $id = $this->uri->segment(3);
    $this->model_transaksi_beli->hapusitem($id);
    redirect('transaksibeli');
  }
  function selesai_belanja(){

    $tanggal = date('Y-m-d');
    $data = array(
      'tanggal'=>$tanggal

    );

    $this->model_transaksi_beli->selesai_belanja($data);
    redirect('transaksibeli');

  }

  function laporan()
  {
    if(isset($_POST['submit']))
    {
        $tanggal1=  $this->input->post('tanggal1');
        $tanggal2=  $this->input->post('tanggal2');
        $data['record']=  $this->model_transaksi_beli->laporan_periode($tanggal1,$tanggal2);
        $this->template->load('template','transaksibeli/laporan',$data);


    }

    elseif (isset($_POST['cetak'])) {

      $tanggal1=  $this->input->post('tanggal1');
      $tanggal2=  $this->input->post('tanggal2');
      $data['record']=  $this->model_transaksi_beli->laporan_periode($tanggal1,$tanggal2);
      $this->template->load('template','transaksibeli/laporan',$data);

      $this->load->library('cfpdf');
      $pdf=new FPDF('P','mm','A4');
      $pdf->AddPage();
      $pdf->SetFont('Arial','B','C');
      $pdf->SetFontSize(14);
      $pdf->Cell(190, 10, 'LAPORAN TRANSAKSI PEMBELIAN',0,0,'C');
      $pdf->Ln();
      $pdf->Cell(190, 10, 'TOKO BUKU AL-MUMTAZ',0,0,'C');
      $pdf->Ln();

      $pdf->SetFont('Arial','','C');
      $pdf->SetFontSize(10);
      $pdf->Cell(30, 10, 'Tanggal Awal',0,0);
      $pdf->Cell(30, 10, ': '.date('d-M-Y', strtotime($tanggal1)),0,0);
      $pdf->Ln();
      $pdf->Cell(30, 10, 'Tanggal Akhir',0,0);
      $pdf->Cell(30, 10, ': '.date('d-M-Y', strtotime($tanggal2)),0,0);

      $pdf->SetFont('Arial','B','C');
      $pdf->SetFontSize(10);
      $pdf->Cell(10, 10,'','',1);
      $pdf->Cell(10, 7, 'No', 1,0);
      $pdf->Cell(27, 7, 'Tanggal', 1,0);
      $pdf->Cell(30, 7, 'Nama Supplier', 1,0);

      $pdf->Cell(40, 7, 'Total Transaksi', 1,1);
      // tampilkan dari database
      $pdf->SetFont('Arial','','L');
      $data=  $this->model_transaksi_beli->laporan_periode($tanggal1,$tanggal2);
      $no=1;
      $totalall=0;
      foreach ($data->result() as $r)
      {
          $pdf->Cell(10, 7, $no, 1,0,'R');
          $pdf->Cell(27, 7, date('d-M-Y', strtotime($r->tanggal)), 1,0);
          $pdf->Cell(30, 7, $r->nama_supplier, 1,0);

          $pdf->Cell(40, 7, str_replace(',', '.', number_format($r->total)), 1,1,'R');
          $no++;
          $totalall=$totalall+$r->total;
      }
      // end
      $pdf->Cell(67,7,'Total',1,0,'R');
      $pdf->Cell(40,7,str_replace(',', '.', number_format($totalall)),1,0,'R');
      $pdf->Output();
      helper_log("cetak_periode","Mencetak laporan periode");
    }

    elseif (isset($_POST['excel'])) {

      header("Content-type=appalication/vnd.ms-excel");
      header("content-disposition:attachment;filename=laporantransaksi.xls");
      $tanggal1=  $this->input->post('tanggal1');
      $tanggal2=  $this->input->post('tanggal2');
      $data['record']=  $this->model_transaksi_beli->laporan_periode($tanggal1,$tanggal2);

      $this->load->view('transaksibeli/laporan_excel',$data);
    }



    else
    {
        $this->load->model('model_supplier');
        $data['record']=  $this->model_transaksi_beli->laporan_default();
        $data['supplier']= $this->model_supplier->tampil_data()->result();
        $this->template->load('template','transaksibeli/laporan',$data);
    }
  }
}

<?php
class transaksi extends ci_controller{

        function __construct() {
        parent::__construct();
        $this->load->model(array('model_buku','model_transaksi','model_member'));
        chek_session();
    }

    function index()
    {
        $data['buku']=  $this->model_buku->tampil_data();
        if(isset($_POST['submit']))
        {
            $this->model_transaksi->simpan_barang();
            redirect('transaksi');
        }

        elseif (isset($_POST['cetakresi'])) {
          # code...

          $cash = $this->input->post('bayar');
          $tanggal = $this->input->post('tanggal');
          $idpelanggan = $this->input->post('id_member');

          $this->load->model('model_member');
          $pelanggan = $this->model_member->
          get_baris($idpelanggan)->row()->nama;



          $this->load->library('cfpdf');
          $pdf=new FPDF('P','mm','A5');
          $pdf->AddPage();
          $pdf->SetFont('Arial','',10);



      		//
      		// $pdf->Ln();
      		// $pdf->Cell(25, 4, 'Kasir', 0, 0, 'L');
      		// $pdf->Cell(85, 4, 'a', 0, 0, 'L');
      		// $pdf->Ln();
      		// $pdf->Cell(25, 4, 'Pelanggan', 0, 0, 'L');
      		// $pdf->Cell(85, 4, $pelanggan, 0, 0, 'L');
      		// $pdf->Ln();
      		// $pdf->Ln();
          //

          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();
          $pdf->Cell(130, 5, "Toko Buku Al-Mumtaz", 0, 0, 'C');
          $pdf->Ln();
          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();
          $pdf->Cell(25, 4, 'Pelanggan', 0, 0, 'L');
      		$pdf->Cell(85, 4, ': '.$pelanggan, 0, 0, 'L');
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Cell(25, 4, 'Tanggal', 0, 0, 'L');
      		$pdf->Cell(85, 4, ': '.date('d-M-Y', strtotime($tanggal)), 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();
          //$pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
          // $pdf->SetFont('Arial','B','L');
          // $pdf->SetFontSize(10);
          //$pdf->Cell(10, 10,'','',0);
          $pdf->Cell(10, 7, 'No', 0,0);
          // $pdf->Cell(20, 7, 'Tanggal', 0,0);
          $pdf->Cell(45, 7, 'Judul Buku', 0,0);
          //$pdf->Cell(38, 7, 'Total Transaksi', 1,1);
          $pdf->Cell(20, 7, 'Harga', 0,0);
          $pdf->Cell(20, 7, 'Jumlah', 0,0);
          $pdf->Cell(30, 7, 'Total Transaksi', 0,0);
          $pdf->Ln();

          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();

          // tampilkan dari database
          $pdf->SetFont('Arial','','L');
          $data=  $this->model_transaksi->cetak_resi();

          //$this->load->model('model_transaksi');
          $no=1;
          $total=0;


          foreach ($data->result() as $r)
          {

              $pdf->Cell(10, 7, $no, 0,0);
              // $pdf->Cell(20, 7, $r->tanggal, 0,0);
              $pdf->Cell(45, 7, $r->judul_buku, 0,0);
              $pdf->Cell(20, 7, 'Rp. '.str_replace(',','.',number_format($r->harga)), 0,0);
              $pdf->Cell(20, 7, $r->qty, 0,0,'C');
              $pdf->Cell(25, 7, 'Rp. '.str_replace(',','.',number_format($r->total)), 0,0,'R');
              $pdf->Ln();
              $no++;

              $total=$total+$r->total;
          }

          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();
          // end

          $pdf->Cell(95,7,'Total',0,0,'R');
          $pdf->Cell(25,7, 'Rp. '.str_replace(',','.',number_format($total)),0,0,'R');
          $pdf->Ln();



          $diskon = 0;
          if($idpelanggan>0){
            $diskon = $total*0.1;
            $total = $total-$diskon;
          }

          $pdf->Cell(95,7,'Diskon',0,0,'R');
          $pdf->Cell(25,7, 'Rp. '.str_replace(',','.',number_format($diskon)),0,0,'R');
          $pdf->Ln();

          $pdf->Cell(95,7,'Total Bayar',0,0,'R');

          $pdf->Cell(25,7, 'Rp. '.str_replace(',','.',number_format($total)),0,0,'R');
          $pdf->Ln();

          $pdf->Cell(95,7,'Bayar',0,0,'R');
          $pdf->Cell(25,7, 'Rp. '.str_replace(',','.',number_format($cash)),0,0,'R');
          $pdf->Ln();
          $pdf->Cell(95,7,'Kembalian',0,0,'R');
          $pdf->Cell(25,7, 'Rp. '.str_replace(',','.',number_format($cash-$total)),0,0,'R');
          $pdf->Ln();

          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();
          $pdf->Cell(130, 5, "Terimakasih telah berbelanja dengan kami", 0, 0, 'C');
          $pdf->Ln();
          $pdf->Cell(130, 5, '-----------------------------------------------------------------------------------------------------------', 0, 0, 'L');
      		$pdf->Ln();


          $pdf->Output();
        //}

        // elseif (isset($_POST['selesai'])) {
          $total = $this->input->post('total');
          $pelanggan = $this->input->post('id_member');
          $diskon = 0;
          if($pelanggan>0){
            $diskon = $total*0.1;
          }
          $grandtotal = $total-$diskon;

          $tanggal=date('Y-m-d');
          $user=  $this->session->userdata('username');
          $id_op=  $this->db->get_where('operator',array('username'=>$user))->row_array();
          $data=array(
            'operator_id'=>$id_op['operator_id'],
                      'tanggal'=>$tanggal,
                      'total'=>$total,
                      'id_member'=>$pelanggan,
                      'diskon'=>$diskon,
                      'grandtotal'=>$grandtotal
                    );

          $this->model_transaksi->selesai_belanja($data);
          helper_log("trans_jual","Transaksi Penjualan Buku");
          //redirect('transaksi');
        }

        else
        {
            $data['buku']=  $this->model_buku->tampil_data();
            $data['member']=  $this->model_member->tampilall();
            $data['detail']= $this->model_transaksi->tampilkan_detail_transaksi()->result();
            $this->template->load('template','transaksi/form_transaksi',$data);
        }
    }




    function hapusitem()
    {
        $id=  $this->uri->segment(3);
        $this->model_transaksi->hapusitem($id);
        redirect('transaksi');
    }


    function selesai_belanja()
    {

        $tanggal=date('Y-m-d');
        $user=  $this->session->userdata('username');
        $id_op=  $this->db->get_where('operator',array('username'=>$user))->row_array();
        $data=array(
          'operator_id'=>$id_op['operator_id'],
                    'tanggal'=>$tanggal,


                  );

        $this->model_transaksi->selesai_belanja($data);
        helper_log("trans_jual","Transaksi Penjualan Buku");
        redirect('transaksi');
    }


    function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
            $this->template->load('template','transaksi/laporan',$data);


        }

        elseif (isset($_POST['cetak'])) {

          $tanggal1=  $this->input->post('tanggal1');
          $tanggal2=  $this->input->post('tanggal2');
          $data['record']=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
          $this->template->load('template','transaksi/laporan',$data);

          $this->load->library('cfpdf');
          $pdf=new FPDF('P','mm','A4');
          $pdf->AddPage();
          $pdf->SetFont('Arial','B','C');
          $pdf->SetFontSize(14);
          $pdf->Cell(190, 10, 'LAPORAN TRANSAKSI PENJUALAN',0,0,'C');
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
          $pdf->Cell(10, 7, 'No', 1,0,'C');
          $pdf->Cell(27, 7, 'Id Transaksi', 1,0,'C');
          $pdf->Cell(27, 7, 'Tanggal', 1,0,'C');
          $pdf->Cell(40, 7, 'Pelanggan', 1,0,'C');
          $pdf->Cell(40, 7, 'Total', 1,1);

          // $pdf->Cell(40, 7, 'Total Transaksi', 1,1,'C');
          // tampilkan dari database
          $pdf->SetFont('Arial','','L');
          $data=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
          $no=1;
          $totalall=0;
          foreach ($data->result() as $r)
          {
              $pdf->Cell(10, 7, $no, 1,0,'R');
              $pdf->Cell(27, 7, $r->transaksi_id, 1,0);
              $pdf->Cell(27, 7, date('d-M-Y', strtotime($r->tanggal)), 1,0);
              $pdf->Cell(40, 7, $r->nama, 1,0);
              $pdf->Cell(40, 7, str_replace(',', '.', number_format($r->grandtotal)), 1,0,'R'  );
              $pdf->Ln();

              $no++;
              $totalall=$totalall+$r->grandtotal;
          }
          // end
          $pdf->Cell(104,7,'Total',1,0,'R');
          $pdf->Cell(40,7, str_replace(',', '.', number_format($totalall)),1,0,'R');
          $pdf->Output();
          helper_log("cetak_periode","Mencetak laporan periode");
        }


        elseif (isset($_POST['excel'])) {

          header("Content-type=appalication/vnd.ms-excel");
          header("content-disposition:attachment;filename=laporantransaksi.xls");
          $tanggal1=  $this->input->post('tanggal1');
          $tanggal2=  $this->input->post('tanggal2');
          $data['record']=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);

          $this->load->view('transaksi/laporan_excel',$data);
        }



        else
        {
            $this->load->model('model_buku');
            $data['record']=  $this->model_transaksi->laporan_default();
            $data['buku']= $this->model_buku->tampil_data()->result();
            $this->template->load('template','transaksi/laporan',$data);
        }
    }


    function excel()
    {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record']=  $this->model_transaksi->laporan_default();
        $this->load->view('transaksi/laporan_excel',$data);
    }




    function pdf()
    {



        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Judul Buku', 1,0);
        //$pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        $pdf->Cell(40, 7, 'Harga', 1,0);
        $pdf->Cell(40, 7, 'Jumlah', 1,0);
        $pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_transaksi->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {

            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $r->tanggal, 1,0);
            $pdf->Cell(30, 7, $r->judul_buku, 1,0);
            $pdf->Cell(40, 7, $r->harga, 1,0);
            $pdf->Cell(40, 7, $r->qty, 1,0);
            $pdf->Cell(40, 7, $r->total, 1,1);
            $no++;
            $total=$total+$r->total;
        }
        // end
        $pdf->Cell(147,7,'Total',1,0,'R');
        $pdf->Cell(40,7,$total,1,0);
        $pdf->Output();
        helper_log("cetak","Mencetak laporan");
    }


}

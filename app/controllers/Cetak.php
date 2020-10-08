<?php

class Cetak extends Controller
{

    public function index()
    {
        $data['judul'] = "Cetak FRS";
        $data['nim'] = $this->model('Frs_model')->getNim();

        $this->view('Templates/header', $data);
        $this->view('Cetak/index', $data);
        $this->view('Templates/footer');
    }

    public function print()
    {
        require_once 'vendor/autoload.php';

        //Initialize
        $mpdf = new \Mpdf\Mpdf();

        //Halaman
        $html = '<p> test </p>
        
        ';

        $dokumen = "Formulir Rencana Studi.pdf";

        $mpdf->WriteHTML($html);
        $mpdf->Output($dokumen, 'I');
    }
}

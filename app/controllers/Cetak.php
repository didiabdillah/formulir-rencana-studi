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
        $data = $this->model('Cetak_model')->getByNim($_POST);

        require_once 'vendor/autoload.php';

        //Initialize
        $mpdf = new \Mpdf\Mpdf();

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Cetak FRS</title>
        </head>
        <body>
        <h3 style="text-align:center; line-height: 0.5">Formulir Rencana Studi</h3>
        <br>
        <br>
        <table border="1" id="tabelFrs" width="100%" cellspacing="0">

        <tbody> 
        <tr>
        <td width="20%">NIM</td>
        <td width="5%" style="text-align: center">:</td>
        <td></td>
        </tr>
    
        <tr>
        <td width="20%">Nama</td>
        <td width="5%" style="text-align: center">:</td>
        <td></td>
        </tr>
    
        <tr>
        <td rowspan="" width="20%">Mata Kuliah</td>
        <td rowspan="" width="5%" style="text-align: center">:</td>

        //Halaman
        // foreach ($data as $key) {
            <td></td>
        // }
        </tr>';


        $html .= '</tbody>
        </table>
                </body>
                </html>';

        $dokumen = "Formulir Rencana Studi.pdf";

        $mpdf->WriteHTML($html);
        $mpdf->Output($dokumen, 'I');
    }
}

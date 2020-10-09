<?php

class Cetak extends Controller
{

    public function index()
    {
        $data['judul'] = "Cetak FRS";

        //Panggil Data Di Model
        $data['nim'] = $this->model('Frs_model')->getNim();

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Cetak/index', $data);
        $this->view('Templates/footer');
    }

    public function print()
    {
        //Panggil Data Di Model
        $data = $this->model('Cetak_model')->getByNim($_POST);
        $nim = $data[0]->Nim;
        $nama = $data[0]->Nama;
        $iterasi = 0;

        //Menghitung Iterasi
        foreach ($data as $key) {
            $iterasi = $iterasi + 1;
        }

        //Import File Library mPDF
        require_once 'assets/vendor/autoload.php';

        //Initialize
        $mpdf = new \Mpdf\Mpdf();

        //Isi Body Halaman PDF 
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
        <td style="height: 25px" width="20%">NIM</td>
        <td width="5%" style="text-align: center">:</td>
        <td>' . $nim . '</td>
        </tr>
    
        <tr>
        <td style="height: 25px" width="20%">Nama</td>
        <td width="5%" style="text-align: center">:</td>
        <td>' . $nama . '</td>
        </tr>';

        $line = false;
        foreach ($data as $key) {
            $html .= '<tr>';

            if ($line == false) {
                $html .= '<td rowspan="' . $iterasi . '" width="20%">Mata Kuliah</td>';
                $html .= '<td rowspan="' . $iterasi . '" width="5%" style="text-align: center">:</td>';
            }

            $html .= '<td style="height: 25px">' . $key->Matkul . '</td>
              </tr>';
            $line = true;
        }


        $html .= '</tbody>
        </table>
                </body>
                </html>';

        //Nama Output Dokumen
        $dokumen = "Formulir Rencana Studi.pdf";

        //HTML Jadi Halaman PDF
        $mpdf->WriteHTML($html);

        //Generate Output
        $mpdf->Output($dokumen, 'I');
    }
}

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
        $html = '<!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Laporan Keuangan DKM Polindra</title>
         </head>
         <body>

         <h3 style="text-align:center; line-height: 0.5">Laporan Keuangan DKM Polindra</h3>
        <br>
        <br>
         <p style="text-align:left; line-height: 0.5">Periode : ' . $waktu . ' </p>
         
         <table border="1" id="tabelRekapitulasi" width="100%" cellspacing="0">
         <thead>
             <tr style="background-color:#c4e3b5">
                 <th height="50" width="35"> No </th>
                 <th height="50" width="150"> Hari & Tgl </th>
                 <th height="50"> Transaksi </th>
                 <th height="50"> Pemasukan </th>
                 <th height="50"> Pengeluaran </th>
                 <th height="50"> Saldo </th>
             </tr>
         </thead>

         <tbody>';

        if ($dari != NULL && $sampai != NULL || $dari != NULL) {
            if ($dari != NULL && $sampai != NULL) {
                if (strtotime($dari) > strtotime($sampai)) {
                    $html .= '<tr>
                    <th>' . $no . '</th>
                    <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($sampai))) . ", " . date('d', strtotime($sampai)) . " " . month_alias(date('Y-m-d', strtotime($sampai))) . " " . date('Y', strtotime($sampai)) . '</td>
                    <td style="font-size: 11pt" height="35">' . "Saldo Sebelum " . date_indo(date('Y-m-d', strtotime($sampai))) . '</td>';
                } else if (strtotime($dari) < strtotime($sampai)) {
                    $html .= '<tr>
                    <th>' . $no . '</th>
                    <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($dari))) . ", " . date('d', strtotime($dari)) . " " . month_alias(date('Y-m-d', strtotime($dari))) . " " . date('Y', strtotime($dari)) . '</td>
                    <td style="font-size: 11pt" height="35">' . "Saldo Sebelum " . date_indo(date('Y-m-d', strtotime($dari))) . '</td>';
                }
            } else if ($dari != NULL) {
                $html .= '<tr>
                    <th>' . $no . '</th>
                    <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($dari))) . ", " . date('d', strtotime($dari)) . " " . month_alias(date('Y-m-d', strtotime($dari))) . " " . date('Y', strtotime($dari)) . '</td>
                    <td style="font-size: 11pt" height="35">' . "Saldo Sebelum " . date_indo(date('Y-m-d', strtotime($dari))) . '</td>';
            }

            $html .= '<td style="font-size: 11pt" height="35">Rp. ' . number_format($saldoSebelumnya) . '</td>
            <td style="font-size: 11pt" height="35">-</td>
            <td style="font-size: 11pt" height="35">Rp. ' . number_format($saldoSebelumnya) . '</td></tr>';
        }

        foreach ($cetakRekapitulasi as $row) {
            if ($dari != NULL && $sampai != NULL || $dari != NULL) {
                $html .= '<tr>
                <th>' . ++$no . '</th>
                <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($row["tanggal"]))) . ", " . date('d', strtotime($row["tanggal"])) . " " . month_alias(date('Y-m-d', strtotime($row["tanggal"]))) . " " . date('Y', strtotime($row["tanggal"])) . '</td>
                <td style="font-size: 11pt" height="35">' . $row["transaksi"] . '</td>';
            } else {
                $html .= '<tr>
                <th>' . $no++ . '</th>
                <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($row["tanggal"]))) . ", " . date('d', strtotime($row["tanggal"])) . " " . month_alias(date('Y-m-d', strtotime($row["tanggal"]))) . " " . date('Y', strtotime($row["tanggal"])) . '</td>
                <td style="font-size: 11pt" height="35">' . $row["transaksi"] . '</td>';
            }

            if ($row["pemasukan"] != NULL) {
                $html .= '<td style="font-size: 11pt" height="35">Rp ' . number_format($row["pemasukan"]) . '</td>';
            } else {
                $html .= '<td style="font-size: 11pt" height="35">-</td>';
            }

            if ($row["pengeluaran"] != NULL) {
                $html .= '<td style="font-size: 11pt" height="35">Rp ' . number_format($row["pengeluaran"]) . '</td>';
            } else {
                $html .= '<td style="font-size: 11pt" height="35">-</td>';
            }

            $saldo = $saldo + $row["pemasukan"] - $row["pengeluaran"];

            $html .= '<td style="font-size: 11pt" height="35">Rp ' . number_format($saldo) . '</td>
            </tr>';

            if ($row["jenis"] == "Kas Masuk") {
                $totalPemasukan += $row["pemasukan"];
            } else if ($row["jenis"] == "Kas Keluar") {
                $totalPengeluaran += $row["pengeluaran"];
            }
        }

        if ($dari != NULL && $sampai != NULL || $sampai != NULL) {
            $totalSaldo = $totalPemasukan - $totalPengeluaran + $saldoSesudahnya;
            $totalPemasukan = $totalPemasukan + $saldoSesudahnya;
            if ($dari != NULL && $sampai != NULL) {
                if (strtotime($dari) > strtotime($sampai)) {
                    $html .= '<tr>
                <th>' . ++$no . '</th>
                <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($dari))) . ", " . date('d', strtotime($dari)) . " " . month_alias(date('Y-m-d', strtotime($dari))) . " " . date('Y', strtotime($dari)) . '</td>
                <td style="font-size: 11pt" height="35">' . "Saldo Setelah " . date_indo(date('Y-m-d', strtotime($dari))) . '</td>';
                } else if (strtotime($dari) < strtotime($sampai)) {
                    $html .= '<tr>
                <th>' . ++$no . '</th>
                <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($sampai))) . ", " . date('d', strtotime($sampai)) . " " . month_alias(date('Y-m-d', strtotime($sampai))) . " " . date('Y', strtotime($sampai)) . '</td>
                <td style="font-size: 11pt" height="35">' . "Saldo Setelah " . date_indo(date('Y-m-d', strtotime($sampai))) . '</td>';
                }
            } else if ($sampai != NULL) {
                $html .= '<tr>
            <th>' . $no . '</th>
            <td style="font-size: 11pt" height="35">' . day_indo(date('N', strtotime($sampai))) . ", " . date('d', strtotime($sampai)) . " " . month_alias(date('Y-m-d', strtotime($sampai))) . " " . date('Y', strtotime($sampai)) . '</td>
            <td style="font-size: 11pt" height="35">' . "Saldo Setelah " . date_indo(date('Y-m-d', strtotime($sampai))) . '</td>';
            }

            $html .= '<td style="font-size: 11pt" height="35">Rp. ' . number_format($saldoSesudahnya) . '</td> <td  style="font-size: 11pt " height="35">-</td>';

            $html .= '<td style="font-size: 11pt" height="35">Rp. ' . number_format($totalSaldo) . '</td></tr>';
        } else {
            $totalSaldo = $totalPemasukan - $totalPengeluaran;
        }

        $html .= '</tbody>
            <tr>
            <td colspan="3" class="text-center" style="text-align: center"><b>Total</b></td>
            <td colspan="" style="font-size: 11pt " height="35">Rp ' . number_format($totalPemasukan) . '</td>
           
            <td colspan="" style="font-size: 11pt">Rp ' . number_format($totalPengeluaran) . '</td>
         
            <td colspan="" style="font-size: 11pt"><b>Rp ' . number_format($totalSaldo) . '</b></td>
            </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>

            <table border="0" id="tabelRekapitulasi" width="100%" cellspacing="0">
            <tr>
            <td width="35%">
            <p style="line-height: 0.5"></p>
            <p style="line-height: 0.5">Bendahara DKM POLINDRA,</p>
            <br>
            <br>
            <br>
            <br>
            <p style="line-height: 2.5">' . $Bendahara . '</p>
            </td>
            <td width="30%"></td>
            <td>
            <p style="line-height: 0.5">Indramayu, ' . date_indo(date('Y-m-d')) . '</p>
            <p style="line-height: 0.5">Ketua DKM POLINDRA,</p>
            <br>
            <br>
            <br>
            <br>
            <p style="line-height: 2.5">' . $Ketua . '</p>
            </td>
            </tr>
            </table>

         </body>
         </html>';

        $replace = periode_replace($periode);
        $dokumen = "Laporan Keuangan " . $replace . ".pdf";

        $mpdf->WriteHTML($html);
        $mpdf->Output($dokumen, 'I');
    }
}

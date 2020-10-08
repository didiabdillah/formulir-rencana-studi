<?php

class Cetak extends Controller
{

    public function index()
    {
        $data['judul'] = "Cetak Transaksi";
        // $data['barang'] = $this->model('Barang_model')->getAllBarang();

        $this->view('Templates/header', $data);
        $this->view('Cetak/index', $data);
        $this->view('Templates/footer');
    }

    public function print()
    {
        require_once 'vendor/autoload.php';

        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();
    }
}

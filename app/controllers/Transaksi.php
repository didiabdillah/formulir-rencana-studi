<?php

class Transaksi extends Controller
{

    public function index()
    {
        $data['judul'] = "Transaksi";
        $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();

        $this->view('Templates/header', $data);
        $this->view('Transaksi/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Transaksi";

        $this->view('Templates/header', $data);
        $this->view('Transaksi/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        if ($this->model('Transaksi_model')->tambahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Transaksi";
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiById($id);

        $this->view('Templates/header', $data);
        $this->view('Transaksi/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Transaksi_model')->ubahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('Transaksi_model')->hapusDataTransaksi($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'transaksi');
            exit;
        }
    }
}

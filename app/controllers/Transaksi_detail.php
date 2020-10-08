<?php

class Transaksi_detail extends Controller
{

    public function index()
    {
        $data['judul'] = "Transaksi Detail";
        $data['transaksi'] = $this->model('Transaksi_detail_model')->getAllTransaksi();

        $this->view('Templates/header', $data);
        $this->view('Transaksi_detail/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Transaksi Detail";

        $this->view('Templates/header', $data);
        $this->view('Transaksi_detail/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        if ($this->model('Transaksi_detail_model')->tambahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Transaksi Detail";
        $data['transaksi'] = $this->model('Transaksi_detail_model')->getTransaksiById($id);

        $this->view('Templates/header', $data);
        $this->view('Transaksi_detail/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Transaksi_detail_model')->ubahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('Transaksi_detail_model')->hapusDataTransaksi($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'transaksi_detail');
            exit;
        }
    }
}

<?php

class Frs extends Controller
{

    public function index()
    {
        $data['judul'] = "Transaksi Detail";
        $data['transaksi'] = $this->model('Frs_model')->getAllTransaksi();

        $this->view('Templates/header', $data);
        $this->view('Frs/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Transaksi Detail";

        $this->view('Templates/header', $data);
        $this->view('Frs/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        if ($this->model('Frs_model')->tambahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'frs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'frs');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Transaksi Detail";
        $data['transaksi'] = $this->model('Frs_model')->getTransaksiById($id);

        $this->view('Templates/header', $data);
        $this->view('Frs/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Frs_model')->ubahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'frs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'frs');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('Frs_model')->hapusDataTransaksi($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'frs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'frs');
            exit;
        }
    }
}

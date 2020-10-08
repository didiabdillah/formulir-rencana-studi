<?php

class Barang extends Controller
{

    public function index()
    {
        $data['judul'] = "Barang";
        $data['barang'] = $this->model('Barang_model')->getAllBarang();

        $this->view('Templates/header', $data);
        $this->view('Barang/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Barang";

        $this->view('Templates/header', $data);
        $this->view('Barang/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        if ($this->model('Barang_model')->tambahDataBarang($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'barang');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Barang";
        $data['barang'] = $this->model('Barang_model')->getBarangById($id);

        $this->view('Templates/header', $data);
        $this->view('Barang/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Barang_model')->ubahDataBarang($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'barang');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('Barang_model')->hapusDataBarang($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'barang');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'barang');
            exit;
        }
    }
}

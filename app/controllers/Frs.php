<?php

class Frs extends Controller
{

    public function index()
    {
        $data['judul'] = "Frs";
        $data['frs'] = $this->model('Frs_model')->getAllFrs();

        $this->view('Templates/header', $data);
        $this->view('Frs/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Frs";

        $this->view('Templates/header', $data);
        $this->view('Frs/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        if ($this->model('Frs_model')->tambahDataFrs($_POST) > 0) {
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
        $data['judul'] = "Edit Frs";
        $data['frs'] = $this->model('Frs_model')->getFrsById($id);

        $this->view('Templates/header', $data);
        $this->view('Frs/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        if ($this->model('Frs_model')->ubahDataFrs($_POST) > 0) {
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
        if ($this->model('Frs_model')->hapusDataFrs($id) > 0) {
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

<?php

class Frs extends Controller
{

    public function index()
    {
        $data['judul'] = "Frs";

        //Panggil Data Di Model
        $data['frs'] = $this->model('Frs_model')->getAllFrs();

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Frs/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Frs";

        //Panggil Data Di Model
        $data['nim'] = $this->model('Frs_model')->getNim();
        $data['kode_matkul'] = $this->model('Frs_model')->getKodeMatkul();

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Frs/tambah', $data);
        $this->view('Templates/footer');
    }

    public function store()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
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

        //Panggil Data Di Model
        $data['frs'] = $this->model('Frs_model')->getFrsById($id);
        $data['nim'] = $this->model('Frs_model')->getNim();
        $data['kode_matkul'] = $this->model('Frs_model')->getKodeMatkul();

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Frs/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
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
        //Mengecek Adakah Baris Yang Bertambah/Berubah
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

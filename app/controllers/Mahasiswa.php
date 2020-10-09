<?php

class Mahasiswa extends Controller
{

    public function index()
    {

        $data['judul'] = "Mahasiswa";

        //Panggil Data Di Model
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Mahasiswa";

        //Panggil View
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Mahasiswa";

        //Panggil Data Di Model
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        //Panggi View
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function destroy($id)
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }
}

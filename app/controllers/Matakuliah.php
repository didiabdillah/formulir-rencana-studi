<?php

class Matakuliah extends Controller
{

    public function index()
    {
        $data['judul'] = "Mata Kuliah";

        //Panggil Data Di Model
        $data['matakuliah'] = $this->model('Matakuliah_model')->getAllMatakuliah();

        //Panggi View
        $this->view('Templates/header', $data);
        $this->view('Matakuliah/index', $data);
        $this->view('Templates/footer');
    }

    public function insert()
    {
        $data['judul'] = "Tambah Mata Kuliah";

        //Panggi View
        $this->view('Templates/header', $data);
        $this->view('Matakuliah/tambah');
        $this->view('Templates/footer');
    }

    public function store()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Matakuliah_model')->tambahDataMatakuliah($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Mata Kuliah";

        //Panggil Data Di Model
        $data['matakuliah'] = $this->model('Matakuliah_model')->getMatakuliahById($id);

        //Panggi View
        $this->view('Templates/header', $data);
        $this->view('Matakuliah/edit', $data);
        $this->view('Templates/footer');
    }

    public function update()
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Matakuliah_model')->ubahDataMatakuliah($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        }
    }

    public function destroy($id)
    {
        //Mengecek Adakah Baris Yang Bertambah/Berubah
        if ($this->model('Matakuliah_model')->hapusDataMatakuliah($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . 'matakuliah');
            exit;
        }
    }
}

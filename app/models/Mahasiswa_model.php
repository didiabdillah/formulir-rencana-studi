<?php

class Mahasiswa_model
{
    protected $table = "mahasiswa";

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                  ('', :nim, :nama, :gender, :tgl_lahir, :thn_masuk)";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('thn_masuk', $data['thn_masuk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nim = :nim,
                    nama = :nama,
                    gender = :gender,
                    tanggal_lahir = :tgl_lahir, 
                    tahun_masuk = :thn_masuk 
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('thn_masuk', $data['thn_masuk']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

<?php

class Mahasiswa_model
{
    //Property
    protected $table = "mahasiswa";

    private $db;

    public function __construct()
    {
        //Inisialisasi Class Database
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama ASC');

        //Execute, Return
        return $this->db->resultSet();
    }

    public function tambahDataMahasiswa($data)
    {
        //Query
        $query = "INSERT INTO mahasiswa
                    VALUES
                  (:nim, :nama, :gender, :tgl_lahir, :thn_masuk)";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('thn_masuk', $data['thn_masuk']);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }

    public function getMahasiswaById($id)
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nim=:id');
        $this->db->bind('id', $id);

        //Execute, Return
        return $this->db->single();
    }

    public function ubahDataMahasiswa($data)
    {
        //Query
        $query = "UPDATE mahasiswa SET
                    nim = :nim,
                    nama = :nama,
                    gender = :gender,
                    tanggal_lahir = :tgl_lahir, 
                    tahun_masuk = :thn_masuk 
                    WHERE nim = :id";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('thn_masuk', $data['thn_masuk']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        //Query
        $query = "DELETE FROM mahasiswa WHERE nim= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }
}

<?php

class Matakuliah_model
{
    //Property
    protected $table = "matakuliah";

    private $db;

    public function __construct()
    {
        //Inisialisasi Class Database
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY kode_matakuliah ASC');

        //Execute, Return
        return $this->db->resultSet();
    }

    public function tambahDataMatakuliah($data)
    {
        //Query
        $query = "INSERT INTO matakuliah
                    VALUES
                  (:kode, :nama)";

        $this->db->query($query);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }

    public function getMatakuliahById($id)
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_matakuliah=:kode');
        $this->db->bind('kode', $id);

        //Execute, Return
        return $this->db->single();
    }

    public function ubahDataMatakuliah($data)
    {
        //Query
        $query = "UPDATE " . $this->table . " SET
                    kode_matakuliah = :kode,
                    nama_matakuliah = :nama
                    WHERE kode_matakuliah = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }

    public function hapusDataMatakuliah($id)
    {
        //Query
        $query = "DELETE FROM matakuliah WHERE kode_matakuliah= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }
}

<?php

class Cetak_model
{
    protected $table = "mahasiswa";
    protected $table2 = "matakuliah";
    protected $table3 = "frs";

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

    public function getNim()
    {
        $this->db->query('SELECT * FROM ' . $this->table2);

        return $this->db->resultSet();
    }

    public function getByNim($data)
    {
        $this->db->query("SELECT m.nim as Nim, m.nama as Nama, mk.nama_matakuliah Matkul 
            FROM frs as f
            INNER JOIN matakuliah mk ON f.kode_Matkul = mk.kode_matakuliah
            INNER JOIN mahasiswa m ON f.nim = m.nim 
            WHERE f.nim = " . $data["nim"] . "
            ORDER BY mk.kode_matakuliah");

        return $this->db->resultSet();
    }
}

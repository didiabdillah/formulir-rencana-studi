<?php

class Cetak_model
{
    //Property
    protected $table = "mahasiswa";
    protected $table2 = "matakuliah";
    protected $table3 = "frs";

    private $db;

    public function __construct()
    {
        //Inisialisasi Class Database
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table);

        //Execute, Return
        return $this->db->resultSet();
    }

    public function getNim()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table2);

        //Execute, Return
        return $this->db->resultSet();
    }

    public function getByNim($data)
    {
        //Query
        $this->db->query("SELECT m.nim as Nim, m.nama as Nama, mk.nama_matakuliah Matkul 
            FROM frs as f
            INNER JOIN matakuliah mk ON f.kode_Matkul = mk.kode_matakuliah
            INNER JOIN mahasiswa m ON f.nim = m.nim 
            WHERE f.nim = " . $data["nim"] . "
            ORDER BY mk.kode_matakuliah");

        //Execute, Return
        return $this->db->resultSet();
    }
}

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
}

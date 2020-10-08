<?php

class Barang_model
{
    protected $table = "barang";
    protected $table2 = "transaksi";
    protected $table3 = "transaksi_detil";

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }
}

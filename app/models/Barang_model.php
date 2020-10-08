<?php

class Barang_model
{
    protected $table = "barang";

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

    public function tambahDataBarang($data)
    {
        $query = "INSERT INTO barang
                    VALUES
                  ('', :kode_barang, :nama_barang, :satuan, :harga)";

        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kode']);
        $this->db->bind('nama_barang', $data['nama']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataBarang($data)
    {
        $query = "UPDATE barang SET
                    kode_barang = :kode_barang,
                    nama_barang = :nama_barang,
                    satuan = :satuan,
                    harga = :harga 
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kode']);
        $this->db->bind('nama_barang', $data['nama']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBarang($id)
    {
        $query = "DELETE FROM barang WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

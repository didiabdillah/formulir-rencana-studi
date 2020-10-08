<?php

class Transaksi_detail_model
{
    protected $table = "transaksi_detil";

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function tambahDataTransaksi($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES
                  ('', :no, :kode, :qty, :sub)";

        $this->db->query($query);
        $this->db->bind('no', $data['no']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('sub', $data['sub']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataTransaksi($data)
    {
        $query = "UPDATE " . $this->table . " SET
                    no_transaksi = :no,
                    kode_barang = :kode,
                    qty = :qty,
                    sub_total = :sub
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('no', $data['no']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('sub', $data['sub']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataTransaksi($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

<?php

class Transaksi_model
{
    protected $table = "transaksi";

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
        $query = "INSERT INTO transaksi
                    VALUES
                  (:no, :waktu, :total)";

        $this->db->query($query);
        $this->db->bind('waktu', date('Y-m-d H:i:s'));
        $this->db->bind('no', $data['no']);
        $this->db->bind('total', $data['total']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE no_transaksi=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataTransaksi($data)
    {
        $query = "UPDATE " . $this->table . " SET
                    no_transaksi = :id,
                    waktu_transaksi = :waktu,
                    total_transaksi = :total
                    WHERE no_transaksi = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('total', $data['total']);
        $this->db->bind('waktu', date('Y-m-d H:i:s'));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataTransaksi($id)
    {
        $query = "DELETE FROM transaksi WHERE no_transaksi= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

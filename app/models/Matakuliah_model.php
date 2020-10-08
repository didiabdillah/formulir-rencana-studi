<?php

class Matakuliah_model
{
    protected $table = "matakuliah";

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function tambahDataMatakuliah($data)
    {
        $query = "INSERT INTO matakuliah
                    VALUES
                  ('', :kode, :nama)";

        $this->db->query($query);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMatakuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE no_transaksi=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataMatakuliah($data)
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

    public function hapusDataMatakuliah($id)
    {
        $query = "DELETE FROM transaksi WHERE no_transaksi= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

<?php

class Frs_model
{
    protected $table = "frs";
    protected $table2 = "mahasiswa";
    protected $table3 = "matakuliah";

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNim()
    {
        $this->db->query('SELECT * FROM ' . $this->table2);

        return $this->db->resultSet();
    }

    public function getKodeMatkul()
    {
        $this->db->query('SELECT * FROM ' . $this->table3);

        return $this->db->resultSet();
    }

    public function getAllFrs()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function tambahDataFrs($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES
                  ('', :no, :nim, :kode, :tahun)";

        $this->db->query($query);
        $this->db->bind('no', $data['no_frs']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('tahun', $data['tahun']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getFrsById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataFrs($data)
    {
        $query = "UPDATE " . $this->table . " SET
                    no_frs = :no,
                    nim = :nim,
                    kode_matkul = :kode,
                    tahun_akademik = :tahun
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('no', $data['no_frs']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('tahun', $data['tahun']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataFrs($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

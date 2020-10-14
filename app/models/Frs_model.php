<?php

class Frs_model
{
    //Property
    protected $table = "frs";
    protected $table2 = "mahasiswa";
    protected $table3 = "matakuliah";

    private $db;

    public function __construct()
    {
        //Inisialisasi Class Database
        $this->db = new Database;
    }

    public function getNim()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table2);

        //Execute, Return
        return $this->db->resultSet();
    }

    public function getKodeMatkul()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table3);

        //Execute, Return
        return $this->db->resultSet();
    }

    public function getAllFrs()
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nim ASC');

        //Execute, Return
        return $this->db->resultSet();
    }

    public function tambahDataFrs($data)
    {
        //Query
        $query = "INSERT INTO " . $this->table . " VALUES
                  ('', :no, :nim, :kode, :tahun)";

        $this->db->query($query);
        $this->db->bind('no', $data['no_frs']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('tahun', $data['tahun']);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }

    public function getFrsById($id)
    {
        //Query
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);

        //Execute, Return
        return $this->db->single();
    }

    public function ubahDataFrs($data)
    {
        //Query
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

        //Execute, Return
        return $this->db->rowCount();
    }

    public function hapusDataFrs($id)
    {
        //Query
        $query = "DELETE FROM " . $this->table . " WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        //Execute, Return
        return $this->db->rowCount();
    }
}

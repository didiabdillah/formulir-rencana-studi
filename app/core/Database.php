<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    //Database Handler
    private $dbh;

    //Statement
    private $stmt;

    public function __construct()
    {
        //Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        //Untuk Mengoptimasi Koneksi Ke Database
        $options = [
            PDO::ATTR_PERSISTENT => true,  //Agar Koneksinya Terjaga Terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Untuk Mode Error Menampilkan Exception
        ];


        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Fungsi untuk menjalankan Query
    public function query($query)
    {
        //Persiapan
        $this->stmt = $this->dbh->prepare($query);
    }

    //Binding Data Atau Parameternya
    public function bind($param, $value, $type = NULL)
    {
        //Menentukan Tipe Data variabel Parameter $type
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

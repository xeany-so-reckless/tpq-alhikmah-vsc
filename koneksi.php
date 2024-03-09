<?php 
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "tpqalhikmah";
    public $connection;

    //KONEKSI KE DATABASE

    public function getConnection(){
        try{
            $this->connection = new mysqli($this->host, $this->username, $this->password);
        } catch(mysqli_sql_exception $exception){
            echo "KONEKSI GAGAL:"  . $exception->getMessage();
        }

        $createDB = "CREATE DATABASE IF NOT EXISTS $this->database";
        $this->connection->query($createDB);
        $this->connection->select_db($this->database);

        $operator = "CREATE TABLE IF NOT EXISTS operator (
            username VARCHAR(50) PRIMARY KEY,
            password VARCHAR(255)
            )";
        $this->connection->query($operator);
        // $operator = "INSERT INTO operator
        //     (username, password) VALUES
        //       ('admin','12345')
        //     ;";
        // $this->connection->query($operator);

        $santri ="CREATE TABLE IF NOT EXISTS santri (
            id_santri INT PRIMARY KEY AUTO_INCREMENT,
            nama_santri VARCHAR(50),
            kelas_santri VARCHAR(30),
            jenis_kelamin VARCHAR(30)
            )";
        $this->connection->query($santri);
        // $santri = "INSERT INTO santri
        //     (nama_santri, kelas_santri, jenis_kelamin) VALUES
        //       ('FARHAN MAULANA','Jilid 1','Laki-laki'),
        //       ('AHMAD ROVI','Jilid 2','Laki-laki'),
        //       ('NABILA','Jilid 3','Perempuan'),
        //       ('ROY MUHAMMAD','Jilid 4','Laki-laki'),
        //       ('VICKY YAYAYAYAY','Jilid 5','Laki-laki')
        //     ;";
        // $this->connection->query($santri);

        return $this->connection;
    }
}
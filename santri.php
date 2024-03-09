<?php
class Santri{
    public $connection;
    private $table_name = "santri";

    //OBJEK PROPERTIES
    public $id;
    public $nama;
    public $kelas;
    public $jenis_kelamin;


    public function __construct($connection){
        $this->connection = $connection;
    }

    public function tambah($sql) {
        $nama = $sql['nama_santri'];
        $kelas = $sql['kelas_santri'];
        $jenis_kelamin = $sql['jenis_kelamin'];


       mysqli_query($this->connection, "INSERT INTO " . $this->table_name . " (nama_santri, kelas_santri, jenis_kelamin) VALUES ('$nama', '$kelas', '$jenis_kelamin')");
       return mysqli_affected_rows($this->connection);
    }
}
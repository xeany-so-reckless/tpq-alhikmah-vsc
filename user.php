<?php
class User{
    public $connection;
    private $table_name = "operator";

    //OBJEK PROPERTIES
    public $id;
    public $username;
    public $password;


    public function ___construct($connection){
        $this->connection = $connection;
    }

    public function tambah($sql) {

        $nama = $sql['nama_santri'];
        $kelas = $sql['kelas_santri'];
        $jeniskelamin = $sql['jenis_kelamin'];
        var_dump($this->connection);
        mysqli_query($this->connection, "INSERT INTO santri
                        VALUES('', '$nama', '$kelas', '$jeniskelamin',)");

        return mysqli_affected_rows($this->connection);

        $query = "INSERT INTO santri (username, password) VALUES (?, ?)" ;
        $stmt = $this->connection->prepare($query);

        //BIND VALUES
        $stmt->bind_param("ss", $this->username, $this->password);

        if($stmt->execute()){
            return true;
        }
        return false;

    }

    //FUNGSI REGISTER USER
    public function register(){
        $query = "INSERT INTO " . $this->table_name . "(username, password) VALUES (?, ?)" ;
        $stmt = $this->connection->prepare($query);

        //BIND VALUES
        $stmt->bind_param("ss", $this->username, $this->password);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    //FUNGSI LOGIN USER
    public function login(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND password = ?";
        $stmt = $this->connection->prepare($query);

        //BIND VALUES
        $stmt->bind_param("ss" , $this->username, $this->password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows >0){
            return true;
        }
        return false;
    }
}
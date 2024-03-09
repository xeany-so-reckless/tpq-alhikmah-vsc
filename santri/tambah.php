<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../koneksi.php';

$database = new Database();
$connection = $database->getConnection();

//MEMANGGIL  SANTRI
include '../santri.php';
$santriClass = new Santri($connection);
//JIKA TOMBOL SAVE DITEKAN
if(isset($_POST['simpan'])) {
    if($santriClass->tambah($_POST) > 0) {
        echo "<script>
                alert('Apakah anda yakin ingin menyimpan data ini?');
                document.location.href = 'index.php';
            </script>";
    }else {
        echo mysqli_error($db->connection);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="h2 me-auto">Tambah Santri</h1>
    <form action="" method="post">
        
        <label for="">Nama Santri</label>
        <input class="form-control" type="text" name="nama_santri" id="" aria-label="default input example"><br>
        <label for="">Kelas Santri</label>
        <input class="form-control" type="text" name="kelas_santri" id="" aria-label="default input example"><br>
        <label for="">Jenis Kelamin</label>
        <input class="form-control" type="text" name="jenis_kelamin" id="" aria-label="default input example"><br>

        <button type="submit" name="simpan" class="btn btn-primary">Save</button> 
        
    </form>
    </div>  
</body>
</html>
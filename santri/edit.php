<?php
require_once "../koneksi.php";
$koneksi =mysqli_connect("localhost", "root", "", "tpqalhikmah");

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {

        $rows[]= $row;
    }

    return $rows;
}

function edit($datasantri){
    global $koneksi;

    $id = $datasantri["id_santri"];
    $nama = htmlspecialchars($datasantri["nama_santri"]);
    $kelas = htmlspecialchars($datasantri["kelas_santri"]);
    $kelamin = htmlspecialchars($datasantri["jenis_kelamin"]);

    $query = "UPDATE santri SET
                        nama_santri ='$nama',
                        kelas_santri ='$kelas',
                        jenis_kelamin = '$kelamin'
                        WHERE id_santri = $id
    ";

    mysqli_query($koneksi, $query);
return mysqli_affected_rows($koneksi);

}
?>



<?php

$id= $_GET["id"];

$santri = query("SELECT * FROM santri WHERE id_santri = $id")[0];

if (isset($_POST["submit"])){

    if(edit($_POST) > 0){
        echo "
        <script>
            alert('Data Berhasil di Ubah');
            document.location.href ='index.php'
        </script>
";
    }   else {
        echo "
        <script>
            alert('Data Gagal Diubah');
            document.location.href ='index.php';
        </script>
";

    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Ubah Data Santri</h1>
    <form action="" method="post">
        <input type="hidden" name="id_santri" value="<?php echo $santri["id_santri"];?>";>
       
            
                <label for="nama">Nama</label>
                <input class="form-control" type="text" name="nama_santri" id="nama" required value="<?php echo $santri["nama_santri"];?>"><br>
                <label for="kelas">Kelas</label>
                <input class="form-control" type="text" name="kelas_santri" id="kelas" required value="<?php echo $santri["kelas_santri"];?>"><br>
                <label for="jeniskelamin">Jenis Kelamin</label>
                <input class="form-control" type="text" name="jenis_kelamin" id="kelamin" required value="<?php echo $santri["jenis_kelamin"];?>"><br>
            
                <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
            
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
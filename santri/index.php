<?php
//KONEKSI KE DATABASE
include_once '../koneksi.php';



$database = new Database();
$connection = $database->getConnection();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFIL TPQ</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-color">
    <nav>
        <div class="nav__content">
            <div class="logo">TPQ AL-HIKMAH</div>
            <ul>
                <li><a href="#nav">Home</a></li>
                <li><a href="#tabelsantri">Santri</a></li>
                <li><a href="../login.php" class="btn btn-danger" onclick="
                        return confirm('yakin mau keluar ?');">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <section class="section" id="nav">
        <div class="section__container">
            <div class="content">
                <h2 class="title">TPQ AL-HIKMAH</h2>
                <h5>Dusun Kedungsari Desa Kendalsari</h5>
                <p>I am a front-end developer. I can provide clean code and pixel
                    perfect design. I also make the website more & more interactive with web
                    animations.I canI am a front-end developer. I can provide clean code and pixel
                    perfect design. I also make the website more & more interactive with web
                    animations.I can
                </p>
            </div>
            <div class="image">
                <img src="../assets/gambar.png" alt="profile">
            </div>
        </div>
    </section>
    <div class="tambah">
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <section id="tabelsantri" class="tabel">
        <center>
            <table class="table table-striped">
                </table>
                <table border="1" cellspacing="8" cellpadding="8" class="tabel1">
                <tr>
                    <th>ID SANTRI</th>
                    <th width="200x">NAMA SANTRI</th>
                    <th>KELAS SANTRI </th>
                    <th width="200x">JENIS KELAMIN</th>
                    <th width="200x">OPSI</th>
                </tr>

                <?php
                $querySantri = $connection->query("SELECT * FROM santri");
                while ($data_santri = $querySantri->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= $data_santri['id_santri'] ?></td>
                        <td><?= $data_santri['nama_santri'] ?></td>
                        <td><?= $data_santri['kelas_santri'] ?></td>
                        <td><?= $data_santri['jenis_kelamin'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data_santri["id_santri"]; ?>" class="btn btn-primary">edit</a>
                            
                            <a href="hapus.php?id=<?php echo $data_santri["id_santri"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data ini?');">hapus</a>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </center>
    </section>

    <div class="footer">
        <div class="container">
            <h5> <small>WhatsApp </small></h5>
            <p> <small>085161596229</small></p>
            <h5> <small>Alamat </small></h5>
            <p><small>Dusun Kedungsari rt 02 rw 01</small></p>

            <small>Copyright 2023  TPQ AL-HIKMAH</small>
        </div>
    </div>

</body>

</html>
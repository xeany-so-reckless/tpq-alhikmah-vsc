<?php
require_once "../koneksi.php";
$koneksi =mysqli_connect("localhost", "root", "", "tpqalhikmah");

function hapus($data_santri) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM santri WHERE id_santri = $data_santri");

    return mysqli_affected_rows($koneksi);    
}


$data_santri = $_GET["id"];

if( hapus($data_santri) >0 ) {
    echo "
    <script>
        alert('Data berhasil dihapus !');
        document.location.href = 'index.php';
        </script>
        ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus !');
        document.location.href = 'index.php';
        </script>
        ";
}
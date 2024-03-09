<?php
//KONEKSI KE DATABASE
include_once 'koneksi.php';

$database = new Database();
$connection = $database->getConnection();

//MEMANGGIL CLASS USER
include_once 'user.php';
$user = new User($connection);
//JIKA TOMBOL REGISTER DITEKAN
if (isset($_POST['register'])) {
    $user->username = $_POST['username_ui'];
    $user->password = $_POST['password_ui'];

    if ($user->register()) {
        echo "<script>alert('Regritasi berhasil')";
    } else {
        echo "Regristasi gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASUK</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <h2>SIGN UP</h2>
        <!--Form login-->
        <form method="post" action="login.php">

            <div class="txt_field">
                <input type="text" name="username_ui" required>
                <span></span>
                <label>Username</label>

            </div>
            <div class="txt_field">
                <input type="password" name="password_ui" required>
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" name="register" value="daftar">
            <div class="signup_link">
                <a href="login.php">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
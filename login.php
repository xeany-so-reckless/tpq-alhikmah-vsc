<?php
//KONEKSI KE DATABASE
include_once 'koneksi.php';

$database = new Database();
$connection = $database->getConnection();

//MEMANGGIL CLASS USER
include_once 'user.php';
$user = new User();
$user->connection = $connection;
// var_dump($connection);
//JIKA TOMBOL REGISTER DITEKAN
if (isset($_POST['register'])) {
    $user->username = $_POST['username_ui'];
    $user->password = $_POST['password_ui'];

    if ($user->register()) {
        echo "REGISTRASI BERHASIL";
    } else{
        echo "REGISTRASI GAGAL!";
    }
}

//JIKA TOMBOL LOGIN DITEKAN
if (isset($_POST['login'])) {
    $user->username = $_POST['username_log'];
    $user->password = $_POST['password_log'];

    if ($user->login()) {
        echo "LOGIN BERGASIL";
        header("location: santri/index.php");
    } else {
        echo "LOGIN GAGAL!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png" href="/assets/gambarkecil.png">
    <title>LOGIN TPQ </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <h2>SILAHKAN LOGIN</<h2>
        <!-- FORM LOGIN-->
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username_log" required>
                <span></span>
                <label>Username</label>

            </div>
            <div class="txt_field">
                <input type="password" name="password_log" required>
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" value="Login" name="login">
            <div class="signup_link">
                <a href="Signup.php">Belum punya akun?</a>
            </div>

        </form>
    </div>
</body>

</html>

    
</body>
</html>
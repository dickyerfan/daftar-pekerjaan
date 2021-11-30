<?php

session_start();
// $con = mysqli_connect("localhost", "root", "", "daftar_pekerjaan");
require 'function.php';
$username = $_SESSION['username'];

if (isset($_POST['reset'])) {
    // $username = $_POST['username'];
    $passwordbaru = $_POST['passwordbaru'];
    $passwordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);
    $passwordconfirm = $_POST['passwordconfirm'];
    //cek password lama
    $query = mysqli_query($con, "SELECT * FROM user where username = '$username' ");
    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        //validasi data data kosong
        if (empty($_POST['passwordbaru']) || empty($_POST['passwordconfirm'])) {
            echo "<h3><font color=red><center>Ganti Password Gagal! Data Tidak Boleh Kosong.</center></font></h3>";
            //validasi input konfirm password
        } else if (($_POST['passwordbaru']) != ($_POST['passwordconfirm'])) {
            echo "<h3><font color=red><center>Ganti Password Gagal! Password Baru dan Password Konfirmasi Harus Sama.</center></font></h3>";
        } else {
            //update data
            $query = mysqli_query($con, "UPDATE user SET password='$passwordbaru' WHERE username='$username'");
            //setelah berhasil update 
            if ($query) {
                echo "<h3><font color=#8BB2D9><center>Ganti Password Berhasil!</center></font></h3>";
                // header("Location: profil.php");
            } else {
                echo "<h3><font color=red><center>Ganti Password Gagal!</center></font></h3>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Ganti Password</title>
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm bg-light text-dark rounded shadow-lg border">
                    <!-- alert untuk error -->
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            <strong>Login Gagal</strong><br> Harus di isi sesuai dengan di registrasi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="row text-center">
                            <div class="col-sm-2">
                                <img src="img/pdam_biru.png" alt="" style="width: 3rem;">
                            </div>
                            <div class="col-sm-10">
                                <h2>GANTI PASSWORD</h2>
                            </div>
                        </div>
                        <div class="mb-1  row">
                            <input type="hidden" class="form-control" id="nama_depan" name="nama_depan" required value="">
                        </div>
                        <br>
                        <!-- <div class="mb-1  row">
                            <label for="username" class="mb-2 text-muted">username :</label>
                            <input type="text" class="form-control mb-2" id="username" name="username" required autofocus autocomplete="off">
                        </div> -->
                        <div class="mb-1  row">
                            <label for="passwordbaru" class="mb-2 text-muted">Password Baru :</label>
                            <input type="password" class="form-control mb-2" id="passwordbaru" name="passwordbaru" autocomplete="off">
                        </div>
                        <div class="mb-1  row">
                            <label for="passwordconfirm" class="mb-2 text-muted">Password Konfirmasi :</label>
                            <input type="password" class="form-control mb-2" id="passwordconfirm" name="passwordconfirm" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-primary" name="reset">Ganti Password</button>
                    </form>
                    <div class="text-center mt-2 text-danger">
                        Batal? <a href="profil.php" class="text-primary" style="text-decoration: none;">Kembali</a>
                    </div>
                    <!-- <div align="center">
                        <p>Ingat Password ? </p>
                        <a href="login.php"><button class="btn btn-danger">Login</button></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>

</html>
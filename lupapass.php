<?php

session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require "function.php";


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $bagian = $_POST["bagian"];
    $sub_bagian = $_POST["sub_bagian"];
    $jabatan = $_POST["jabatan"];
    $_SESSION['username'] = strtoupper($username);
    $_SESSION['bagian'] = strtoupper($bagian);
    $_SESSION['sub_bagian'] = strtoupper($sub_bagian);
    $_SESSION['jabatan'] = strtoupper($jabatan);


    $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND bagian = '$bagian' AND sub_bagian = '$sub_bagian' AND jabatan = '$jabatan'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION['nama_depan'] = $row['nama_depan'];
            $_SESSION['nama_belakang'] = $row['nama_belakang'];
            $_SESSION['tgl_lahir'] = $row['tgl_lahir'];
            $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
            $_SESSION['jenkel'] = $row['jenkel'];
            $_SESSION['no_hp'] = $row['no_hp'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['bagian'] = $row['bagian'];
            $_SESSION['sub_bagian'] = $row['sub_bagian'];
            $_SESSION['jabatan'] = $row['jabatan'];
            $_SESSION['agama'] = $row['agama'];

            header("Location: form_tanya.php");
            exit;
        }
    }
    $error = true;
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="css/style.css">
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
                                <h2>LUPA PASSWORD</h2>
                            </div>
                        </div>
                        <div class="mb-1  row">
                            <input type="hidden" class="form-control" id="nama_depan" name="nama_depan" required value="">
                        </div>
                        <br>
                        <div class="mb-1  row">
                            <label for="email" class="mb-2 text-muted">Alamat Email :</label>
                            <input type="email" class="form-control mb-2" id="email" name="email" required autofocus autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-primary" name="login">Kirim Email</button>
                    </form>
                    <div class="text-center mt-2 text-danger">
                        Ingat password? <a href="login.php" class="text-primary" style="text-decoration: none;">Login</a>
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
<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require "function.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Profil</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary">
                        <div class="row">
                            <div class="col-sm-9">
                                <h2 class="text-light">PROFIL KARYAWAN</h2>
                            </div>
                            <div class="col-sm-1 text-end">
                                <a href="#" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ganti Password" style="width: 75px;"><img src="img/key.svg" alt="" style="width: 2rem;"></a>
                            </div>
                            <div class="col-sm-2 text-end">
                                <a href="index.php" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kembali ke Halaman Utama" style="width: 75px;"><img src="img/x-circle.svg" alt="" style="width: 2rem;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="card shadow mt-2 mb-0">
                                <h2 class="card-title text-center mt-1"><?php echo $_SESSION['nama_depan'] . ' ' . $_SESSION['nama_belakang']; ?></h2>
                                <h4 class="card-title text-center"><?php echo $_SESSION['jabatan']  . ' - ' . $_SESSION['sub_bagian']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="card-title">Nik</h5>
                                <h5 class="card-title">Tempat Lahir</h5>
                                <h5 class="card-title">Tanggal Lahir</h5>
                                <h5 class="card-title">Jenis Kelamin</h5>
                                <h5 class="card-title">Agama</h5>
                            </div>
                            <div class="col-sm-5">
                                <h5 class="card-title"><?php echo $_SESSION['nik']; ?></h5>
                                <h5 class="card-title"><?php echo ucwords(strtolower($_SESSION['tempat_lahir'])); ?></h5>
                                <h5 class="card-title"><?php echo ucwords(date('d-F-Y', strtotime($_SESSION['tgl_lahir']))); ?></h5>
                                <h5 class="card-title"><?php echo ucwords(strtolower($_SESSION['jenkel'])); ?></h5>
                                <h5 class="card-title"><?php echo ucwords(strtolower($_SESSION['agama'])); ?></h5>
                            </div>
                            <div class="col-sm-4 text-center">
                                <img src="img/pdam_biru.png" alt="" style="width: 7rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

    <script>
        const profil = document.querySelectorAll('.card-title');
        for (let i = 0; i < profil.length; i++) {
            profil[i].addEventListener('mouseover', function() {
                profil[i].style.color = "red";
            });
            profil[i].addEventListener('mouseleave', function() {
                profil[i].style.color = "black";
            });
        }
    </script>
</body>

</html>
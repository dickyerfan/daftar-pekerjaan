<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require "function.php";

$nik_baru = $_SESSION['nik'];
$nik_pecah = str_split($nik_baru);
$nik_baru = $nik_pecah[0] . $nik_pecah[1] . $nik_pecah[2] . ' ' . $nik_pecah[3] . $nik_pecah[4] . ' ' . $nik_pecah[5] . $nik_pecah[6] . $nik_pecah[7];
$tanggal_lahir = date('d', strtotime($_SESSION['tgl_lahir']));
$bulan_lahir = date('m', strtotime($_SESSION['tgl_lahir']));
$tahun_lahir = date('Y', strtotime($_SESSION['tgl_lahir']));

switch ($bulan_lahir) {
    case '01':
        $bulan_lahir = 'Januari';
        break;
    case '02':
        $bulan_lahir = 'Februari';
        break;
    case '03':
        $bulan_lahir = 'Maret';
        break;
    case '04':
        $bulan_lahir = 'April';
        break;
    case '05':
        $bulan_lahir = 'Mei';
        break;
    case '06':
        $bulan_lahir = 'Juni';
        break;
    case '07':
        $bulan_lahir = 'Juli';
        break;
    case '08':
        $bulan_lahir = 'Agustus';
        break;
    case '09':
        $bulan_lahir = 'September';
        break;
    case '10':
        $bulan_lahir = 'Oktober';
        break;
    case '11':
        $bulan_lahir = 'Nofember';
        break;
    case '12':
        $bulan_lahir = 'Desember';
        break;
}
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
                        <div class="row d-flex">
                            <div class="col-sm-9">
                                <h2 class="text-light float-start">PROFIL KARYAWAN</h2>
                            </div>
                            <div class="col-sm-3">
                                <ul class="nav nav-tabs card-header-tabs float-end">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Pengaturan
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="update.php"><img src="img/vector-pen.svg" alt="" style="width: 1.2rem;"> Update</a></li>
                                            <li><a class="dropdown-item" href="gantipass.php"><img src="img/key.svg" alt="" style="width: 1.2rem;"> Ganti Password</a></li>
                                            <li><a class="dropdown-item" href="index.php"><img src="img/backspace.svg" alt="" style="width: 1.2rem;"> Kembali</a></li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                    <h5 class="gantisize card-title"><?php echo $nik_baru; ?></h5>
                                    <h5 class="gantisize card-title"><?php echo ucwords(strtolower($_SESSION['tempat_lahir'])); ?></h5>
                                    <h5 class="card-title"><?php echo ucwords($tanggal_lahir . ' ' . $bulan_lahir . ' ' . $tahun_lahir); ?></h5>
                                    <h5 class="gantisize card-title"><?php echo ucwords(strtolower($_SESSION['jenkel'])); ?></h5>
                                    <h5 class="gantisize card-title"><?php echo ucwords(strtolower($_SESSION['agama'])); ?></h5>
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
        const profil2 = document.querySelectorAll('.gantisize');
        for (let i = 0; i < profil.length; i++) {
            profil2[i].addEventListener('mouseover', function() {
                profil2[i].style.fontSize = "2rem";
            });
            profil2[i].addEventListener('mouseleave', function() {
                profil2[i].style.fontSize = "1.25rem";
            });
        }
    </script>
</body>

</html>
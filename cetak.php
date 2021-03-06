<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";
// $table = trim(substr($_SESSION['username'], 0, 6));
$table = $_SESSION['username'];
$nama = $_SESSION['username'];
// $nama_depan = $_SESSION['nama_depan'];
// $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task2 = 'Selesai'");
// $row = mysqli_fetch_assoc($query);
// $bulan = strtoupper(date('F', strtotime($row['date_task2'])));

$tgl = date('d');
$bln = date('m');
$thn = date('Y');

switch ($bln) {
    case '1':
        $bln = "Januari";
        break;
    case '2':
        $bln = "Februari";
        break;
    case '3':
        $bln = "Maret";
        break;
    case '4':
        $bln = "April";
        break;
    case '5':
        $bln = "Mei";
        break;
    case '6':
        $bln = "Juni";
        break;
    case '7':
        $bln = "Juli";
        break;
    case '8':
        $bln = "Agustus";
        break;
    case '9':
        $bln = "September";
        break;
    case '10':
        $bln = "Oktober";
        break;
    case '11':
        $bln = "Nofember";
        break;
    case '12':
        $bln = "Desember";
        break;
}

$nik_baru = $_SESSION['nik'];
$nik_pecah = str_split($nik_baru);
$nik_baru = $nik_pecah[0] . $nik_pecah[1] . $nik_pecah[2] . ' ' . $nik_pecah[3] . $nik_pecah[4] . ' ' . $nik_pecah[5] . $nik_pecah[6] . $nik_pecah[7];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tanya</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/print.css">
    <style>
        .font {
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <header class="header">
        <?php include "header.php" ?>
    </header>
    <div class="container-fluid bg-info">
        <div class="navbar1 row justify-content-center">
            <div class="card-header bg-primary">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 class="text-light float-start">DAFTAR PEKERJAAN</h4>
                    </div>
                    <div class="col-sm-9  mb-1">
                        <ul class="nav nav-tabs card-header-tabs float-end pe-1">
                            <button class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cetak File" id="cetak"><img src="img/printer.svg" alt="" style="width: 1.2rem;"> Cetak</button>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Menu
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <!-- <li><a class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cetak File" id="cetak" href="#"><img src="img/printer.svg" alt="" style="width: 1.2rem;"> Cetak</a></li> -->
                                    <li><button class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pilih Bulan dan Tahun" id="belum" href="gantipass.php"><img src="img/calendar3.svg" alt="" style="width: 1.2rem;"> Pilih Bulan & Tahun</button></li>
                                    <li><a class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kembali ke Halaman Utama" href="index.php"><img src="img/backspace.svg" alt="" style="width: 1.2rem;"> Kembali</a></li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid" id="tanya" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <div class="card bg-dark shadow-lg border-0 text-center text-light">
                    <div class="card-body">
                        <h3>Pilih Bulan</h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="bulan" class="form-select mb-1">
                                    <option value="">Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">Nofember</option>
                                    <option value="12">Desember</option>
                                </select>
                                <select name="tahun" class="form-select">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 100; $i++) {
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="add_post" id="tombol_pilih" class="btn btn-dark">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="logo container-fluid">
        <div class="row">
            <div class="col-sm-6 font">
                <p class="mb-0">Perusahaan Daerah Air Minum</p>
                <p class="mb-0">Kabupaten Bondowoso</p>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
    <h4 class="logo text-center">DAFTAR PEKERJAAN <?php echo $_SESSION['sub_bagian'] ?><br>
    </h4>

    <div class="container-fluid" id="tabel">
        <table class="table table-sm table-hover table-bordered border-dark">
            <thead>
                <tr>
                    <th scope="col" class="text-center font" width=5%>No</th>
                    <th scope="col" class="text-center font" width=60%>Nama Pekerjaan</th>
                    <th scope="col" class="text-center font" width=10%>Status</th>
                    <th scope="col" class="text-center font" width=25%>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $table = $_SESSION['username'];
                $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task2 = 'Selesai'");
                if (isset($_POST["add_post"])) {
                    $tahun = $_POST['tahun'];
                    $bulan = $_POST['bulan'];
                    if ($bulan < 10) {
                        $bulan = str_split($bulan)[1];
                    }
                    $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task2 = 'Selesai' AND bulan = '$bulan' AND tahun = '$tahun' ORDER BY date_task2 ASC");

                ?>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <?php
                        $tgls = strtotime($row['date_task2']);
                        $tanggal = date('d', $tgls);
                        $bulan = date('m', $tgls);
                        $tahun = date('Y', $tgls);

                        switch ($bulan) {
                            case '1':
                                $bulan = "Januari";
                                break;
                            case '2':
                                $bulan = "Februari";
                                break;
                            case '3':
                                $bulan = "Maret";
                                break;
                            case '4':
                                $bulan = "April";
                                break;
                            case '5':
                                $bulan = "Mei";
                                break;
                            case '6':
                                $bulan = "Juni";
                                break;
                            case '7':
                                $bulan = "Juli";
                                break;
                            case '8':
                                $bulan = "Agustus";
                                break;
                            case '9':
                                $bulan = "September";
                                break;
                            case '10':
                                $bulan = "Oktober";
                                break;
                            case '11':
                                $bulan = "Nofember";
                                break;
                            case '12':
                                $bulan = "Desember";
                                break;
                        }
                        ?>
                        <tr>
                            <th scope="row" class="text-center font"><?php echo $no++ ?></th>
                            <td class="font"><?php echo $row['name_task']; ?></td>
                            <td class="text-center font"><?php echo $row['status_task2']; ?></td>
                            <td class="text-center font"><?php echo $tanggal . " " . $bulan . " " . $tahun; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container logo">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6 text-center">
                <h6 class="font">Bondowoso, <?php echo $tgl . " " . $bln . " " . $thn; ?></h6>
                <h6 class="ttd mb-0 font">Dibuat Oleh :</h6>
                <h6 class="font"><?php echo $_SESSION['jabatan'] . ' ' . $_SESSION['sub_bagian'] ?></h6>
                <br><br>
                <h6 class="mb-0 font"><u><?php echo $_SESSION['nama_depan'] . ' ' . $_SESSION['nama_belakang']; ?></u></h6>
                <h6 class="font">Nik. <?php echo $nik_baru; ?></h6>
            </div>
        </div>
    </div>

    <script>
        const tanya = document.getElementById('tanya');
        const tombol_belum = document.getElementById('belum');
        const tombol_pilih = document.getElementById('tombol_pilih');
        const tabel = document.getElementById('tabel');
        const cetak = document.getElementById('cetak');

        tombol_belum.addEventListener('click', function() {
            if (tanya.style.display == "none") {
                tanya.style.display = "block";
            }
        });
        tombol_pilih.addEventListener('click', function() {
            if (tanya.style.display == "block") {
                tanya.style.display = "none";
            }
        });
        cetak.addEventListener('click', function() {
            window.print();
        })
    </script>

    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
</body>

</html>
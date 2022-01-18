<?php

session_start();

require "function.php";

$username = $_SESSION["username"];

if (isset($_POST["update"])) {
    $bagian = strtoupper($_POST["bagian"]);
    $sub_bagian = strtoupper($_POST["sub_bagian"]);
    $jabatan = strtoupper($_POST["jabatan"]);

    $result = mysqli_query($con, "UPDATE user SET bagian = '$bagian', sub_bagian = '$sub_bagian', jabatan = '$jabatan' WHERE username = '$username'");

    header("Location: logout.php");
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
    <title>Login</title>
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
                            <strong>Update Gagal</strong><br> Harus di isi sesuai dengan di registrasi
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="row text-center">
                            <div class="col-sm-2">
                                <img src="img/pdam_biru.png" alt="" style="width: 3rem;">
                            </div>
                            <div class="col-sm-10">
                                <h3>UPDATE PROFIL</h3>
                            </div>
                        </div>
                        <div class="mb-1  row">
                            <input type="hidden" class="form-control" id="nama_depan" name="nama_depan" required value="">
                        </div>
                        <div class="mb-1  row">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nama panggilan" value="<?= $username; ?>">
                        </div>
                        <div class="mb-1  row">
                            <select class="form-select" name="bagian" id="bagian" required autofocus autocomplete="off">
                                <option value="">Bagian / UPK</option>
                                <option value="Langganan">Langganan</option>
                                <option value="U m u m">U m u m</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="S P I">S P I</option>
                                <option value="U P K">U P K</option>
                                <option value="A M D K">A M D K</option>
                            </select>
                        </div>
                        <div class="mb-1  row">
                            <select class="form-select" name="sub_bagian" id="sub_bagian" required>
                                <option value="">Sub Bagian / UPK</option>
                                <option value="Langganan">Langganan</option>
                                <option value="Penagihan">Penagihan</option>
                                <option value="Umum">Umum</option>
                                <option value="Administrasi">Administrasi</option>
                                <option value="Personalia">Personalia</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kas">Kas</option>
                                <option value="Pembukuan">Pembukuan</option>
                                <option value="Rekening">Rekening</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="Peralatan">Peralatan</option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="Pengawasan">Pengawasan</option>
                                <option value="SPI">SPI</option>
                                <option value="A M D K">A M D K</option>
                                <option value="I T">I T</option>
                                <option value="Bondowoso">Bondowoso</option>
                                <option value="Sukosari 1">Sukosari 1</option>
                                <option value="Maesan">Maesan</option>
                                <option value="Tegalampel">Tegalampel</option>
                                <option value="Tapen">Tapen</option>
                                <option value="Prajekan">Prajekan</option>
                                <option value="Tlogosari">Tlogosari</option>
                                <option value="Wringin">Wringin</option>
                                <option value="Curahdami">Curahdami</option>
                                <option value="Tamanan">Tamanan</option>
                                <option value="Tenggarang">Tenggarang</option>
                                <option value="Tamankrocok">Tamankrocok</option>
                                <option value="Wonosari">Wonosari</option>
                                <option value="Sukosari 2">Sukosari 2</option>
                            </select>
                        </div>
                        <div class="mb-1  row">
                            <!-- <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required> -->
                            <select class="form-select" name="jabatan" id="jabatan" required>
                                <option value="">Jabatan</option>
                                <option value="Kabag">Kabag</option>
                                <option value="Ka UPK">Ka UPK</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Kasubag">Kasubag</option>
                                <option value="Pelaksana">Pelaksana</option>
                                <option value="Staf">Staf</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                    </form>
                    <div class="row">
                        <div class="col text-center">
                            <a href="profil.php"><button class="btn btn-danger">Batal</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>

</html>
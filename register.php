<?php
session_start();

require "function.php";

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        $success = true;
    } else {
        $error = true;
        echo mysqli_error($con);
    }
}

if (isset($_POST["register"])) {
    $table = $_POST["username"];
    $query  = "CREATE TABLE $table (id_task INT(10) AUTO_INCREMENT, ";
    $query .= "name_task VARCHAR(255),";
    $query .= "status_task1 VARCHAR(50), ";
    $query .= "status_task2 VARCHAR(50), ";
    $query .= "tahun VARCHAR(4), ";
    $query .= "bulan VARCHAR(2), ";
    $query .= "date_task1 DATETIME,";
    $query .= "date_task2 DATETIME, PRIMARY KEY (id_task))";
    $hasil_query = mysqli_query($con, $query);

    // $list = $_POST["username"] . '_list';
    // $query2  = "CREATE TABLE $list (id_task INT(10) AUTO_INCREMENT, ";
    // $query2 .= "name_task VARCHAR(50),";
    // $query2 .= "status_task1 VARCHAR(50), ";
    // $query2 .= "status_task2 VARCHAR(50), ";
    // $query2 .= "tahun VARCHAR(4), ";
    // $query2 .= "bulan VARCHAR(2), ";
    // $query2 .= "date_task1 DATE,";
    // $query2 .= "date_task2 DATE, PRIMARY KEY (id_task))";
    // $hasil_query = mysqli_query($con, $query2);
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
                <div class="col-sm bg-dark text-light rounded ">
                    <!-- alert untuk success -->
                    <?php if (isset($success)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Registrasi Berhasil</strong> Silakan <a href="login.php">Login</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- alert untuk error -->
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            <strong>Nama Panggilan sudah terdaftar</strong><br> Silakan gunakan nama yang lain
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="row text-center">
                            <div class="col-sm-2">
                                <img src="img/pdam_biru.png" alt="" style="width: 3rem;">
                            </div>
                            <div class="col-sm-10">
                                <h1>REGISTER</h1>
                            </div>
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" required>
                            </div>
                            <div class="col g-0">
                                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" required>
                            </div>
                        </div>
                        <div class="mb-1 form-group row">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama panggilan" required>
                        </div>
                        <div class="mb-1 form-group row">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
                                <select class="form-select" name="bagian" id="bagian" required>
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
                            <div class="col g-0">
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
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
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
                            <div class="col g-0">
                                <select class="form-select" name="agama" id="agama" required>
                                    <option value="">Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kepercayaan">Kepercayaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP/WA" required>
                            </div>
                            <div class="col g-0">
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="N I K" required>
                            </div>
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
                                <select class="form-select" name="jenkel" id="jenkel" required>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col g-0">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="mb-1 form-group row">
                            <div class="col g-0">
                                <div class="form-control">
                                    Tanggal Lahir :
                                </div>
                            </div>
                            <div class="col g-0">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir :" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    </form>
                    <div align="center">
                        <p>sudah punya akun ? </p>
                        <a href="login.php"><button class="btn btn-danger">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>

</body>

</html>
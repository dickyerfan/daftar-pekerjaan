<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require "function.php";

$table = $_SESSION['username'];
$list = $_SESSION["username"] . '_list';
// $table = trim(substr($_SESSION['username'], 0, 6));
// $list = trim(substr($_SESSION["username"], 0, 6)) . '_list';

if (isset($_GET['edit'])) {

    $id_task = $_GET['edit'];
    $query_update = "UPDATE $table SET status_task1 = 'NULL',status_task2 = 'Selesai',date_task2 = now() Where id_task = '$id_task'";
    $update = mysqli_query($con, $query_update);

    // $query_list = "INSERT INTO listjob (name_task,username,status_task1,status_task2,tahun,bulan,date_task1,date_task2)SELECT name_task,'$table','Pending',NULL,tahun,bulan,date_task1,date_task2 FROM $table WHERE id_task = '$id_task'";
    // $insert_list = mysqli_query($con, $query_list);

    header("Location: index.php");
}

// if (isset($_GET['view'])) {
//     $id_task = $_GET['view'];
//     $query_data = mysqli_query($con, "SELECT * FROM $list");
//     while ($row = mysqli_fetch_assoc($query_data)) {
//         $name_task = $row['name_task'];
//     };

//     $query_insert = "INSERT INTO $table (name_task, status_task1, tahun, bulan , date_task1)SELECT name_task,'Pending',YEAR(now()),month(now()),now() FROM $list";
//     $insert = mysqli_query($con, $query_insert);

//     header("Location: index.php");
// }

// $bulanini = date('m');

$query = mysqli_query($con, "SELECT * FROM $table");
while ($row = mysqli_fetch_assoc($query)) {
    $bulan = $row['bulan'];
    $tahun = $row['tahun'];
}
if (isset($_POST["ambil_data"])) {
    $bulan = $_POST['bulan'];
    $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM $table WHERE bulan = '$bulan' "));
    if ($cek > 0) {
        // echo "<script>window.alert('daftar pekerjaan yang anda masukan sudah ada')
        // window.location='index.php'</script>";
        $error = true;
    } else {
        $query_insert = "INSERT INTO $table (name_task, status_task1, tahun, bulan , date_task1)SELECT name_task,'Pending',YEAR(now()),month(now()),now() FROM listjob WHERE username = '$table' ";
        $insert = mysqli_query($con, $query_insert);
        header("Location: index.php");
        exit;
    }
}


if (isset($_GET['delete'])) {
    $id_task = $_GET['delete'];
    $query = mysqli_query($con, "DELETE FROM $table WHERE id_task = '$id_task' AND status_task1 = 'Pending'");

    header("Location: index.php");
}
if (isset($_GET['hapus'])) {
    $id_list = $_GET['hapus'];
    $query = mysqli_query($con, "DELETE FROM listjob WHERE id_list = '$id_list' AND status_task1 = 'Pending' AND username = '$table'");

    header("Location: index.php");
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
    <title>Halaman Utama</title>
</head>

<body>

    <header>
        <?php include "header.php" ?>
    </header>
    <div class="container-fluid bg-info">
        <div class="row">
            <div class="col-sm-4 mt-1">
                <a class="navbar-brand text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik Untuk Melihat Profil" href="profil.php"><b><?php echo $_SESSION['nama_depan'] . ' ' . $_SESSION['nama_belakang']; ?></b></a>
            </div>
            <div class="col-sm-2 mt-1">
                <p><b>BAGIAN : <?php echo $_SESSION['bagian']; ?></b></p>
            </div>
            <div class="col-sm-3 mt-1">
                <p><b>JABATAN : <?php echo $_SESSION['jabatan']; ?> <?php echo $_SESSION['sub_bagian']; ?></b></p>
            </div>
            <div class="col-sm-2 mt-1 text-end">
                <a href="form_tanya.php">
                    <button class="btn btn-outline-light" type="submit">Tambah Pekerjaan</button>
                </a>
            </div>
            <div class="col-sm-1 mt-1 text-end">
                <a href="#">
                    <button class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anda Akan Keluar" type="submit" id="tombol" style="width: 75px;"><img src="img/box-arrow-right.svg" alt="" style="width: 1.2rem;"></button>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row g-1">
            <div class="col-md-6">
                <!-- Daftar Tunggu Pekerjaan -->
                <div class="card bg-danger shadow-lg border-0 text-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 g-0">
                                <h3 class="text-light text-end">Daftar Tunggu Pekerjaan</h3>
                            </div>
                            <div class="col-sm-2 text-end g-0">
                                <!-- Button trigger modal -->
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-light data-bs-toggle=" tooltip data-bs-placement="bottom" title="Klik Untuk melihat Daftar Pekerjaan Anda" style="width: 4rem;"><img src=" img/list.png" alt="" style="width: 20px;"></button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-light">
                                                <h5 class="modal-title" id="exampleModalLabel">DAFTAR PEKERJAAN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM listjob WHERE username = '$table'");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $id_list = $row['id_list'];
                                                ?>
                                                    <li class="list-group-item text-start">
                                                        <?php echo $row['name_task'] ?>
                                                        <a href="index.php?hapus=<?php echo $id_list ?>" onclick="return confirm('Yakin Mau dihapus..?')">
                                                            <span class="badge bg-danger" style="float: right;">Hapus</span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-2 text-end">
                                <form action="" method="post">
                                    <input type="hidden" name="bulan" value="<?php echo date('m'); ?>" />
                                    <button class="btn btn-outline-light data-bs-toggle=" tooltip" data-bs-placement="bottom" title="Klik Untuk Download Daftar Pekerjaan" id="ambil_data" type="submit" name="ambil_data" style="width: 4rem;">
                                        <img src="img/cloud-download.svg" alt="" style="width: 1.4rem;">
                                    </button>
                                </form>
                                <!-- <button class="btn btn-outline-light" id="ambil_data" type="submit" name="ambil_data"> Data</button> -->
                            </div>
                        </div>
                        <!-- alert untuk error -->
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                                <strong>Ambil Data Gagal</strong><br> Daftar pekerjaan yang anda masukan sudah ada
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <ul class="list-group text-start">
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task1 = 'Pending'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_task = $row['id_task'];
                                $name_task = $row['name_task'];
                            ?>
                                <li class="list-group-item">
                                    <?php echo $name_task; ?>
                                    <div style="float: right;">
                                        <a href="index.php?edit=<?php echo $id_task ?>">
                                            <span class="proses badge bg-danger">Proses</span>
                                        </a>
                                        <a href="index.php?delete=<?php echo $id_task; ?>" onclick="return confirm('Yakin Mau dihapus..?')">
                                            <span class="badge bg-danger">Hapus</span>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM listjob WHERE status_task1 = 'Pending' AND username = '$table'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_list = $row['id_list'];
                                $name_task = $row['name_task'];
                            ?>
                                <li class="daftar list-group-item" style="display: none;">
                                    <?php echo $name_task; ?>
                                    <div style="float: right;">
                                        <a href="index.php?view=<?php echo $id_task ?>">
                                            <span class="proses2 badge bg-danger">Proses</span>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Pekerjaan selesai -->
            <div class="col-md-6">
                <div class="card bg-primary shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="text-light text-center">Pekerjaan Selesai</h3>
                            </div>
                            <div class="col-sm-3 text-end">
                                <a href="cetak.php"><button class="btn btn-outline-light">
                                        <!-- <img src="img/printer.svg" alt="Modul Cetak"> -->
                                        Tampilkan
                                    </button></a>
                            </div>
                        </div>
                        <ul class="list-group">
                            <?php
                            $blnini = date('m');
                            $thnini = date('Y');
                            $query = mysqli_query($con, "SELECT * FROM $table WHERE status_task2 ='Selesai' AND bulan = '$blnini' AND tahun = '$thnini'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_task = $row['id_task'];
                                $date_task2 = strtotime($row['date_task2']);
                            ?>
                                <li class="list-group-item">
                                    <?php echo $row['name_task'] ?>
                                    <div style="float: right;">
                                        <span class="badge bg-primary">Selesai</span>
                                        <span class="badge bg-primary"><?php echo date("d M Y", $date_task2); ?></span>
                                        <!-- <a href="index.php?delete=<?php echo $id_task ?>" class="btn btn-danger badge bg-danger">Hapus</a> -->
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script src="asset/sweetalert2.all.min.js"></script>
    <script src="asset/jquery-3.6.0.min.js"></script>
    <script>
        const tombol = document.querySelector('#tombol');
        tombol.addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin Mau Logout..?',
                text: "Anda akan keluar dari halaman ini..!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout..!'
            }).then((keluar) => {
                if (keluar.isConfirmed) {
                    document.location.href = 'logout.php';
                    Swal.fire(
                        'SELAMAT..!',
                        'Anda Berhasil Logout...',
                        'success'
                    )
                }

            })
        });

        const proses = document.querySelectorAll('a .proses');
        for (let i = 0; i < proses.length; i++) {
            proses[i].addEventListener('mouseover', function() {
                proses[i].innerHTML = "Pekerjaan Selesai";
            });
            proses[i].addEventListener('mouseleave', function() {
                proses[i].innerHTML = "Proses";
            });
        }

        const proses2 = document.querySelectorAll('a .proses2');
        for (let i = 0; i < proses2.length; i++) {
            proses2[i].addEventListener('mouseover', function() {
                proses2[i].innerHTML = "Pekerjaan telah Selesai";
            });
            proses2[i].addEventListener('mouseleave', function() {
                proses2[i].innerHTML = "Proses";
            });
        }

        // const ambil_data = document.getElementById('ambil_data');
        // ambil_data.addEventListener('click', function() {
        //     const daftar = document.querySelectorAll('.daftar');
        //     for (let i = 0; i < daftar.length; i++) {
        //         daftar[i].style.display = 'block';
        //     }
        // });

        // let bulan = (new Date().getMonth() + 2).toString().padStart(2, "0");
        // console.log(bulan);
    </script>


</body>

</html>
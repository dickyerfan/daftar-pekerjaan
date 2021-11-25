<?php

$con = mysqli_connect("localhost", "root", "", "daftar_pekerjaan");
if (!$con) {
    die("koneksi gagal : " . mysqli_connect_errno() . "-" . mysqli_connect_error());
}

// function registrasi
function registrasi($data)
{
    global $con;

    $nama_depan = strtoupper(stripcslashes($data['nama_depan']));
    $nama_belakang = strtoupper(stripcslashes($data['nama_belakang']));
    $username = strtoupper(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($con, $data['password']);
    $bagian = strtoupper(stripcslashes($data['bagian']));
    $sub_bagian = strtoupper(stripcslashes($data['sub_bagian']));
    $jabatan = strtoupper(stripcslashes($data['jabatan']));
    $agama = strtoupper(stripcslashes($data['agama']));
    $no_hp = strtoupper(stripcslashes($data['no_hp']));
    $nik = strtoupper(stripcslashes($data['nik']));
    $jenkel = strtoupper(stripcslashes($data['jenkel']));
    $tempat_lahir = strtoupper(stripcslashes($data['tempat_lahir']));
    $tgl_lahir = strtoupper(stripcslashes($data['tgl_lahir']));

    // $_SESSION['nama_depan'] = strtoupper($nama_depan);
    // $_SESSION['nama_belakang'] = strtoupper($nama_belakang);
    // $_SESSION['username'] = strtoupper($username);
    // $_SESSION['tgl_lahir'] = $tgl_lahir;
    // $_SESSION['tempat_lahir'] = $tempat_lahir;
    // $_SESSION['jenkel'] = $jenkel;
    // $_SESSION['no_hp'] = $no_hp;
    // $_SESSION['nik'] = $nik;
    // $_SESSION['bagian'] = strtoupper($bagian);
    // $_SESSION['sub_bagian'] = strtoupper($sub_bagian);
    // $_SESSION['jabatan'] = strtoupper($jabatan);
    // $_SESSION['agama'] = $agama;

    // cek duplikasi username
    $result = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        return false;
    }

    // password enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    //add user to database
    mysqli_query($con, "INSERT INTO user VALUES('','$nama_depan','$nama_belakang','$username','$password','$bagian','$sub_bagian','$jabatan','$agama','$no_hp','$nik','$jenkel','$tempat_lahir','$tgl_lahir')");

    return mysqli_affected_rows($con);
}

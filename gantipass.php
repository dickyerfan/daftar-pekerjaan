<?php

session_start();
// $con = mysqli_connect("localhost", "root", "", "daftar_pekerjaan");
require 'function.php';
if (isset($_POST['submit'])) :
    extract($_POST);


    $user_check = $_SESSION['username'];

    $old_pwd = $_POST['currentPassword'];
    $pwd = $_POST['newPassword'];
    $c_pwd = $_POST['confirmPassword'];
    if ($old_pwd != "" && $pwd != "" && $c_pwd != "") :


        if ($pwd == $c_pwd) :
            if ($pwd != $old_pwd) :
                $sql = "SELECT * FROM `user` WHERE `username`='$user_check' AND `password` =PASSWORD($old_pwd)";
                $db_check = $db->query($sql);
                $count = mysqli_num_rows($db_check);
                if ($count == 1) :
                    $fetch = $db->query("UPDATE `user` SET `password` = PASSWORD($pwd) WHERE `username`='$user_check'");
                    $old_pwd = '';
                    $pwd = '';
                    $c_pwd = '';
                    $message = "Password successfully updated!";
                else :
                    $message = "Old password is incorrect. Please try again.";
                endif;
            else :
                $message = "Old password and new password are the same. Please try again.";
            endif;
        else :
            $message = "New password and confirm password do not match.";
        endif;
    else :
        $message = "Please fill all the fields";
    endif;
endif;
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
    <h3 align="center">GANTI PASSWORD</h3>
    <div><?php if (isset($message)) {
                echo $message;
            } ?></div>
    <form method="post" action="" align="center">
        Current Password:<br>
        <input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
        <br>
        New Password:<br>
        <input type="password" name="newPassword"><span id="newPassword" class="required"></span>
        <br>
        Confirm Password:<br>
        <input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
        <br><br>
        <input type="submit" value="Ganti Password">
    </form>
    <br>
    <br>
</body>

</html>
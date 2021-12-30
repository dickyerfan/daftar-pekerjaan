<?php
date_default_timezone_set("Asia/Jakarta");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script>
        window.setTimeout("waktu()", 1000);

        function waktu() {
            let waktu = new Date();
            setTimeout("waktu()", 1000);
            let h = waktu.getHours();
            let m = waktu.getMinutes();
            let s = waktu.getSeconds();

            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);

            document.getElementById("jam").innerHTML = h + " : " + m + " : " + s + " WIB";
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
</head>

<body onload="waktu()">
    <div class="container-fluid bg-warning">
        <div class="row">
            <div class="col-sm-1 mt-1 text-center">
                <img src="img/pdam_biru.png" alt="" style="width: 35px;">
            </div>
            <div class="col-sm-4 mt-1 text-start">
                <h3><b>PDAM BONDOWOSO</b></h3>
            </div>
            <div class="col sm-5 mt-2">
                <h4><b>CHECK LIST PEKERJAAN</b></h4>
            </div>
            <div class="col sm-2 text-end mt-1">
                <button class="btn btn-outline-dark"><?php echo date('d F Y'); ?></button>
                <button class="btn btn-outline-dark" id="jam"></button>
            </div>
        </div>
    </div>




</body>

</html>
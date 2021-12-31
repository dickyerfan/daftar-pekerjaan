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
            let t = waktu.getDate();
            let b = waktu.getMonth(); // jika menggunakan array
            // let b = waktu.getMonth() + 1;  // jika menggunakan switch
            let y = waktu.getFullYear();
            let h = waktu.getHours();
            let m = waktu.getMinutes();
            let s = waktu.getSeconds();

            t = checkTime(t);
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);

            let b_arr = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                "Nofember", "Desember"
            ];
            b = b_arr[b];

            // switch (b) {
            //     case 1:
            //         b = "Januari";
            //         break;
            //     case 2:
            //         b = "Februari";
            //         break;
            //     case 3:
            //         b = "Maret";
            //         break;
            //     case 4:
            //         b = "April";
            //         break;
            //     case 5:
            //         b = "Mei";
            //         break;
            //     case 6:
            //         b = "Juni";
            //         break;
            //     case 7:
            //         b = "Juli";
            //         break;
            //     case 8:
            //         b = "Agustus";
            //         break;
            //     case 9:
            //         b = "September";
            //         break;
            //     case 10:
            //         b = "Oktober";
            //         break;
            //     case 11:
            //         b = "Nofember";
            //         break;
            //     case 12:
            //         b = "Desember";
            //         break;
            // }

            document.getElementById("jam").innerHTML = t + "  " + b + "  " + y + " | " + h + " : " + m + " : " + s + " WIB";
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
                <!-- <button class="btn btn-outline-dark"><?php echo date('d F Y'); ?></button> -->
                <button class="btn btn-outline-dark" id="jam"></button>
            </div>
        </div>
    </div>




</body>

</html>
<?php
    $con = mysqli_connect("localhost","root","","toko_online_2");
    if (mysqli_connect_errno()) {
        echo"failed to connect to mysql". mysqli_connect_error();
        exit();
    }
?>
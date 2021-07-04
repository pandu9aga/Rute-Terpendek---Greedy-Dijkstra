<?php
    include ('connection.php');


    $kode = $_GET['id'];

    mysqli_query($conn, "DELETE FROM jarak WHERE kode_jarak='$kode'");

    //echo("benar");

    header("location:kelolaKec.php");
?>
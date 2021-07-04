<?php
    include ('connection.php');


    $kecAwal = $_POST['kec_awal'];
    $kecTuj = $_POST['kec_tujuan'];
    $jarak = $_POST['jarak'];

    mysqli_query($conn, "INSERT into jarak VALUES ('', '$kecAwal', '$kecTuj', '$jarak')");

    header("location:tambahjarak.php");
?>
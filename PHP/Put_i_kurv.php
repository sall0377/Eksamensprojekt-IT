<?php

    session_start();
    $ID=$_POST['ID'];
    $Antal=$_POST['Antal'];
    array_push($_SESSION['ID'],$ID);
    array_push($_SESSION['Antal'],$Antal);

    header('location:../index.php');
?>
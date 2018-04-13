<?php

    session_start();
    $wlID=$_POST['wlID'];
    array_push($_SESSION['wlID'],$wlID);

    header('location:../index.php');
?>
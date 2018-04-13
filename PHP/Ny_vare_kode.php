<?php

    session_start();
    $name=$_POST['name'];
    $price=$_POST['price'];
    include_once 'Connect.php';
    
    $convertname='"'.$mysqli->real_escape_string(utf8_decode($name)).'"';
    $convertprice='"'.$mysqli->real_escape_string(utf8_decode($price)).'"';
    $result=$mysqli->query("SELECT Name FROM Products WHERE Name='$name'"); //Tester om varen findes
    
    if(mysqli_num_rows($result)>0){
        echo "Varen findes allerede";
    }
    else {
        $insert_row=$mysqli->query("INSERT INTO Products (Name, Price) VALUES ($convertname, $convertprice)");
    }

    $mysqli->close();
    header('location:../index.php');

?>
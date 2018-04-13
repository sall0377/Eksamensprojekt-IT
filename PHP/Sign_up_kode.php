<?php
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    include_once 'Connect.php';
    
    $convertusername='"'.$mysqli->real_escape_string(utf8_decode($username)).'"';
    $convertpassword='"'.$mysqli->real_escape_string(utf8_decode($password)).'"';
    $result=$mysqli->query("SELECT username FROM users WHERE username='$username'"); 

    //Tester om brugeren findes    
    if(mysqli_num_rows($result)>0){
        echo "Brugeren findes allerede";
    }
    else {
        $insert_row=$mysqli->query("INSERT INTO users (username, password) VALUES ($convertusername, $convertpassword)");
        $_SESSION['USER']=$username;
        echo "<script>alert('Du er logget ind');
           window.location.href='../index.php';
           </script>";
    }

    $mysqli->close();
    header('location:../index.php');

?>
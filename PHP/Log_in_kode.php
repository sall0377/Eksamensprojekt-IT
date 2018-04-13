<?php
    session_start();
    include_once 'Connect.php';
    $username=$_POST['username'];
    $username=stripslashes($username);
    $username=$mysqli->real_escape_string($username);

    $password=$_POST['password'];
    
    $result=$mysqli->query("SELECT username, password FROM users WHERE username='$username' AND password='$password'"); //Tester om brugeren og kodeordet findes

    $row=mysqli_fetch_array($result);
        
    if (!$row){
        echo "<script>alert('Brugernavn eller kodeord er forkert');</script>";
    }
    else {
        $_SESSION['USER']=$username;
           echo "<script>alert('Du er logget ind');
           window.location.href='../index.php';
           </script>";
    }

$mysqli->close();

?>
<?php

    include('db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];  
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);


    $sql = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    }else{
        
        header("HTTP/1.1 400 Bad Request");
    }

    $con->close();
?>
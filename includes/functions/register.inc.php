<?php

    if(isset($_POST['submit'])){

        $username = $_POST['registerUsername'];
        $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

        require_once './connectDB.php';

        $sql = "INSERT INTO User (username, passcode) VALUES ('$username', '$password')";

        if(mysqli_query($conn, $sql)){
            header("location: ../../list.php?register=success&username='$username'");
            mysqli_close($conn);
            exit();
        }{
            header("location: ../../list.php?register=failed");
            mysqli_close($conn);
            exit();
        }



    }else{
        header("location: ../../list.php");
        exit();
    }
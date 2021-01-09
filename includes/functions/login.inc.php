<?php

    if(isset($_POST['submit'])){

        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        require_once './connectDB.php';



        mysqli_close($conn);
    }else{
        header("location: ../../list.php");
        exit();
    }
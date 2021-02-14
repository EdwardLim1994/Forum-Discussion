<?php

//If there is post request from AJAX to check username
if (isset($_POST['username_ajax'])) {

    //Create connection to database
    require_once '../connectDB.php';

    //Set current username
    $username = $_POST['username_ajax'];

    //SQL to get current username
    $sql = "SELECT username FROM User WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    //If user data is successfully retrieved (which means username has been used), return false, otherwise return true
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        echo false;
    } else {
        mysqli_close($conn);
        echo true;
    }
}
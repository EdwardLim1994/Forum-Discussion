<?php

//If there is post request from AJAX to check username
if (isset($_POST['email_ajax'])) {

    //Create connection to database
    require_once '../connectDB.php';

    //Set current username
    $email = $_POST['email_ajax'];

    //SQL to get current username
    $sql = "SELECT email FROM User WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    //If user data is successfully retrieved (which means email has been used), return false, otherwise return true
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        echo false;
    } else {
        mysqli_close($conn);
        echo true;
    }
}
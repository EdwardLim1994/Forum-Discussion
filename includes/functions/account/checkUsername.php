<?php

if (isset($_POST['username_ajax'])) {
    require_once '../connectDB.php';
    $username = $_POST['username_ajax'];

    $sql = "SELECT username FROM User WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        mysqli_close($conn);
        echo false;
    } else {

        mysqli_close($conn);
        echo true;
    }
}
<?php

if (isset($_POST['submit'])) {

    $username = $_POST['registerUsername'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    require_once './connectDB.php';

    $sql = "INSERT INTO User (username, passcode) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {

        $getID_query = "SELECT id, username FROM User WHERE username = '$username'";
        $result = mysqli_query($conn, $getID_query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $currentid = $row['id'];
                $currentUsername = $row['username'];
            }

            session_start();
            $_SESSION['id'] = $currentid;
            $_SESSION['username'] = $currentUsername;

            header("location: ../../list.php");
            mysqli_close($conn);
            exit();
        } else {
            header("location: ../../list.php?login=failed&reason=getnewdatafailed");
            mysqli_close($conn);
            exit();
        }
    } else {
        header("location: ../../list.php?register=failed");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: ../../list.php");
    exit();
}

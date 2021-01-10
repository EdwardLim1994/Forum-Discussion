<?php

if (isset($_POST['login'])) {

    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $hasedpassword = "";
    require_once './connectDB.php';

    $sql = "SELECT * FROM User WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $currentid = $row['id'];
            $currentUsername = $row['username'];
            $hasedpassword = $row["passcode"];
        }

        if (password_verify($password, $hasedpassword)) {

            session_start();
            $_SESSION['id'] = $currentid;
            $_SESSION['username'] = $currentUsername;

            header("location: ../../list.php");
            mysqli_close($conn);
            exit();

        } else {
            header("location: ../../list.php?reason=passwordnotmatch");
            mysqli_close($conn);
            exit();

        }
    } else {
        header("location: ../../list.php?reason=usernotexist");
        mysqli_close($conn);
        exit();
    }

} else {
    header("location: ../../list.php");
    exit();
}

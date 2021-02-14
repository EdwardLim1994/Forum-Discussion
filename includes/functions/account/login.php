<?php
//Start session
session_start();

//If there is post request from Login form
if (isset($_POST['login'])) {

    //Create connection to database
    require_once '../connectDB.php';

    //Set current user ID and password
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    
    //SQL to select current user
    $sql = "SELECT * FROM User WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    //If query return NO result, redirect to current url with failed parameter
    if (mysqli_num_rows($result) > 0) {

        //Set query result
        while ($row = mysqli_fetch_assoc($result)) {
            $currentid = $row['id'];
            $currentUsername = $row['username'];
            $hasedpassword = $row["passcode"];
        }

        //If current password is matched with the database one, save current user ID and username inside session and redirect to current url, otherwise, redirect to current url with faield parameter
        if (password_verify($password, $hasedpassword)) {
            $_SESSION['userID'] = $currentid;
            $_SESSION['username'] = $currentUsername;
            header("location: " . $_SESSION['currentUrl']);
            mysqli_close($conn);
            exit();
        } else {
            header("location: " . $_SESSION['currentUrl'] . "&failed=passwordnotmatch");
            mysqli_close($conn);
            exit();
        }
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
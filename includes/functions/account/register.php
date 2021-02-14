<?php


//If there is post request from Register Form
if (isset($_POST['register'])) {

    //Create connection to database
    require_once "../connectDB.php";

    //Set current username and email
    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];

    //Encrypt current password and set it
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    //SQL to create new user record
    $sql = "INSERT INTO User (username, email, passcode) VALUES ('$username', '$email','$password')";

    //If query is NOT success, redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {

        //SQL to get current user data
        $getID_query = "SELECT id, username FROM User WHERE username = '$username'";
        $result = mysqli_query($conn, $getID_query);

        //If user data is successfully retrieved, set user ID and username into session and redirect to current url, otherwise, redirect to current url with failed parameter
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $currentid = $row['id'];
                $currentUsername = $row['username'];
            }
            session_start();
            $_SESSION['userID'] = $currentid;
            $_SESSION['username'] = $currentUsername;
            header("location: " . $_SESSION['currentUrl']);
            mysqli_close($conn);
            exit();
        } else {
            header("location: " . $_SESSION['currentUrl'] . "&failed=autologinfailed");
            mysqli_close($conn);
            exit();
        }
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtoregisteruser");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
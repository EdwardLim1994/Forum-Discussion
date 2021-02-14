<?php
//start session
session_start();

//If there is post request from Delete answer form
if (isset($_POST['deleteAnswerSubmit'])) {
    //Create connection to database
    require_once "../connectDB.php";

    // Set current answer ID
    $answerID = $_POST['deleteAnswerID'];

    //SQl to delete current answer
    $sql = "DELETE FROM Answer WHERE id = '$answerID'";

    //If query is successful, redirect to current url with success parameter, otherwise redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {
        header("location: " . $_SESSION['currentUrl'] . "&success=successtodeleteanswer");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtodeleteanswer");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
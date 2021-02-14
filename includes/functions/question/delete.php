<?php

//start session
session_start();

//If there is post request from Delete question form
if (isset($_POST['deleteQuestionSubmit'])) {

    //Create connection to database
    require_once "../connectDB.php";

    // Set current question ID
    $questionID = $_POST['deleteQuestionID'];

    //SQL to delete current question
    $sql = "DELETE FROM Question WHERE Question.id = '$questionID'";

    //If query is successful, redirect to home page with success parameter, otherwise redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {
        header("location: ../../../list.php?page=1&success=successtodeletequestion");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtodeletequestion");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
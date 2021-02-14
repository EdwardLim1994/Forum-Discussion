<?php

//start session
session_start();

//If there is post request from Edit Question form
if (isset($_POST['editQuestionSubmit'])) {

    //Create connection to database
    require_once "../connectDB.php";

    //Set current question ID, title and content
    $questionID =  $_POST['editQuestionID'];
    $questionTitle =  addslashes($_POST['editQuestionTitle']);
    $questionContent = addslashes($_POST['editQuestionContent']);

    //SQL to update the question
    $sql = "UPDATE Question SET title = '$questionTitle', content = '$questionContent' WHERE id = $questionID";

    //If query is successful, redirect to current url with success parameter, otherwise redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {
        header("location: " . $_SESSION['currentUrl'] . "&success=successtoeditquestion");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtoeditquestion");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
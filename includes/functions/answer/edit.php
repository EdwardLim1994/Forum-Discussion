<?php
//start session
session_start();

//If there is post request from Edit Answer form
if (isset($_POST['editAnswerSubmit'])) {

    //Create connection to database
    require_once "../connectDB.php";

    //Set current answer ID and content
    $answerID = $_POST['editAnswerID'];
    $answerContent = addslashes($_POST['editAnswerContent']);

    //SQL to update current answer
    $sql = "UPDATE Answer SET answer = '$answerContent' WHERE id = '$answerID'";

    //If query is successful, redirect to current url with success parameter, otherwise redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {
        header("location: " . $_SESSION['currentUrl'] . "&success=successtoeditanswer");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtoeditanswer");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
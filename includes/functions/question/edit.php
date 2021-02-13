<?php
session_start();
if (isset($_POST['editQuestionSubmit'])) {

    require_once "../connectDB.php";

    $questionID =  $_POST['editQuestionID'];
    $questionTitle =  addslashes($_POST['editQuestionTitle']);
    $questionContent = addslashes($_POST['editQuestionContent']);

    $sql = "UPDATE Question SET title = '$questionTitle', content = '$questionContent' WHERE id = $questionID";

    if (mysqli_query($conn, $sql)) {

        header("location: " . $_SESSION['currentUrl'] . "&success=successtoeditquestion");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&reason=failedtoeditquestion");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&reason=cannotreceivepostdata");
    exit();
}
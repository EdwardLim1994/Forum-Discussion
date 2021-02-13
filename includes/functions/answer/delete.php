<?php
session_start();
if (isset($_POST['deleteAnswerSubmit'])) {

    require_once "../connectDB.php";

    $answerID = $_POST['deleteAnswerID'];


    $sql = "DELETE FROM Answer WHERE id = '$answerID'";

    if (mysqli_query($conn, $sql)) {

        header("location: " . $_SESSION['currentUrl'] . "&success=successtodeleteanswer");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&reason=failedtodeleteanswer");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&reason=cannotreceivepostdata");
    exit();
}
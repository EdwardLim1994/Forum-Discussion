<?php
session_start();
if (isset($_POST['answerSubmit'])) {

    require_once "../connectDB.php";

    $newAnswer = addslashes($_POST['editAnswerContent']);
    $newAnswerID = $_POST['editAnswerID'];

    $sql = "UPDATE Answer SET answer = '$newAnswer' WHERE id = '$newAnswerID'";

    if (mysqli_query($conn, $sql)) {

        header("location: " . $_SESSION['currentUrl'] . "&success=successtoeditanswer");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&reason=failedtoeditanswer");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&reason=cannotreceivepostdata");
    exit();
}
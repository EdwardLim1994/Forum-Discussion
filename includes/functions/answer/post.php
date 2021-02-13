<?php
session_start();

if (isset($_POST['answerSubmit'])) {
    $answer = $_POST['postAnswerContent'];
    $userID = $_POST['userID'];
    $questionID = $_POST['questionID'];

    require_once "../connectDB.php";
    $sql = "INSERT INTO Answer (answer, postdate, user_id, question_id) VALUES ('$answer', NOW(), '$userID', '$questionID')";

    if (mysqli_query($conn, $sql)) {
        header("location: " . $_SESSION['currentUrl'] . "&success=successtopostanswer");
        mysqli_close($conn);
        exit();
    } else {

        header("location: " . $_SESSION['currentUrl'] . "&reason=failedtopostanswer");
        mysqli_close($conn);
        exit();
    }
} else {

    header("location: ../../../forum.php?question=" . $_SESSION['currentQuestionID'] . "&reason=cannotreceivepostdata");
    exit();
}
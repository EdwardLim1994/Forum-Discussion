<?php

if (isset($_POST['answerSubmit'])) {

    require_once "../connectDB.php";

    $newAnswer = $_POST['editAnswerContent'];
    $newAnswerID = $_POST['answerID'];
    $questionID = $_POST['questionID'];

    $sql = "UPDATE Answer SET answer = '$newAnswer' WHERE id = '$newAnswerID'";

    if (mysqli_query($conn, $sql)) {

        header("location: ../../../forum.php?question=" . $questionID . "&reason=editanswerquerysuccess");
        mysqli_close($conn);
        exit();
    } else {
        header("location: ../../../forum.php?question=" . $questionID . "&reason=editanswerqueryfailed");
        mysqli_close($conn);
        exit();
    }
}
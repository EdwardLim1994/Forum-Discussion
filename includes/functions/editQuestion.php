<?php

if (isset($_POST['editQuestionSubmit'])) {

    require_once "./connectDB.php";

    $questionID =  $_POST['editQuestionID'];
    $questionTitle =  $_POST['editQuestionTitle'];
    $questionContent = $_POST['editQuestionContent'];

    $sql = "UPDATE Question SET title = '$questionTitle', content = '$questionContent' WHERE id = '$questionID'";

    if (mysqli_query($conn, $sql)) {

        header("location: ../../forum.php?question=".$questionID."&reason=editquestionquerysuccess");
        mysqli_close($conn);
        exit();
    } else {
        header("location: ../../forum.php?question=".$questionID."&reason=editquestionqueryfailed");
        mysqli_close($conn);
        exit();
    }
}

<?php

if (isset($_POST['deleteQuestionSubmit'])) {

    require_once "../connectDB.php";

    $questionID = $_POST['deleteQuestionID'];

    $sql = "DELETE FROM Question WHERE Question.id = '$questionID'";

    if (mysqli_query($conn, $sql)) {

        header("location: ../../../list.php?&reason=deletequestionquerysuccess");
        mysqli_close($conn);
        exit();
    } else {
        header("location: ../../../forum.php?question=" . $questionID . "&reason=deletequestionqueryfailed");
        mysqli_close($conn);
        exit();
    }
}
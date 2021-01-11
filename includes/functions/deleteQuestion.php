<?php

if (isset($_POST['deleteQuestionSubmit'])) {

    require_once "./connectDB.php";

    $questionID = $_POST['deleteQuestionID'];

    $sql = "DELETE FROM Question, Answer USING Question INNER JOIN Answer WHERE Question.id = '$questionID' AND Question.id = Answer.question_id";

    if (mysqli_query($conn, $sql)) {

        header("location: ../../forum.php?question='$questionID'");
        mysqli_close($conn);
        exit();
    } else {
        header("location: ../../forum.php?question='$questionID'&reason=deletequestionqueryfailed");
        mysqli_close($conn);
        exit();
    }
}

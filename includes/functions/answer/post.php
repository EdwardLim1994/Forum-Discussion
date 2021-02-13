<?php
session_start();

if (isset($_POST['answerSubmit'])) {
    $answer = $_POST['postAnswerContent'];
    $userID = $_POST['userID'];
    $questionID = $_POST['questionID'];

    require_once "../connectDB.php";
    $sql = "INSERT INTO Answer (answer, postdate, user_id, question_id) VALUES ('$answer', NOW(), '$userID', '$questionID')";

    if (mysqli_query($conn, $sql)) {

        $last_id = mysqli_insert_id($conn);

        $sql = "INSERT IGNORE INTO Vote (user_id, answer_id) VALUES ('$userID', '$last_id')";

        if (mysqli_query($conn, $sql)) {
            header("location: ../../../forum.php?question=" . $questionID . "&success=successtopostanswer");
            mysqli_close($conn);
            exit();
        } else {

            $sql = "DELETE FROM Answer WHERE answer_id = $last_id";
            mysqli_query($conn, $sql);

            header("location: ../../../forum.php?question=" . $questionID . "&reason=cannotcreatevoterecord");
            mysqli_close($conn);
            exit();
        }
    } else {

        header("location: ../../../forum.php?question=" . $questionID . "&reason=failedtopostanswer");
        mysqli_close($conn);
        exit();
    }
} else {

    header("location: ../../../forum.php?question=" . $_SESSION['currentQuestionID'] . "&reason=cannotreceivepostdata");
    exit();
}
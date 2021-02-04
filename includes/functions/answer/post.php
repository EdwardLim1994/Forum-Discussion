<?php
session_start();
require_once "../connectDB.php";

if (isset($_POST['content'])) {
    $answer = $_POST['content'];
    $userID = $_POST['userID'];
    $questionID = $_POST['questionID'];

    require_once "./connectDB.php";
    $last_id = mysqli_insert_id($conn);
    $sql = "INSERT INTO Answer (answer, postdate, user_id, question_id) VALUES ('$answer', NOW(), '$userID', '$questionID')";

    if (mysqli_query($conn, $sql)) {

        $last_id = mysqli_insert_id($conn);

        $sql = "INSERT IGNORE INTO Vote (user_id, answer_id) VALUES ('$userID', '$last_id')";

        if (mysqli_query($conn, $sql)) {
            echo "http://localhost/Forum-Discussion/forum.php?question=" . $questionID . "&status=success";
            mysqli_close($conn);
            exit();
        } else {
            echo "http://localhost/Forum-Discussion/forum.php?question=" . $questionID . "&reason=cannotcreatevoterecord";
            mysqli_close($conn);
            exit();
        }
    } else {
        mysqli_close($conn);
        echo "http://localhost/Forum-Discussion/forum.php?question=" . $questionID . "&status=failed";
        exit();
    }
} else {

    echo "http://localhost/Forum-Discussion/forum.php?question=" . $questionID . "&reason=cannotpostanswer";
    exit();
}
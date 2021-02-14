<?php
session_start();
if (isset($_POST['deleteQuestionSubmit'])) {

    require_once "../connectDB.php";

    $questionID = $_POST['deleteQuestionID'];

    $sql = "DELETE FROM Question WHERE Question.id = '$questionID'";

    if (mysqli_query($conn, $sql)) {

        header("location: ../../../list.php?page=1&success=successtodeletequestion");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtodeletequestion");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
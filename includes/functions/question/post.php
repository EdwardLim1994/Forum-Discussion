<?php
session_start();
if (isset($_POST['questionSubmit'])) {

    if (isset($_SESSION['userID'])) {

        $title = $_POST["questionTitle"];
        $content = addslashes($_POST["questionContent"]);
        $user_id = $_SESSION['userID'];

        require_once '../connectDB.php';

        $sql = "INSERT INTO Question (title, content, postdate, user_id) VALUES ('$title', '$content', NOW(), '$user_id')";

        if (mysqli_query($conn, $sql)) {
            header("location: " . $_SESSION['currentUrl'] . "&success=successtopostquestion");
            mysqli_close($conn);
            exit();
        } else {
            header("location: " . $_SESSION['currentUrl'] . "&failed=failedtopostquestion");
            mysqli_close($conn);
            exit();
        }
    }
} else {
    header("location: " . $_SESSION['currentUrl'] . "&failed=cannotreceivepostdata");
    exit();
}
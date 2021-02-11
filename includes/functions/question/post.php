<?php
session_start();
if (isset($_POST['questionSubmit'])) {

    if (isset($_SESSION['id'])) {

        $title = $_POST["questionTitle"];
        $content = addslashes($_POST["questionContent"]);
        $user_id = $_SESSION['id'];

        require_once '../connectDB.php';

        $sql = "INSERT INTO Question (title, content, postdate, user_id) VALUES ('$title', '$content', NOW(), '$user_id')";

        if (mysqli_query($conn, $sql)) {
            header("location: ../../../list.php?page=1&success=successtopostquestion");
            mysqli_close($conn);
            exit();
        } else {
            header("location: ../../../list.php?page=1&reason=failedtopostquestion");
            mysqli_close($conn);
            exit();
        }
    }
} else {
    header("location: ../../../list.php?page=1&reason=cannotreceivepostdata");
    exit();
}
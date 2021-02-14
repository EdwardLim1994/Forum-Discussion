<?php

//start session
session_start();

//If there is post request from post question form
if (isset($_POST['postQuestionSubmit'])) {

    //If user is currently logged in
    if (isset($_SESSION['userID'])) {

        //Create connection to database
        require_once '../connectDB.php';

        //Set current userID, question title and question content
        $questionTitle = $_POST["postQuestionTitle"];
        $questionContent = addslashes($_POST["postQuestionContent"]);
        $userID = $_SESSION['userID'];

        //SQL to create a new question record
        $sql = "INSERT INTO Question (title, content, postdate, user_id) VALUES ('$questionTitle', '$questionContent', NOW(), '$userID')";
        
        //If query is successful, redirect to current url with success parameter, otherwise redirect to current url with failed parameter
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
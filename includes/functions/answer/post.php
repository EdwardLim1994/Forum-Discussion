<?php
//start session
session_start();

//If there is post request from post answer form
if (isset($_POST['postAnswerSubmit'])) {

    //Create connection to database
    require_once "../connectDB.php";
    
    //Set current answer ID, its content and user ID
    $answerContent = $_POST['postAnswerContent'];
    $userID = $_POST['currentUserID'];
    $questionID = $_POST['currentQuestionID'];

    //SQL to create a new answer record
    $sql = "INSERT INTO Answer (answer, postdate, user_id, question_id) VALUES ('$answerContent', NOW(), '$userID', '$questionID')";

    //If query is successful, redirect to current url with success parameter, otherwise redirect to current url with failed parameter
    if (mysqli_query($conn, $sql)) {
        header("location: " . $_SESSION['currentUrl'] . "&success=successtopostanswer");
        mysqli_close($conn);
        exit();
    } else {
        header("location: " . $_SESSION['currentUrl'] . "&failed=failedtopostanswer");
        mysqli_close($conn);
        exit();
    }
} else {
    header("location: ../../../forum.php?question=" . $_SESSION['currentQuestionID'] . "&failed=cannotreceivepostdata");
    exit();
}
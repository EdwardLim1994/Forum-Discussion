<?php
session_start();
    if(isset($_POST['content'])){
        $answer = $_POST['content'];
        $userID = $_POST['userID'];
        $questionID = $_POST['questionID'];
        
        require_once "./connectDB.php";

        $sql = "INSERT INTO Answer (answer, postdate, user_id, question_id) VALUES ('$answer', NOW(), '$userID', '$questionID')";

        if(mysqli_query($conn, $sql)){

            echo "http://localhost/Forum-Discussion/forum.php?question=".$_SESSION['questionID']."&status=success";
            mysqli_close($conn);
            exit();
        }else{
            mysqli_close($conn);
            echo "http://localhost/Forum-Discussion/forum.php?question=".$_SESSION['questionID']."&status=failed";
            exit();
        }

    }else{
        
        echo "http://localhost/Forum-Discussion/forum.php?question=".$_SESSION['questionID']."&reason=cannotpostanswer";
        exit();
    }



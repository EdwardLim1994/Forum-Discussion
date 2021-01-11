<?php

    if(isset($_POST['answerSubmit'])){
        
        require_once "./connectDB.php";

        $newAnswer = $_POST['editAnswerContent'];
        $newAnswerID = $_POST['editAnswerID'];

        $sql = "UPDATE Answer SET answer = '$newAnswer' WHERE id = '$newAnswerID'";

        if (mysqli_query($conn, $sql)) {

          header("location: ../../forum.php?question='$questionID'");
          mysqli_close($conn);
          exit();
      } else {
          header("location: ../../forum.php?question='$questionID'&reason=editanswerqueryfailed");
          mysqli_close($conn);
          exit();
      }
    }
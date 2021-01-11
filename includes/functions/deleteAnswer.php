<?php

if (isset($_POST['deleteAnswerSubmit'])) {

  require_once "./connectDB.php";

  $answerID = $_POST['deleteAnswerID'];
  $questionID = $_POST['deleteAnswerQuestionID'];

  $sql = "DELETE FROM Answer WHERE id = '$answerID'";

  if (mysqli_query($conn, $sql)) {

    header("location: ../../forum.php?question=".$questionID."&reason=deleteanswerquerysuccess");
    mysqli_close($conn);
    exit();
  } else {
    header("location: ../../forum.php?question=".$questionID."&reason=deleteanswerqueryfailed");
    mysqli_close($conn);
    exit();
  }
}

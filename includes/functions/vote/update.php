<?php

if (isset($_POST['isVoted'])) {
    require_once "../connectDB.php";

    $voteState = $_POST['isVoted'] > 0 ? true : false;
    $answerId = $_POST['answerID'];
    $userId = $_POST['userID'];

    if ($voteState) {
        mysqli_query($conn, "INSERT INTO Vote (user_id, answer_id) VALUES ($userId, $answerId)");
        mysqli_query($conn, "UPDATE Answer SET vote=vote+1 WHERE id=$answerId");
    } else {
        mysqli_query($conn, "DELETE FROM Vote WHERE user_id=$userId AND answer_id=$answerId");
        mysqli_query($conn, "UPDATE Answer SET vote=vote-1 WHERE id=$answerId");
    }

    $result = mysqli_query($conn, "SELECT vote FROM Answer WHERE id=$answerId");
    mysqli_close($conn);
    echo mysqli_fetch_array($result)['vote'];
}
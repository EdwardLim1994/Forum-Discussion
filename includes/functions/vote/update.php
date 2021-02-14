<?php

//If there is post request from vote button
if (isset($_POST['isVoted'])) {

    //Create Connection to database
    require_once "../connectDB.php";

    //Set current user ID and answer ID
    $answerId = $_POST['answerID'];
    $userId = $_POST['userID'];

    //Set current vote state to TRUE if it is 1 or FALSE if it is 0
    $voteState = $_POST['isVoted'] > 0 ? true : false;

    //If vote state is true, create vote record and plus 1 to total vote, otherwise, delete vote record and minus 1 to total vote
    if ($voteState) {
        mysqli_query($conn, "INSERT INTO Vote (user_id, answer_id) VALUES ($userId, $answerId)");
        mysqli_query($conn, "UPDATE Answer SET vote=vote+1 WHERE id=$answerId");
    } else {
        mysqli_query($conn, "DELETE FROM Vote WHERE user_id=$userId AND answer_id=$answerId");
        mysqli_query($conn, "UPDATE Answer SET vote=vote-1 WHERE id=$answerId");
    }

    //Get current total vote for this answer
    $result = mysqli_query($conn, "SELECT vote FROM Answer WHERE id=$answerId");
    mysqli_close($conn);

    //Return current total vote 
    echo mysqli_fetch_array($result)['vote'];
}
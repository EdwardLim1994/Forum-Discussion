<?php

$sql_delete = "DELETE FROM Vote";
$sql_voteRecord = "INSERT IGNORE INTO Vote (user_id, answer_id) 
                    SELECT u.id as userID, a.id as answerID
                    FROM Answer as a, User AS u 
                    WHERE a.id = 3";
                    //WHERE a.question_id = " . $_GET['question'];
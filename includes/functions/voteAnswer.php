<?php

    //require_once "./connectDB.php";

    if(isset($_POST['isVoted'])){
        require_once "./connectDB.php";
        
        $voteState = $_POST['isVoted'];
        $answerId = $_POST['answer_id'];
        $userId = $_POST['user_id'];

        $sql = "UPDATE Vote SET isVoted = '$voteState' WHERE answer_id = $answerId AND user_id = $userId";

        if(mysqli_query($conn, $sql)){

            $sql = "SELECT COUNT(*) as count FROM Vote WHERE answer_id = '$answerId' AND IsVoted = true";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $voteCount = $row['count'];
                }
            }

            echo $voteCount;
            mysqli_close($conn);
        }else{
            echo "failed";
            mysqli_close($conn);
        }
    }



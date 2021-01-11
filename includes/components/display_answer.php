<?php



$sql = "SELECT 
                Answer.id as answerID,
                Answer.answer as answerAnswer,
                date_format(Answer.postdate, '%Y-%m-%d %h:%i %p') as answerDateTime, 
                User.id as userID,
                User.username as userName
            FROM Answer
            LEFT JOIN Question
            ON Question.id = Answer.question_id
            LEFT JOIN User
            ON User.id = Answer.user_id
            WHERE Answer.question_id = " . $_GET['question'] . ";";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $answerId = $row['answerID'];
        $answerAnswer = $row['answerAnswer'];
        $answerDatetime = $row['answerDateTime'];
        $userID = $row['userID'];
        $username = $row['userName'];

?>
        <div class="card my-3">
            <div class="card-body p-4 px-5">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title"><?php echo $username; ?></h4>
                    </div>
                    <div class="col-3 py-auto text-right">
                        <p><?php echo $answerDatetime; ?></p>
                    </div>
                </div>
                <div class="row py-3">
                    <p class="card-text text-justify" style="font-size:16px;">
                        <?php echo $answerAnswer; ?>
                    </p>
                </div>
            </div>
        </div>
<?php
    }
} else {
}

mysqli_close($conn);
?>
<?php

$rowsPerPage = 15;

$sql = "SELECT * FROM Answer";

$result = mysqli_query($conn, $sql);

$rowCount = mysqli_num_rows($result);

$pageNum = ceil($rowCount / $rowsPerPage);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$thisPageFirstRow = ($page - 1) * $rowsPerPage;

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
            WHERE Answer.question_id = $questionID
            LIMIT $thisPageFirstRow, $rowsPerPage";

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
            <div class="col-8">
                <h4 class="card-title"><?php echo $username; ?></h4>
                <p><?php echo $answerDatetime; ?></p>
            </div>
            <?php
            if (isset($_SESSION['id']) == $userID) {
            ?>
                <div class="col-1 mb-auto mb-4">
                    <button class="btn btn-default btn-edit-answer" id="answerEditBtn-<?php echo $answerId; ?>" data-toggle="modal" data-target="#editAnswerModal">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div class="col-1 mb-auto mb-4">
                    <button class="btn btn-danger btn-delete-answer" id="answerDeleteBtn-<?php echo $answerId; ?>" data-toggle="modal" data-target="#confirmDeleteAnswerModal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            <?php
            } else {
            ?>
                <div class="col-1 mb-auto mb-4"></div>
                <div class="col-1 mb-auto mb-4"></div>
            <?php
            }
            ?>

            <?php
            $vote_sql = "SELECT COUNT(*) as count FROM Vote WHERE answer_id = '$answerId' AND IsVoted = true";
            $vote_result = mysqli_query($conn, $vote_sql);
            if (mysqli_num_rows($vote_result) > 0) {
                while ($vote_row = mysqli_fetch_assoc($vote_result)) {
                    $voteCount = $vote_row['count'];
            ?>
                    <div class="col-1 mb-auto mb-4">
                        <button class="btn btn-gray btn-vote-answer" id="voteAnswer-<?php echo $answerId; ?>">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="col-1 text-center my-auto mb-4">
                        <p id="voteCount"><?php echo $voteCount; ?></p>
                    </div>
            <?php
                }
            }
            ?>

        </div>
        <div class="row py-3">
            <p class="card-text text-justify" id="answerContainer-<?php echo $answerId; ?>" style="font-size:16px;"><?php echo $answerAnswer; ?></p>
        </div>
    </div>
</div>
<?php

    }
}

?>

<?php



if (isset($_SESSION['id']) == $userID) {

    include_once "./includes/components/edit_answer_form.php";
    include_once "./includes/components/confirm_delete_answer_alert.php";
}
?>


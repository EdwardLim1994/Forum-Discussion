<?php

if (isset($_GET['question'])) {
    $questionID = $_GET["question"];
    $sql = "SELECT 
                Question.title as questionTitle, 
                Question.content as questionContent, 
                date_format(Question.postdate, '%Y-%m-%d %h:%i %p') as questionDateTime, 
                Question.user_id as userID, 
                User.username as userName 
            
            FROM Question 
            LEFT JOIN User 
            ON Question.user_id = User.id
            WHERE Question.id = '$questionID'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $questionTitle = $row['questionTitle'];
            $questionContent = $row['questionContent'];
            $questionDatetime = $row['questionDateTime'];
            $userID = $row['userID'];
            $username = $row['userName'];


?>
            <div class="card my-3">
                <div class="card-body p-4 px-5">
                    <div class="row">
                        <div class="col-10">
                            <h2 class="card-title text-black" id="questionTitleContainer-<?php echo $_GET['question']; ?>"><?php echo $questionTitle; ?></h2>
                        </div>
                        <?php
                        if (isset($_SESSION['id']) == $userID) {
                        ?>
                            <div class="col-1 mb-4">
                                <button class="btn btn-default btn-edit-question" id="questionEditBtn-<?php echo $_GET['question']; ?>" data-toggle="modal" data-target="#editQuestionModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <div class="col-1 mb-4">
                                <button class="btn btn-danger btn-delete-question" id="questionDeleteBtn-<?php echo $_GET['question']; ?>" data-toggle="modal" data-target="#confirmDeleteQuestionModal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-9 py-auto text-black">
                            <p class="text-black">from <?php echo $username; ?></p>
                        </div>
                        <div class="col-3 py-auto text-right">
                            <p class="text-black"><?php echo $questionDatetime; ?></p>
                        </div>
                    </div>
                    <div class="row py-3">
                        <p class="card-text text-justify" id="questionContentContainer-<?php echo $_GET['question']; ?>" style="font-size:20px;"><?php echo $questionContent; ?></p>
                    </div>
                </div>
            </div>

<?php
        }
    }
} else {
}

if (isset($_SESSION['id']) == $userID) {

    include_once "./includes/components/edit_question_form.php";
    include_once "./includes/components/confirm_delete_question_alert.php";
}
?>
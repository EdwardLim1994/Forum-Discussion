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
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                            <h2 class="card-title text-black" id="questionTitleContainer-<?php echo $questionID; ?>"><?php echo $questionTitle; ?></h2>
                            <p class="text-black">from <?php echo $username; ?></p>
                            <p class="text-black dateSize"><?php echo $questionDatetime; ?></p>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                            <div class="row">
                                <?php
                                if (isset($_SESSION['id']) == $userID) {
                                ?>
                                    <div class="col-6 text-center">
                                        <button class="btn btn-default btn-edit-question p-2 px-3" id="questionEditBtn-<?php echo $questionID; ?>" data-toggle="modal" data-target="#editQuestionModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                    <div class="col-6 text-center">
                                        <button class="btn btn-danger btn-delete-question p-2 px-3" id="questionDeleteBtn-<?php echo $questionID; ?>" data-toggle="modal" data-target="#confirmDeleteQuestionModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <p class="card-text text-justify" id="questionContentContainer-<?php echo $questionID; ?>" style="font-size:20px;"><?php echo $questionContent; ?></p>
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
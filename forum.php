<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './includes/head.php';
    ?>
</head>

<body>
    <?php

    if (isset($_GET['reason'])) {
        if ($_GET['reason'] == "passwordnotmatch") {
            include_once './includes/components/wrong_password_alert.php';
        } else if ($_GET['reason'] == "editanswerqueryfailed") {
            include_once './includes/components/failed_edit_answer_alert.php';
        } else if ($_GET['reason'] == "editquestionqueryfailed") {
            include_once './includes/components/failed_edit_question_alert.php';
        } else if ($_GET['reason'] == "deleteanswerqueryfailed") {
            include_once './includes/components/failed_delete_answer_alert.php';
        } else if ($_GET['reason'] == "deletequestionqueryfailed") {
            include_once './includes/components/failed_delete_question_alert.php';
        } else if ($_GET['reason'] == "editanswerquerysuccess") {
            include_once './includes/components/success_edit_answer_alert.php';
        } else if ($_GET['reason'] == "editquestionquerysuccess") {
            include_once './includes/components/success_edit_question_alert.php';
        } else if ($_GET['reason'] == "deleteanswerquerysuccess") {
            include_once './includes/components/success_delete_answer_alert.php';
        } else if ($_GET['reason'] == "deletequestionquerysuccess") {
            include_once './includes/components/success_delete_question_alert.php';
        }
    }

    include_once './includes/components/success_post_answer_alert.php';

    if (isset($_GET['status'])) {
        if ($_GET['status'] == "success") {
        } else if ($_GET['status']  == "failed") {
            include_once './includes/components/failed_post_answer_alert.php';
        }
    }


    if (!isset($_SESSION['id'])) {
        include_once './includes/components/no_account_alert.php';
    }
    ?>

    <?php
    include_once './includes/components/database_failure.php';
    ?>

    <?php
    include_once './includes/header.php';
    ?>

    <?php
    require_once "./includes/functions/connectDB.php";

    $sql = "SELECT title FROM Question WHERE id = " . $_GET['question'];
    $question_title = "";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $question_title = $row['title'];
        }
    }
    ?>

    <!-- Main Section -->
    <main class="main-section">
        <div class="container">
            <section class="container stickyContent bg-white position-fixed pt-2 coverTopPart">
                <h1 class="py-1 pb-1"><?php echo $question_title; ?></h1>
                <div class="row py-3 ">
                    <div class="col text-left my-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white">
                                <li class="breadcrumb-item"><a href="./list.php?page=1">Discussion Forum</a></li>
                                <li class="breadcrumb-item active"><?php echo $question_title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </section>

            <section class="answerList">
                <section class="questionDisplay">
                    <?php
                    include "./includes/components/display_question_on_forum.php";
                    ?>
                </section>

                <?php
                include "./includes/components/display_answer.php";
                ?>

            </section>

            <section class="py-1" id="pagination">
                <?php
                include_once "./includes/components/pagination_answer.php";
                ?>
            </section>

            <section class="postAnswer container">
                <?php
                include_once "./includes/components/post_answer_form.php"
                ?>
            </section>

        </div>
    </main>

    <!-- Footer -->
    <?php
    include_once './includes/footer.php';
    ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {

        <?php
        if (isset($_GET['reason'])) {
            if ($_GET['reason'] == "passwordnotmatch") {
                echo "$('#passwordNotMatchModal').modal('show');";
            } else if ($_GET['reason'] == "editanswerqueryfailed") {
                echo "$('#failedEditAnswerModal').modal('show');";
            } else if ($_GET['reason'] == "editquestionqueryfailed") {
                echo "$('#failedEditQuestionModal').modal('show');";
            } else if ($_GET['reason'] == "deleteanswerqueryfailed") {
                echo "$('#failedDeleteAnswerModal').modal('show');";
            } else if ($_GET['reason'] == "deletequestionqueryfailed") {
                echo "$('#failedDeleteQuestionModal').modal('show');";
            } else if ($_GET['reason'] == "editanswerquerysuccess") {
                echo "$('#successEditAnswerModal').modal('show');";
            } else if ($_GET['reason'] == "editquestionquerysuccess") {
                echo "$('#successEditQuestionModal').modal('show');";
            } else if ($_GET['reason'] == "deleteanswerquerysuccess") {
                echo "$('#successDeleteAnswerModal').modal('show');";
            } else if ($_GET['reason'] == "deletequestionquerysuccess") {
                echo "$('#successDeleteQuestionModal').modal('show');";
            }
        }

        if (isset($_GET['status'])) {
            if ($_GET['status'] == "success") {
                echo "$('#successPostAnswerModal').modal('show');";
            } else if ($_GET['status']  == "failed") {
                echo "$('#failedPostAnswerModal').modal('show');";
            }
        }

        ?>

        $("#postAnswerAction").click(function() {
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                var content = $("#answerContent").val();
                var questionID = <?php echo $_GET["question"]; ?>;
                var userID = <?php echo $_SESSION["id"] ?>;

                if (content == "" || content == "Cannot post empty answer") {
                    $("#answerContent").val("Cannot post empty answer");
                } else {
                    $.ajax({
                        type: "POST",
                        url: './includes/functions/postAnswer.php',
                        data: {
                            content: content,
                            questionID: questionID,
                            userID: userID
                        },
                        success: function(data) {
                            window.location.replace(data);
                        },
                        error: function() {
                            $('#databaseFailureModal').modal('show');
                        }
                    });
                }

            <?php
            } else {
                echo "$('#cannotPostAnswerModal').modal('show');";
            }
            ?>
        });

        $(".btn-edit-answer").click(function() {
            var answer_id = $(this).attr('id');
            var current_index = answer_id.split('-');
            var answer = $("#answerContainer-" + current_index[1]).text();

            $("#editAnswerContent").val(answer);
            $("#editAnswerID").val(current_index[1]);
            $("#editAnswerQuestionID").val(<?php echo $_GET['question']; ?>);
        });

        $(".btn-delete-answer").click(function() {
            var answer_id = $(this).attr('id');
            var current_index = answer_id.split('-');

            $("#deleteAnswerID").val(current_index[1]);
            $("#deleteAnswerQuestionID").val(<?php echo $_GET['question']; ?>);
        });

        $(".btn-edit-question").click(function() {
            var question_id = $(this).attr('id');
            var current_index = question_id.split('-');
            var questionTitle = $("#questionTitleContainer-" + current_index[1]).text();
            var questionContent = $("#questionContentContainer-" + current_index[1]).text();

            $("#editQuestionTitle").val(questionTitle);
            $("#editQuestionContent").val(questionContent);
            $("#editQuestionID").val(current_index[1]);
        });

        $(".btn-delete-question").click(function() {
            var question_id = $(this).attr('id');
            var current_index = question_id.split('-');

            $("#deleteQuestionID").val(current_index[1]);
        });

        $(".btn-vote-answer").click(function() {

            <?php
            if (isset($_SESSION['id'])) {
            ?>
                var answer_id = $(this).attr('id');
                var current_index = answer_id.split('-');

                if ($("#voteAnswer-" + current_index[1]).hasClass("btn-gray")) {

                    $.ajax({
                        type: "POST",
                        url: './includes/functions/voteAnswer.php',
                        data: {
                            isVoted: 1,
                            answer_id: current_index[1],
                            user_id: <?php echo $_SESSION['id'] ?>
                        },
                        success: function(count) {
                            $("#voteAnswer-" + current_index[1]).removeClass('btn-gray').addClass('btn-pink');
                            $("#voteCount-" + current_index[1]).empty().text(count);

                        },
                        error: function() {
                            $('#databaseFailureModal').modal('show');
                
                        }
                    });

                } else if ($("#voteAnswer-" + current_index[1]).hasClass("btn-pink")) {
                    $.ajax({
                        type: "POST",
                        url: './includes/functions/voteAnswer.php',
                        data: {
                            isVoted: 0,
                            answer_id: current_index[1],
                            user_id: <?php echo $_SESSION['id'] ?>
                        },
                        success: function(count) {
                            $("#voteAnswer-" + current_index[1]).removeClass('btn-pink').addClass('btn-gray');
                            $("#voteCount-" + current_index[1]).empty().text(count);
                        },
                        error: function() {
                            $('#databaseFailureModal').modal('show');
                        }
                    });
                }
            <?php
            } else {
            ?>
                $('#cannotPostAnswerModal').modal('show');
            <?php
            }
            ?>

        });



        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 1) {
                if ($pageNum == 1) {
        ?> $("#previousPageContainer").addClass("disabled");
                    $("#nextPageContainer").addClass("disabled");
                <?php
                } else {
                ?> $("#previousPageContainer").addClass("disabled");
                    $("#nextPageContainer").removeClass("disabled");
                <?php
                }
            } else if ($_GET['page'] == $pageNum) {
                ?> $("#previousPageContainer").removeClass("disabled");
                $("#nextPageContainer").addClass("disabled");
            <?php
            } else {
            ?> $("#previousPageContainer").removeClass("disabled");
                $("#nextPageContainer").removeClass("disabled");
        <?php
            }
        }
        ?>

        $("#previousPageBtn").click(function() {

            if (!$("#previousPageContainer").hasClass("disabled")) {
                window.location.replace("http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo ($_GET["page"] - 1); ?>");
            }
        });

        $("#nextPageBtn").click(function() {
            if (!$("#nextPageContainer").hasClass("disabled")) {
                window.location.replace("http://localhost/Forum-Discussion/forum.php?question=<?php echo $_GET['question']; ?>&page=<?php echo ($_GET["page"] + 1); ?>");
            }
        });
    });
</script>

</html>
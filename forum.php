<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once './includes/head.php';
    ?>
</head>

<body>
    <?php
    if (isset($_GET['reason']) == "passwordnotmatch") {
        include_once './includes/components/wrong_password_alert.php';
    }

    if(isset($_GET['status']) == "success"){
        include_once './includes/components/success_post_answer_alert.php';
    }else if(isset($_GET['status'])  == "failed"){
        include_once './includes/components/failed_post_answer_alert.php';
    }

    
    
    if (!isset($_SESSION['id'])) {
        include_once './includes/components/post_answer_without_account_alert.php';
    }
    ?>

    <?php
    include_once './includes/header.php';
    ?>

    <!-- Main Section -->
    <main class="main-section">
        <div class="container">
            <section class="container stickyContent bg-white position-fixed pt-1">
                <h1 class="py-2">Question 1</h1>
                <div class="row py-3 pb-4">
                    <div class="col-6 text-left my-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white">
                                <li class="breadcrumb-item"><a href="./list.php">Question</a></li>
                                <li class="breadcrumb-item active">Question 1</li>
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

            <section class="py-4" id="pagination">

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
        if (isset($_GET['reason']) == "passwordnotmatch") {
            echo "$('#passwordNotMatchModal').modal('show');";
        }else if(isset($_GET['status']) == "success"){
            echo "$('#successPostAnswerModal').modal('show');";
        }


    
        if(isset($_GET['status'])  == "failed"){
            echo "$('#failedPostAnswerModal').modal('show');";
        }
        ?>

        $("#postAnswerAction").click(function() {

            <?php
            if (isset($_SESSION['id'])) {
            ?>
                var content = $("#answerContent").val();
                var questionID = <?php echo $_GET["question"]; ?>;
                var userID = <?php echo $_SESSION["id"] ?>;

                if (content == "") {

                    console.log("Empty answer");
                } else {
                    $.ajax({
                        type: "POST",
                        url: './includes/functions/postAnswer.php',
                        data: {
                            content: content,
                            questionID: questionID,
                            userID: userID
                        },
                        beforeSend: function() {

                        },
                        success: function(data) {
                            window.location.replace(data);
                        },
                        error: function() {

                        }

                    });
                }

            <?php
            } else {
                echo "$('#cannotPostAnswerModal').modal('show');";
            }
            ?>
        });
    });
</script>

</html>
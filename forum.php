<?php
    //Start a session
    session_start();
    
    //Store current url into session
    $_SESSION['currentUrl'] = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'], 2)[0] . "?page=" . $_GET['page'] . "&question=" . $_GET['question'];

    //if user is currently logged in
    if (isset($_SESSION['userID'])) {
        $hasLogin = true;
        $_SESSION['currentQuestionID'] = $_GET['question'];
    } else {
        $hasLogin = false;
    }

    //Set tab title
    $pageTitle = "Question";

    //Global variable to store status about whether question is existed in database
    $doesListingExist = false;

    //Create connection to server
    require_once './includes/functions/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <!-- Include head -->
        <?php include "./includes/components/parts/head.php"; ?>
    </head>

    <body>
        <!-- Include header -->
        <header class="sticky-top z-depth-1">
            <?php include "./includes/components/parts/header.php"; ?>
        </header>
        <main>
            <div class="container py-2">
            <?php

                //SQL to get question data selected by user from Question Listing
                $sql = "SELECT q.id, q.title, q.content, q.postdate, q.user_id, u.username 
                            FROM Question as q 
                            LEFT JOIN User as u 
                            ON q.user_id = u.id 
                            WHERE q.id = " . $_GET['question'];
                $result = mysqli_query($conn, $sql);

                //If query is success
                if (mysqli_num_rows($result) > 0) :

                    //Loop throught the result
                    while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <!-- Include breadcrumbs -->
                <section class="py-2">
                    <?php include "./includes/components/parts/breadcrumb.php"; ?>
                </section>

                <!-- Question Card -->
                <section class="py-2">
                    <div class="row">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">

                                        <!-- Set Question Title and its ID-->
                                        <h3 class="card-title" id="questionTitle-<?= $row['id'] ?>">
                                            <?= $row['title'] ?>
                                        </h3>

                                        <!-- Set Username -->
                                        <p class="card-title">
                                            <?= $row['username'] ?>
                                        </p>

                                        <!-- Set Post Date -->
                                        <p class="card-title">
                                            <?= date("Y-m-d g:ia", strtotime($row['postdate'])) ?>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <?php 

                                            //If user is currently logged in
                                            if ($hasLogin) {

                                                //If the logged in user is the one who posted this question
                                                if ($_SESSION['userID'] == $row['user_id']) : 
                                        ?>

                                                    <!-- Include the Edit and Delete Button -->
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-3 col-sm-4"></div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                                                            <button class="btn btn-default px-3 editQuestionBtn" data-toggle="modal"
                                                                data-target="#editQuestionModal">
                                                                <i class="fas fa-edit"></i>
                                                                <input type="number" class="d-none"
                                                                    value="<?= $_GET['question'] ?>">
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-2 col-md-3 col-sm-4 text-center" data-toggle="modal"
                                                            data-target="#confirmDeleteQuestionModal">
                                                            <button class="btn btn-danger px-3 deleteQuestionBtn">
                                                                <i class="far fa-trash-alt "></i>
                                                                <input type="number" class="d-none"
                                                                    value="<?= $_GET['question'] ?>">
                                                            </button>
                                                        </div>
                                                    </div>
                                        <?php
                                                endif;
                                            } 
                                        ?>
                                    </div>
                                </div>

                                <!-- Set Question Content -->
                                <p class="card-text text-justify" id="questionContent-<?= $row['id'] ?>">
                                    <?= $row['content'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
                    endwhile;
                endif;
            ?>

                <!-- Include Answer Listing -->
                <section class="py-2">
                    <?php include "./includes/components/parts/answer-listing.php"; ?>
                </section>

                <!-- Include Pagination -->
                <section class="py-2">
                    <?php include "./includes/components/parts/pagination.php"; ?>
                </section>

                <!-- Post answer form -->
                <section class="py-2">

                    <!-- If user is currently logged in, render post answer form open tag -->
                    <?php if ($hasLogin) : ?>
                        <form action="./includes/functions/answer/post.php" method="POST" name="postAnswerSubmit"
                            id="postAnswerForm">
                    <?php endif; ?>

                        <div class="card">
                            <div class="card-header blue">
                                <div class="row">
                                    <div class="col-6 my-auto">
                                        <h5 class="text-white">Share Your Answer</h5>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-primary post-answer" type="submit" id="postAnswerBtn"
                                            name="postAnswerSubmit">
                                            <span class="textBreak">Post</span>
                                            <span class="iconBreak"><i class="fas fa-share"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    <!-- Area to get user input for answer content -->
                                    <textarea class="form-control rounded-0" id="answerContent" name="postAnswerContent"
                                        rows="5"></textarea>

                                    <!-- Area to temporary store current user ID -->
                                    <input type="text" class="d-none" name="currentUserID"
                                        value="<?= $_SESSION['userID'] ?>" />

                                    <!-- Area to temporary store current question ID -->
                                    <input type="text" class="d-none" name="currentQuestionID"
                                        value="<?= $_SESSION['currentQuestionID'] ?>">
                                </div>
                            </div>
                        </div>

                    <!-- If user is currently logged in, render post answer form close tag -->
                    <?php if ($hasLogin) : ?>
                        </form>
                    <?php endif; ?>

                </section>
            </div>
        </main>
    <?php
    
        //Include footer
        include "./includes/components/parts/footer.php";

        //If user is currently logged in
        if ($hasLogin) :

            //Include ONLY logout popout modal, delete question and popout modal, and edit question and answer popout modal
            include "./includes/components/alerts/logout-alert.php";
            include "./includes/components/alerts/delete-answer-alert.php";
            include "./includes/components/alerts/delete-question-alert.php";
            include "./includes/components/modals/edit-answer-modal.php";
            include "./includes/components/modals/edit-question-modal.php";


            //If url contains "success" parameter, Include ONLY suceess alert modal
            if (isset($_GET['success'])) :
                include "./includes/components/alerts/success-alert.php";
            endif;

            //If url contains "failed" parameter, Include ONLY failed alert modal
            if (isset($_GET['failed'])) :
                include "./includes/components/alerts/failed-alert.php";
            endif;
        else :

            //Include ONLY login-register popout modal and failed alert modal
            include "./includes/components/modals/login-register-modal.php";
            include "./includes/components/alerts/failed-alert.php";
        endif;

        //Close connection to server
        mysqli_close($conn);
    ?>
    </body>
    <script type="text/javascript">
    $(document).ready(function() {

    //If user is currently logged in
    <?php if ($hasLogin) : ?>

        //Trigger post answer submit event
        $("#postAnswerForm").submit(function() {

            //If post answer form is currently empty
            if (!$("#answerContent").val()) {

                //Trigger alert modal to notify
                $("#messageHeadline").empty().append("Cannot Post Answer");
                $("#messageBody").empty().append("Answer cannot leave blank");
                $("#failedToModal").modal('show');
                event.preventDefault();
                event.stopPropagation();
                return false;
            } else {

                //Allow user to submit form
                return true;
            }
        });
    <?php else : ?>

        //Trigger post answer button event to show alert
        $("#postAnswerBtn").click(function() {
            $("#messageHeadline").empty().append("Cannot Post Answer");
            $("#messageBody").empty().append("You need to login to post answer");
            $("#failedToModal").modal('show');
        })
    <?php endif; ?>
    });
    </script>

</html>
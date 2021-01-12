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
        } else if ($_GET['reason'] == "deletequestionquerysuccess") {
            include_once './includes/components/success_delete_question_alert.php';
        }
    }

    ?>

    <?php
    include_once './includes/header.php';
    ?>


    <?php
    if (isset($_SESSION['id'])) {
        // if logined
        //Post Question Modal
        include_once './includes/components/post_question_modal.php';
    } else {
        // if logouted
        //Alert not login Modal
        include_once './includes/components/not_login_alert_modal.php';
    }
    ?>


    <!-- Main Section -->
    <main class="main-section">
        <div class="container">
            <section class="container stickyContent bg-white position-fixed ">
                <h1 class="py-2">Questions</h1>
                <div class="row py-3 pb-4">
                    <div class="col-6 text-left my-auto">
                        <?php
                        if (isset($_GET['search'])) {
                        ?>
                            <h4 class="searchResult">Search :&nbsp;<?php echo $_GET['search']; ?></h4>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-6 text-right my-auto">
                        <button class="btn btn-primary py-3 px-5 text-white postQuestionBtn" data-toggle="modal" data-target="#postQuestionModal">Post a Question</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control px-5 py-4 rounded-lg-left searchInput" id="searchInput" placeholder="Search....." aria-label="Search" aria-describedby="searchBtn">
                        <div class="input-group-append">
                            <button class="btn btn-primary m-0 px-5 py-3 rounded-lg searchBtn" type="button" id="searchBtn">Search</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="questionList" id="questionListing">

                <!-- Question -->
                <?php

                if (isset($_GET['search'])) {
                    include_once "./includes/components/display_searched_question.php";
                } else {
                    include_once "./includes/components/display_question.php";
                }
                ?>


            </section>

            <section id="questionPagination" class="py-4">
                <?php
                include_once "./includes/components/pagination_question.php";
                ?>
            </section>
        </div>
    </main>

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
            } else if ($_GET['reason'] == "deletequestionquerysuccess") {
                echo "$('#successDeleteQuestionModal').modal('show');";
            }
        }
        ?>

        $("#searchBtn").click(function() {
            var input = $("#searchInput").val();

            if (input == "") {
                console.log("empty input");
            } else {
                window.location.replace('http://localhost/Forum-Discussion/list.php?page=1&search=' + input);
            }
        });

        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 1) {
                if ($pageNum == 1) {
        ?>
                    $("#previousPageContainer").addClass("disabled");
                    $("#nextPageContainer").addClass("disabled");
                <?php
                } else {
                ?>
                    $("#previousPageContainer").addClass("disabled");
                    $("#nextPageContainer").removeClass("disabled");
                <?php
                }
            } else if ($_GET['page'] == $pageNum) {
                ?>
                $("#previousPageContainer").removeClass("disabled");
                $("#nextPageContainer").addClass("disabled");
            <?php
            } else {
            ?>
                $("#previousPageContainer").removeClass("disabled");
                $("#nextPageContainer").removeClass("disabled");
        <?php
            }
        }

        ?>

        $("#previousPageBtn").click(function() {

            if (!$("#previousPageContainer").hasClass("disabled")) {
                window.location.replace("http://localhost/Forum-Discussion/list.php?page=<?php echo ($_GET["page"] - 1); ?>");
            }
        });

        $("#nextPageBtn").click(function() {
            if (!$("#nextPageContainer").hasClass("disabled")) {
                window.location.replace("http://localhost/Forum-Discussion/list.php?page=<?php echo ($_GET["page"] + 1); ?>");
            }
        });

    });
</script>

</html>
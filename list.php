<!DOCTYPE html>
<html lang="en">

<head>
    <!-- include necessary files -->
    <?php
    include_once './includes/head.php';
    ?>
</head>

<body>

    <!-- include alert modal when failed occur -->
    <?php
    if (isset($_GET['reason'])) {
        if ($_GET['reason'] == "passwordnotmatch") {
            include_once './includes/components/wrong_password_alert.php';
        } else if ($_GET['reason'] == "deletequestionquerysuccess") {
            include_once './includes/components/success_delete_question_alert.php';
        }
    }
    ?>

    <!-- Include Header Part -->
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
            <section class="container stickyContent bg-white position-fixed coverTopPart">
                <h1 class="py-1">Discussion Forum</h1>
                <div class="row py-2 pb-3">
                    <div class="col-6 text-left my-auto">
                        <?php
                        if (isset($_GET['search'])) {
                        ?>
                            <h4 class="searchResult">Search :&nbsp;<?php echo $_GET['search']; ?></h4>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Post Question Button -->
                    <div class="col-6 text-right my-auto">
                        <button class="btn btn-primary py-3 px-xl-5 px-lg-5 px-md-5 px-sm-3 text-white postQuestionBtn" data-toggle="modal" data-target="#postQuestionModal">
                            <span class="textBreak">Post a Question</span>
                            <span class="iconBreak"><i class="fas fa-plus"></i></span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <!-- Search Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control px-xl-5 px-lg-5 px-md-5 px-sm-3 py-4 rounded-lg-left searchInput" id="searchInput" placeholder="Search....." aria-label="Search" aria-describedby="searchBtn">
                        <div class="input-group-append">
                            <button class="btn btn-primary m-0 px-xl-5 px-lg-5 px-md-5 px-sm-3 py-3 rounded-lg searchBtn" type="button" id="searchBtn">
                                <span class="textBreak">Search</span>
                                <span class="iconBreak"><i class="fas fa-search fa-lg"></i></span>
                            </button>
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
                window.location.replace('http://localhost/Forum-Discussion/list.php?page=1');
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
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
                        <h4 class="searchResult">Search Result : <span>xxxxxxx</span></h4>
                    </div>
                    <div class="col-6 text-right my-auto">
                        <button class="btn btn-primary py-3 px-5 text-white postQuestionBtn" data-toggle="modal" data-target="#postQuestionModal">Post a Question</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control px-5 py-4 rounded-lg-left searchInput" placeholder="Search....." aria-label="Search" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary m-0 px-5 py-3 rounded-lg searchBtn" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="questionList">

                <!-- Question -->
                <?php
                include "./includes/components/display_question.php";
                ?>


            </section>

            <section id="pagination" class="py-4">

            </section>

        </div>
    </main>

    <?php
    include_once './includes/footer.php';
    ?>

</body>
<script type="text/javascript">
    $(document).ready(function () {
        <?php
        if (isset($_GET['reason']) == "passwordnotmatch") {
            echo "$('#passwordNotMatchModal').modal('show');";
        }
        ?>
    });
</script>

</html>
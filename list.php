<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once './includes/head.php';
    ?>
</head>

<body>

    <?php 
        include_once './includes/header.php';
    ?>

    <!-- If not login -->
    <!-- Alert not login Modal -->
    <?php 
        include_once './includes/components/not_login_alert_modal.php';
    ?>

    <!-- If login -->
    <!-- Post Question Modal -->
    <?php 
        include_once './includes/components/post_question_modal.php';
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
                        <button class="btn btn-primary py-3 px-5 text-white postQuestionBtn" data-toggle="modal" data-target="#postQuestionForm">Post a Question</button>
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
                <a class="card my-3" href="./forum.php">
                    <div class="card-body p-4 px-5">
                        <div class="row">
                            <div class="col-3">
                                <h2 class="card-title text-black">Question 1</h2>
                            </div>
                            <div class="col-7 py-auto">
                                <h5 class="text-black">from tester 1</h5>
                            </div>
                            <div class="col-2 py-auto text-right">
                                <p class="text-black">2020-09-28</p>
                            </div>
                        </div>
                        <div class="row py-3">
                            <p class="card-text text-justify" style="font-size:20px;">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt eius placeat consequuntur odio sed, aperiam deserunt commodi esse laudantium libero doloribus ullam facere,laudantium libero doloribus ullam facerelaudantium libero doloribus ullam facere ...
                            </p>
                        </div>
                    </div>
                </a>

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


</script>

</html>
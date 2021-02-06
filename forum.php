<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "./includes/components/parts/head.php"; ?>
    </head>

    <body>
        <header class="sticky-top z-depth-1">
            <?php include "./includes/components/parts/header.php"; ?>
        </header>

        <main>

            <!-- Login-Register Modal -->
            <?php include "./includes/components/modals/login-register-modal.php"; ?>

            <!-- Logout Alert -->
            <?php include "./includes/components/alerts/logout-alert.php"; ?>

            <!-- Password Not Matched Alert -->
            <?php include "./includes/components/alerts/password-not-match-alert.php"; ?>

            <!-- Edit Question Modal -->
            <?php include "./includes/components/modals/edit-question-modal.php"; ?>

            <!-- Delete Question Modal -->
            <?php include "./includes/components/modals/delete-question-modal.php"; ?>

            <!-- Edit Answer Modal -->
            <?php include "./includes/components/modals/edit-answer-modal.php"; ?>

            <!-- Delete Answer Modal -->
            <?php include "./includes/components/modals/delete-answer-modal.php"; ?>

            <!-- Failed to Delete/Edit/Post Question/Answer -->
            <?php include "./includes/components/alerts/failed-to-alert.php"; ?>

            <!-- Success to Delete/Edit/Post Question/Answer -->
            <?php include "./includes/components/alerts/success-to-alert.php"; ?>

            <div class="container py-2">
                <section class="py-2">
                    <?php include "./includes/components/parts/breadcrumb.php"; ?>
                </section>
                <section class="py-2">
                    <div class="row">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="card-title">Card title</h3>
                                        <p class="card-title">Tester 2</p>
                                        <p class="card-title">2020-10-29</p>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-3"></div>
                                            <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                                                <button class="btn btn-default px-3" data-toggle="modal"
                                                    data-target="#editQuestionModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-sm-4 text-center" data-toggle="modal"
                                                data-target="#confirmDeleteQuestionModal">
                                                <button class="btn btn-danger px-3">
                                                    <i class="far fa-trash-alt "></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Dolores,
                                    sint? Suscipit dolore vitae eligendi ea, aperiam rem laboriosam esse
                                    exercitationem,
                                    accusantium, ut repellendus at quasi libero doloribus numquam ipsum dolorem?</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="py-2">
                    <?php include "./includes/components/parts/answer-listing.php"; ?>
                </section>

                <section class="py-2">
                    <?php include "./includes/components/parts/pagination.php"; ?>
                </section>

                <section class="py-2">
                    <div class="card">
                        <div class="card-header blue">
                            <div class="row">
                                <div class="col-6 my-auto">
                                    <h5 class="text-white">Share Your Answer</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary post-answer">
                                        <span class="textBreak">Post</span>
                                        <span class="iconBreak"><i class="fas fa-share"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php include "./includes/components/parts/footer.php"; ?>
    </body>

    <script type="text/javascript">
    $(document).ready(function() {

    });
    </script>

</html>
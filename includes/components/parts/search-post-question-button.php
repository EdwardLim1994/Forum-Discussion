<div class="white">
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-8 my-auto">
                <h3>Question List</h3>
            </div>
            <div class="col-4 text-right">
                <!-- Post Question Button -->
                <button class="btn btn-primary p-lg-2 px-lg-5 p-md-4 px-md-4" id="postQuestionBtn" data-toggle="modal"
                    data-target="<?php 
                                    //If user is currently logged in, set target to #postQuestionModal, otherwise set target to #failedToModal
                                    if ($hasLogin) 
                                        echo "#postQuestionModal";
                                    else 
                                        echo "#failedToModal";
                                ?>">
                    <span class="textBreak">Post a Question</span>
                    <span class="iconBreak"><i class="fas fa-sign-in-alt"></i></span>
                </button>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-12">
                <!-- Search Bar -->
                <form action="./list.php" method="GET">
                    <div class="md-form input-group mb-3">

                        <!-- Temporary store current page number -->
                        <input type="number" name="page" value="<?= $_GET['page'] ?>" class="d-none">

                        <!-- Search Input -->
                        <input type="text" class="form-control" name="searchKeyword" placeholder="Search"
                            aria-label="Search" aria-describedby="searchQuestion">
                        <div class="input-group-append">
                            <button class="btn btn-md btn-primary m-0 px-lg-5 px-md-4" type="submit">
                                <span class="textBreak">Search</span>
                                <span class="iconBreak"><i class="fas fa-search"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- If user is currently NOT logged in, render these javascript logic -->
<?php if (!$hasLogin) : ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#postQuestionBtn").click(function() {
            $("#messageHeadline").empty().text("Cannot Post Question");
            $("#messageBody").empty().text("You need an account to post a question.");
        });
    });
    </script>
<?php endif; ?>
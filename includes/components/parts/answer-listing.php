<?php

    //SQL to get all answer data
    $sql = "SELECT * FROM Answer";

    //Include pagination logic
    include "./includes/functions/pagination.php";

    //SQL to get all answer data associated with the range of pagination
    $sql_answer = "SELECT a.id, a.answer, a.postdate, a.vote, a.user_id, u.username 
            FROM Answer as a
            LEFT JOIN User as u 
            ON a.user_id = u.id 
            WHERE a.question_id = " . $_GET['question'] . "
            LIMIT $thisPageFirstRow, $rowsPerPage";
    $result = mysqli_query($conn, $sql_answer);

    //If answer data is successfully retrieved, 
    if (mysqli_num_rows($result) > 0) :

        //Set flag to emphasize answer does exists inside database
        $doesListingExist = true;

        while ($row = mysqli_fetch_assoc($result)) :

            //If user is currently logged in, set current user ID, otherwise ,set 0 to indicate no user logged in
            $currentUserID = isset($_SESSION['userID']) ? $_SESSION['userID'] : 0;

            //SQL to find vote record associated with answer ID and user ID
            $sql_vote = "SELECT FOUND_ROWS() FROM Vote WHERE answer_id = " . $row['id'] . " AND user_id = " . $currentUserID;
            $result_vote = mysqli_query($conn, $sql_vote);

            //If vote record exists, return "btn-pink", otherwise return "btn-grey"
            $voteStatus = mysqli_num_rows($result_vote) > 0 ? "btn-pink" : "btn-grey";
?>
            <div class="row py-1">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-title"><?= $row['username'] ?></h5>
                                <p class="card-text">
                                    <strong><?= date("Y-m-d g:ia", strtotime($row['postdate'])) ?></strong>
                                </p>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-3"></div>

                                    <!-- If user is currently logged in and this answer is created by current user, render edit and delete button, otherwise render nothing -->
                                    <?php if ($hasLogin && $_SESSION['userID'] == $row['user_id']) : ?>
                                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                                            <button class="btn btn-default px-3 editAnswerBtn" data-toggle="modal"
                                                data-target="#editAnswerModal">
                                                <i class="fas fa-edit"></i>
                                                <input type="number" class="d-none" value="<?= $row['id'] ?>">
                                            </button>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-4 text-center" data-toggle="modal"
                                            data-target="#confirmDeleteAnswerModal">
                                            <button class="btn btn-danger px-3 deleteAnswerBtn">
                                                <i class="far fa-trash-alt "></i>
                                                <input type="number" class="d-none" value="<?= $row['id'] ?>">
                                            </button>
                                        </div>
                                    <?php else : ?>
                                        <div class="col-lg-4 col-md-6 col-sm-8">
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                                        <button class="btn px-3 text-white voteBtn <?= $voteStatus ?>">
                                            <i class="fas fa-heart"></i>
                                            <span id="vote-<?= $row['id'] . "-" . $currentUserID ?>"><?= $row['vote'] ?></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class=" card-text text-justify text-content" id="answerContent-<?= $row['id'] ?>"><?= $row['answer'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
<?php
        endwhile;
    //If answer data is failed to be retrieved, 
    else :

        //Set flag to emphasize answer does exists inside database
        $doesListingExist = false;
?>
        <div class="row py-1 text-center">
            <div class="card p-3 hoverable">
                <h3>No Answer Yet</h3>
            </div>
        </div>
<?php endif; ?>

<!-- Import this script only if user is currently logged in -->
<?php if ($hasLogin) : ?>
    <script src="./dist/onclick-selector.prod.js"></script>
<?php endif; ?>

<!-- Import vote logic javascript -->
<script src="./dist/voting-logic.prod.js"></script>
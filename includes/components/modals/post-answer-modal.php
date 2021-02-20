<div class="modal fade" id="postAnswerModal" tabindex="-1" role="dialog" aria-labelledby="postAsnwerModal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <form action="./includes/functions/answer/post.php" method="POST" name="answerSubmit">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Share Your Answer</h4>
                </div>
                <div class="modal-body mx-3">
                    <!-- Area to get user input for answer content -->
                    <textarea class="form-control rounded-0" id="answerContent" name="postAnswerContent" rows="5" required></textarea>

                    <!-- Area to temporary store current user ID -->
                    <input type="text" class="d-none" name="currentUserID" value="<?= $_SESSION['userID'] ?>" />

                    <!-- Area to temporary store current question ID -->
                    <input type="text" class="d-none" name="currentQuestionID" value="<?= $_SESSION['currentQuestionID'] ?>">
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-info" type="submit" id="postAnswerBtn" name="postAnswerSubmit">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
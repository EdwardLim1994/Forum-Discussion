<div class="modal fade" id="postQuestionModal" tabindex="-1" role="dialog" aria-labelledby="postQuestionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="./includes/functions/postQuestion.php" method="POST" id="postQuestionForm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Post a Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="questionTitle">Title</label>
                        <input type="text" id="questionTitle" name="questionTitle" class="rounded-lg form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questionContent">Content</label>
                        <textarea id="questionContent" name="questionContent" class="rounded-lg form-control" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button type="submit" name="questionSubmit" class="btn btn-default text-white">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
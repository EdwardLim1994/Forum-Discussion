<div class="modal fade" id="postQuestionModal" tabindex="-1" role="dialog" aria-labelledby="postQuestionModal"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <form action="./includes/functions/question/post.php" method="POST" name="questionSubmit">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Post a Question</h4>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="questionTitle">Title</label>
                        <input type="text" id="questionTitle" name="postQuestionTitle" class="rounded-lg form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="questionContent">Content</label>
                        <textarea id="questionContent" name="postQuestionContent" class="rounded-lg form-control"
                            rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="postQuestionSubmit" class="btn btn-info text-white">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
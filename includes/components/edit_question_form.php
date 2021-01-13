<div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="./includes/functions/editQuestion.php" method="POST" id="editQuestionForm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="editQuestionTitle">Title</label>
                        <input type="text" id="editQuestionTitle" name="editQuestionTitle" class="rounded-lg form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editQuestionContent">Content</label>
                        <textarea id="editQuestionContent" name="editQuestionContent" class="rounded-lg form-control" rows="5" required></textarea>
                    </div>
                    
                    <!-- Store necessary data ready to be posted -->
                    <input id="editQuestionID" name="editQuestionID" type="number" style="display: none">
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button type="submit" name="editQuestionSubmit" class="btn btn-default text-white">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
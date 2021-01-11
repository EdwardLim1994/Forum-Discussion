<div class="modal fade" id="editAnswerModal" tabindex="-1" role="dialog" aria-labelledby="editAnswerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="./includes/functions/editAnswer.php" method="POST" id="editAnswerForm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Answer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="editAnswerContent">Content</label>
                        <textarea id="editAnswerContent" name="editAnswerContent" class="rounded-lg form-control" rows="5" required></textarea>
                    </div>
                    <input id="editAnswerID" name="answerID" type="number" style="display: none">
                    <input id="editAnswerQuestionID" name="questionID" type="number" style="display: none">
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button type="submit" name="answerSubmit" class="btn btn-default text-white">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirmDeleteQuestionModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteQuestionModal" aria-hidden="true">
    <form action="./includes/functions/question/delete.php" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Question Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    When this question is deleted, all associated answers will be deleted too. Are you sure you want to
                    delete this question?
                </div>
                <input id="deleteQuestionID" name="deleteQuestionID" type="number" style="display: none">
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    <button type="submit" name="deleteQuestionSubmit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>
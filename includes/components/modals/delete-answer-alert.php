<div class="modal fade" id="confirmDeleteAnswerModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteAnswerModal" aria-hidden="true">
    <form action="./includes/functions/answer/delete.php" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Answer Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this answer?
                </div>
                <input type="number" class="d-none" id="deleteAnswerID" name="deleteAnswerID" />

                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                    <button type="submit" name="deleteAnswerSubmit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>